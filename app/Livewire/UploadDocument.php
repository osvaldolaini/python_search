<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;

class UploadDocument extends Component
{
    use WithFileUploads;

    public $uploadDocument;
    public $module;
    public $content;
    public $id;
    public $Document;
    public $rules;
    public $code;
    public $documents = array();

    public function render()
    {
        if (Storage::exists('public/documents')) {
            // Obtenha todos os arquivos na pasta
            if (count(Storage::allFiles('public/documents')) > 0) {
                $documents = Storage::files('public/documents');
                // dd($documents);
                foreach ($documents as $value) {
                    $val = explode('/', $value);
                    $names = explode('.', $val[2]);
                    $reversed = preg_replace('/[^a-zA-Z0-9\s]/', ' ', $names[0]);

                    // Capitalizar as palavras
                    $reversed = ucwords($reversed);
                    $docs[] = [
                        'name' => $reversed,
                        'ext' => $names[1],
                        'path' => $value,
                    ];
                }
                $this->documents = json_encode($docs);
            } else {
                $this->documents = false;
            }
        } else {
            $this->documents = false;
        }
        return view('livewire.upload-document');
    }
    public function changeDocument()
    {
        $this->dispatch('submitForm');
    }
    public function updated($property)
    {
        if ($property === 'uploadDocument') {
            $this->rules = [
                'uploadDocument'   => ['nullable', 'mimes:pdf,xlsx,docx,pptx,ppt,xlx,csv,doc,txt', 'max:10240'],
            ];

            $this->validate();
            if (isset($this->uploadDocument)) {
                if (Storage::directoryMissing('public/documents')) {
                    // Obtenha todos os arquivos na pasta
                    $this->documents = Storage::files('public/documents');
                }

                $ext = $this->uploadDocument->getClientOriginalExtension();
                $fileNameWithoutExtension = pathinfo($this->uploadDocument->getClientOriginalName(), PATHINFO_FILENAME);
                $new_name = Str::slug($fileNameWithoutExtension, '_') . '.' . $ext;
                $this->uploadDocument->storeAs('public/documents', $new_name);
                $this->openAlert('success', 'Arquivo validada com sucesso.');
            }
        }
    }
    public function excluirTemp()
    {
        $this->uploadDocument = '';
    }

    public function deleteDocs($path)
    {
        Storage::delete($path);
        $this->dispatch('delete-upload');
        $this->openAlert('success', 'Arquivo excluido com sucesso.');
    }
    //pega o status do registro
    public function openAlert($status, $msg)
    {
        $this->dispatch('openAlert', $status, $msg);
    }
}
