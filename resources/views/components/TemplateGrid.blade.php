<!-- resources/views/livewire/template-grid.blade.php -->
<div class="grid grid-cols-1 gap-4 md:grid-cols-3">
    @foreach($templates as $template)
        <div class="p-4 border rounded-lg shadow-lg">
            <h3 class="font-bold">{{ $template->title }}</h3>
            <p>Grupo: {{ $template->group }}</p>
            <p>Tags: {{ $template->tags }}</p>
            <div class="flex justify-end mt-4">
                <button wire:click="loadTemplate({{ $template->id }})" class="px-4 py-2 font-bold text-white bg-blue-600 rounded hover:bg-blue-700">Carregar</button>
            </div>
        </div>
    @endforeach
</div>
