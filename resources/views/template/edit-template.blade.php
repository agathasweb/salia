<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-center text-gray-800">
            {{ __('Editor de Templates') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <x-forms.tinymce-editor/>

                    <textarea id="myeditorinstance">{{ $template->content }}</textarea>

                    <div class="flex justify-end">
                        <button id="saveTemplateBtn" class="px-4 py-2 mt-4 font-bold text-white rounded bg-MarromSC hover:bg-Azul01SC">Salvar Template</button>
                    </div>

                    <!-- Modal e scripts para interação -->
                    <div class="fixed inset-0 z-50 flex items-center justify-center h-screen bg-black bg-opacity-50" id="templateModal" style="display: none;">
                        <div class="w-full max-w-lg p-6 mx-auto bg-white rounded-lg shadow-lg">
                            <div class="flex items-center justify-between p-4 border-b modal-header">
                                <h5 class="text-lg font-semibold modal-title">Salvar Template</h5>
                                <button type="button" class="text-gray-500 hover:text-gray-700" onclick="closeModal()">&times;</button>
                            </div>
                            <div class="p-4 modal-body">
                                <label for="templateTitle" class="block text-sm font-medium text-gray-700">Título do Template:</label>
                                <input type="text" id="templateTitle" value="{{ $template->title }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" placeholder="Digite o título">

                                <label for="templateGroup" class="block mt-4 text-sm font-medium text-gray-700">Grupo:</label>
                                <input type="text" id="templateGroup" value="{{ $template->group }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" placeholder="Digite o grupo">

                                <label for="templateTags" class="block mt-4 text-sm font-medium text-gray-700">Tags (separadas por vírgula):</label>
                                <input type="text" id="templateTags" value="{{ $template->tags }}" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" placeholder="Digite as tags">
                            </div>
                            <div class="flex justify-end p-4 border-t modal-footer">
                                <button type="button" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700" id="saveTemplate">Salvar</button>
                                <button type="button" class="px-4 py-2 ml-2 text-gray-700 bg-gray-300 rounded hover:bg-gray-400" onclick="closeModal()">Fechar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        // Inicializando o TinyMCE
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            plugins: 'code table lists',
            toolbar: 'blocks | undo redo | bold italic | alignjustify alignleft aligncenter alignright | indent outdent | bullist numlist | table',
            menubar: false,
            height: 500,
            setup: function (editor) {
                // Configurando o listener do evento Livewire para carregar conteúdo
                Livewire.on('loadTemplate', (content) => {
                    editor.setContent(content); // Carrega o conteúdo recebido no TinyMCE
                });
            }
        });
    });
</script>
