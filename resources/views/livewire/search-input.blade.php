<div>
    <section class="flex justify-center mt-12">
        <div class="w-full max-w-md">
            <div class="flex items-center space-x-1 border-b border-gray-300">
                <form wire:submit.prevent="search" class="w-full">
                    <fieldset class="w-full py-1 text-blackspace-y-1 dark:text-gray-800">
                        <label for="Search" class="hidden">Search</label>
                        <div class="relative">
                            <span class="absolute inset-y-0 left-0 flex items-center pl-2">
                                <button type="button" title="search" class="p-1 focus:outline-none focus:ring">
                                    <svg fill="currentColor" viewBox="0 0 512 512" class="w-4 h-4 text-gray-800">
                                        <path
                                            d="M479.6,399.716l-81.084-81.084-62.368-25.767A175.014,175.014,0,0,0,368,192c0-97.047-78.953-176-176-176S16,94.953,16,192,94.953,368,192,368a175.034,175.034,0,0,0,101.619-32.377l25.7,62.2L400.4,478.911a56,56,0,1,0,79.2-79.195ZM48,192c0-79.4,64.6-144,144-144s144,64.6,144,144S271.4,336,192,336,48,271.4,48,192ZM456.971,456.284a24.028,24.028,0,0,1-33.942,0l-76.572-76.572-23.894-57.835L380.4,345.771l76.573,76.572A24.028,24.028,0,0,1,456.971,456.284Z">
                                        </path>
                                    </svg>
                                </button>
                            </span>
                            <input type="search" wire:model="searchString" placeholder="Search..."
                                class="w-full py-4 pl-10 text-sm text-black rounded-lg focus:outline-none dark:bg-gray-100 dark:text-gray-800 focus:dark:bg-gray-50 focus:dark:border-blue-600">
                        </div>
                    </fieldset>
                </form>
                <button class="btn btn-square" wire:click='clear()'>
                    <svg class="w-6 h-6 " viewBox="0 0 32 32" id="icon" xmlns="http://www.w3.org/2000/svg">
                        <defs>
                            <style>
                                .cls-1 {
                                    fill: none;
                                }
                            </style>
                        </defs>
                        <path
                            d="M29.4384,16.5715l-7.985-7.9856a2.0014,2.0014,0,0,0-2.8291,0l-5.3584,5.3584L9,2H7L2,16H4l.999-3h6l.8035,2.4077L4.5858,22.6244a2,2,0,0,0,0,2.8282L9.1316,30h9.5908l10.716-10.717A1.9173,1.9173,0,0,0,29.4384,16.5715ZM5.6653,11l2.331-7,2.3355,7Zm12.229,17H9.96L6,24.0381l6.3123-6.3115L20.24,25.6538Zm3.76-3.76-7.9275-7.9272L20.0393,10l7.9268,7.9272Z" />
                        <rect id="_Transparent_Rectangle_" data-name="&lt;Transparent Rectangle&gt;" class="cls-1"
                            width="32" height="32" />
                    </svg>
                </button>
            </div>
            @if (!empty($results))
                <div class="mt-6">
                    <h3 class="text-lg font-medium leading-6 text-gray-100">
                        <div class="badge badge-ghost badge-lg">Resultados da pesquisa :
                            "{{ $searchString }}"</div>
                    </h3>
                    <ul class="mt-3">
                        @foreach ($results as $result)
                            <li class="mt-1 text-gray-100">
                                <strong>
                                    <div class="badge badge-outline">Arquivo:</div>
                                </strong> {{ $result['filename'] }} <br>
                                <strong>
                                    {{ $result['results']['results'] ? 'Resultados: ' : 'Nenhum resultado.' }}
                                </strong>
                                @if ($result['results']['results'])
                                    @foreach ($result['results']['results'] as $res)
                                        <div class="pt-1 pb-4 space-y-2 text-gray-100 border-b border-gray-300">
                                            <div>
                                                <div class="badge badge-accent badge-outline">Texto encontrado:</div>
                                                </strong> {{ $res['found_line'] }}
                                            </div>
                                            <div>
                                                <div class="badge badge-accent badge-outline">Página:</div>
                                                </strong> {{ $res['page'] }}
                                            </div>
                                            <div class="badge badge-accent badge-outline">Resumo (255 caracteres):</div>
                                            <ul>
                                                {{-- @foreach ($res['following_text'] as $line) --}}
                                                <li>{{ $res['following_text'] }}</li>
                                                {{-- @endforeach --}}
                                            </ul>
                                        </div>
                                    @endforeach
                                @endif

                            </li>
                        @endforeach
                    </ul>
                </div>
            @endif
        </div>
    </section>

</div>
