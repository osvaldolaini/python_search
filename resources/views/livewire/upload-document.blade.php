<div class="col-span-full">
    <div class="col-span-full sm:col-span-3">
        <form wire:submit.prevent="#" id="form-upload">
            <div class="flex items-start justify-center w-full h-60">
                <label for="dropzone-file"
                    class="flex flex-col items-center justify-center w-full border-2 border-gray-300 border-dashed rounded-lg cursor-pointer h-36 bg-gray-50 dark:hover:bg-bray-800 dark:bg-gray-700 hover:bg-gray-100 dark:border-gray-600 dark:hover:border-gray-500 dark:hover:bg-gray-600">
                    <div class="flex flex-col items-center justify-center">
                        <svg class="w-8 h-8 mb-2 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 16">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 13h3a3 3 0 0 0 0-6h-.025A5.56 5.56 0 0 0 16 6.5 5.5 5.5 0 0 0 5.207 5.021C5.137 5.017 5.071 5 5 5a4 4 0 0 0 0 8h2.167M10 15V6m0 0L8 8m2-2 2 2" />
                        </svg>
                        <p class="mb-2 text-sm text-gray-500 dark:text-gray-400"><span class="font-semibold">Clique
                                ou </span> arraste e solte</p>
                        <p class="text-xs text-red-500 dark:text-gray-400">Somente PDF</p>
                    </div>
                    <div class="col-span-1" x-data="{ isUploading: false, progress: 0 }" x-on:livewire-upload-start="isUploading = true"
                        x-on:livewire-upload-finish="isUploading = false"
                        x-on:livewire-upload-error="isUploading = false"
                        x-on:livewire-upload-progress="progress = $event.detail.progress">
                        <!-- File Input -->
                        <input id="dropzone-file" type="file" class="hidden" wire:model.lazy="uploadDocument" />

                        @error('uploadDocument')
                            <span class="error">{{ $message }}</span>
                        @enderror

                        <!-- Progress Bar -->
                        <div x-show="isUploading">
                            <progress x-bind:value="progress" class="w-56 progress progress-primary" value="0"
                                max="100"></progress>
                        </div>
                        <div wire:loading wire:target="uploadDocument">Enviando...</div>
                    </div>
                    <input id="dropzone-file" type="file" class="hidden" />
                </label>
            </div>
        </form>
    </div>
    @if ($documents)
        <div class="grid grid-cols-4 my-4 space-x-2">
            @foreach (json_decode($documents) as $document)
                <!-- chips -->
                <div
                    class="col-span-full flex justify-between my-1
                    bg-gray-700 items-center gap-2 h-8 py-1 px-2 hover:bg-surface-200
                    dark:hover:bg-surfacedark-200 focus:bg-surface-400
                    dark:focus:bg-surfacedark-400 border border-gray-500
                    dark:border-gray-200 rounded-[30px] text-sm tracking-[.00714em]">
                    <div class="flex items-center justify-center bg-gray-700 ">
                        <svg class="w-5 h-5 mx-1" fill="currentColor" viewBox="0 0 550.801 550.801"
                            xml:space="preserve">
                            <g>
                                <path
                                    d="M160.381,282.225c0-14.832-10.299-23.684-28.474-23.684c-7.414,0-12.437,0.715-15.071,1.432V307.6
                                                                                                                                                                                                                                                                                                                               c3.114,0.707,6.942,0.949,12.192,0.949C148.419,308.549,160.381,298.74,160.381,282.225z" />
                                <path
                                    d="M272.875,259.019c-8.145,0-13.397,0.717-16.519,1.435v105.523c3.116,0.729,8.142,0.729,12.69,0.729
                                                                                                                                                                                                                                                                                                                               c33.017,0.231,54.554-17.946,54.554-56.474C323.842,276.719,304.215,259.019,272.875,259.019z" />
                                <path
                                    d="M488.426,197.019H475.2v-63.816c0-0.398-0.063-0.799-0.116-1.202c-0.021-2.534-0.827-5.023-2.562-6.995L366.325,3.694 c-0.032-0.031-0.063-0.042-0.085-0.076c-0.633-0.707-1.371-1.295-2.151-1.804c-0.231-0.155-0.464-0.285-0.706-0.419 c-11.918,0-21.6,9.693-21.6,21.601v175.413H62.377c-17.049,0-30.873,13.818-30.873,30.873v160.545
                                                                                                                                                                                                                                                                                                                               c0,17.043,13.824,30.87,30.873,30.87h13.224V529.2c0,11.907,9.682,21.601,21.6,21.601h356.4c11.907,0,21.6-9.693,21.6-21.601
                                                                                                                                                                                                                                                                                                                               V419.302h13.226c17.044,0,30.871-13.827,30.871-30.87v-160.54C519.297,210.838,505.47,197.019,488.426,197.019z M97.2,21.605
                                                                                                                                                                                                                                                                                                                               h250.193v110.513c0,5.967,4.841,10.8,10.8,10.8h95.407v54.108H97.2V21.605z M362.359,309.023c0,30.876-11.243,52.165-26.82,65.333
                                                                                                                                                                                                                                                                                                                               c-16.971,14.117-42.82,20.814-74.396,20.814c-18.9,0-32.297-1.197-41.401-2.389V234.365c13.399-2.149,30.878-3.346,49.304-3.346
                                                                                                                                                                                                                                                                                                                               c30.612,0,50.478,5.508,66.039,17.226C351.828,260.69,362.359,280.547,362.359,309.023z M80.7,393.499V234.365
                                                                                                                                                                                                                                                                                                                               c11.241-1.904,27.042-3.346,49.296-3.346c22.491,0,38.527,4.308,49.291,12.928c10.292,8.131,17.215,21.534,17.215,37.328
                                                                                                                                                                                                                                                                                                                               c0,15.799-5.25,29.198-14.829,38.285c-12.442,11.728-30.865,16.996-52.407,16.996c-4.778,0-9.1-0.243-12.435-0.723v57.67H80.7
                                                                                                                                                                                                                                                                                                                               V393.499z M453.601,523.353H97.2V419.302h356.4V523.353z M484.898,262.127h-61.989v36.851h57.913v29.674h-57.913v64.848h-36.593
                                                                                                                                                                                                                                                                                                                               V232.216h98.582V262.127z" />
                            </g>
                        </svg>
                        <span class="px-4">{{ $document->name }}</span>
                    </div>
                    <span class="flex justify-end cursor-pointer material-symbols-outlined"
                        wire:click="deleteDocs('{{ $document->path }}')">
                        <svg class="w-4 h-4" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path
                                d="M18 6L17.1991 18.0129C17.129 19.065 17.0939 19.5911 16.8667 19.99C16.6666 20.3412 16.3648 20.6235 16.0011 20.7998C15.588 21 15.0607 21 14.0062 21H9.99377C8.93927 21 8.41202 21 7.99889 20.7998C7.63517 20.6235 7.33339 20.3412 7.13332 19.99C6.90607 19.5911 6.871 19.065 6.80086 18.0129L6 6M4 6H20M16 6L15.7294 5.18807C15.4671 4.40125 15.3359 4.00784 15.0927 3.71698C14.8779 3.46013 14.6021 3.26132 14.2905 3.13878C13.9376 3 13.523 3 12.6936 3H11.3064C10.477 3 10.0624 3 9.70951 3.13878C9.39792 3.26132 9.12208 3.46013 8.90729 3.71698C8.66405 4.00784 8.53292 4.40125 8.27064 5.18807L8 6M14 10V17M10 10V17"
                                stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </span>
                </div>
            @endforeach
        </div>
    @endif

</div>
