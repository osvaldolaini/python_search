<?php

namespace App\Livewire;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\On;
use Livewire\Component;
use Symfony\Component\Process\Exception\ProcessFailedException;
use Symfony\Component\Process\Process;

class SearchInput extends Component
{
    public $searchString;
    public $pdfFiles = [];
    public $results = [];
    public function render()
    {
        return view('livewire.search-input');
    }
    public function search()
    {
        $this->validate([
            'searchString' => 'required|string',
        ]);

        $pythonScriptPath = public_path('app.py');
        $pdfFiles = Storage::files('public/documents');
        $this->results = [];

        // Caminho absoluto para o executável do Python
        $pythonExecutable = "C:\\laragon\\bin\\python\\python-3.10\\python.exe";  // Substitua pelo caminho correto

        foreach ($pdfFiles as $file) {
            $filepath = Storage::path($file);

            // Montar o comando para executar o script Python
            $command = [
                $pythonExecutable,
                $pythonScriptPath,
                $filepath,
                str_replace("'", "\\'", $this->searchString),
            ];

            // Criar uma nova instância de Process
            $process = new Process($command);

            // Iniciar o processo
            $process->run();

            // Verificar se houve algum erro na execução do processo
            if (!$process->isSuccessful()) {
                throw new ProcessFailedException($process);
            }

            // Capturar a saída do processo
            $output = $process->getOutput();

            // Tentar decodificar a saída como JSON
            try {
                // Limpar a saída para garantir que apenas o JSON seja decodificado
                $jsonStartPos = strpos($output, '{');
                $jsonEndPos = strrpos($output, '}');
                $jsonLength = $jsonEndPos - $jsonStartPos + 1;
                $jsonOutput = substr($output, $jsonStartPos, $jsonLength);
                // dd($jsonOutput);
                // Decodificar o JSON para uma estrutura PHP
                $data = json_decode($jsonOutput, true);
                // dd($data);
                // Verificar se houve erro na decodificação
                if (json_last_error() !== JSON_ERROR_NONE) {
                    throw new \Exception("Erro ao decodificar JSON: " . json_last_error_msg());
                }

                // Processar os dados decodificados
                $this->results[] = [
                    'filename' => basename($filepath),
                    'results' => $data
                ];
            } catch (\Exception $e) {
                Log::error("Erro ao decodificar JSON: " . $e->getMessage());
            }
            // dd($this->results);
        }
    }

    #[On('delete-upload')]
    public function clear()
    {
        $this->searchString = '';
        $this->results = [];
    }
}
