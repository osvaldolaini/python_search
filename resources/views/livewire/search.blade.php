<div>
    <div class="text-gray-100 bg-gray-900">
        <div class="container grid grid-cols-12 mx-auto">
            <div class="flex flex-col justify-start col-span-12 align-middle bg-no-repeat bg-cover dark:bg-gray-300 lg:col-span-6 lg:h-auto"
                style="background-image: url('https://source.unsplash.com/random/640x480'); background-position: center center; background-blend-mode: multiply; background-size: cover;">
                <div class="flex flex-col p-8 py-12 text-center items-top dark:text-gray-800">
                    @livewire('upload-document')
                </div>
            </div>
            <div class="flex flex-col justify-start col-span-12 divide-y itens-top lg:col-span-6 dark:divide-gray-300">
                @livewire('search-input')
            </div>
        </div>
    </div>
</div>
