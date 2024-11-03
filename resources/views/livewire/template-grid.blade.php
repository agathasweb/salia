<div class="grid grid-cols-1 gap-4 sm:grid-cols-2 md:grid-cols-3">
    @foreach($templates as $template)
        <div class="p-4 border rounded-lg shadow bg-Azul01SC text-BrancoSC">
            <h3 class="mb-5 font-bold text-center text-BrancoSC">{{ $template->title }}</h3>
            <p class="text-sm text-BrancoSC"><b>GRUPO: </b>{{ $template->group }}</p>
            <p class="text-sm text-BrancoSC"><b>TAGS: </b>{{ $template->tags }}</p>
            <p class="text-sm text-BrancoSC"><b>CRIADO EM: </b>{{ $template->created_at }}</p>
            <div class="mt-2">
                <button wire:click="loadTemplate({{ $template->id }})" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700">
                    Carregar
                </button>

            </div>
        </div>
    @endforeach
</div>
