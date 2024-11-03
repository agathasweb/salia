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

                    <!-- Botão para abrir o modal -->
                    <div class="flex justify-end">
                        <button id="saveTemplateBtn" class="px-4 py-2 mt-4 font-bold text-white rounded bg-MarromSC hover:bg-Azul01SC">Salvar Template</button>
                    </div>

                    <!-- Modal -->
                    <div class="fixed inset-0 z-50 flex items-center justify-center h-screen bg-black bg-opacity-50" id="templateModal" style="display: none;">
                        <div class="w-full max-w-lg p-6 mx-auto bg-white rounded-lg shadow-lg">
                            <div class="flex items-center justify-between p-4 border-b modal-header">
                                <h5 class="text-lg font-semibold modal-title">Salvar Template</h5>
                                <button type="button" class="text-gray-500 hover:text-gray-700" onclick="closeModal()">&times;</button>
                            </div>
                            <div class="p-4 modal-body">
                                <label for="templateTitle" class="block text-sm font-medium text-gray-700">Título do Template:</label>
                                <input type="text" id="templateTitle" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" placeholder="Digite o título">

                                <label for="templateGroup" class="block mt-4 text-sm font-medium text-gray-700">Grupo:</label>
                                <input type="text" id="templateGroup" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" placeholder="Digite o grupo">

                                <label for="templateTags" class="block mt-4 text-sm font-medium text-gray-700">Tags (separadas por vírgula):</label>
                                <input type="text" id="templateTags" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:ring focus:ring-opacity-50" placeholder="Digite as tags">
                            </div>
                            <div class="flex justify-end p-4 border-t modal-footer">
                                <button type="button" class="px-4 py-2 text-white bg-blue-600 rounded hover:bg-blue-700" id="saveTemplate">Salvar</button>
                                <button type="button" class="px-4 py-2 ml-2 text-gray-700 bg-gray-300 rounded hover:bg-gray-400" onclick="closeModal()">Fechar</button>
                            </div>
                            <!-- Mensagem de status -->
                            <div id="statusMessage" class="mt-4 text-center text-red-500" style="display: none;"></div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<script>
    document.getElementById('saveTemplateBtn').onclick = function() {
        document.getElementById('templateModal').style.display = 'block'; // Abre o modal
    };

    document.getElementById('saveTemplate').onclick = function() {
        const title = document.getElementById('templateTitle').value;
        const group = document.getElementById('templateGroup').value;
        const tags = document.getElementById('templateTags').value;
        const content = tinymce.get('myeditorinstance').getContent(); // Captura o conteúdo do TinyMCE

        // Enviar os dados para o servidor
        fetch('/save-template', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}' // Se estiver usando CSRF
            },
            body: JSON.stringify({
                title: title,
                group: group,
                tags: tags,
                content: content
            })
        })
        .then(response => response.json())
        .then(data => {
            // Exibir mensagem de sucesso ou erro
            const statusMessage = document.getElementById('statusMessage');
            if (data.success) {
                statusMessage.innerText = 'Template salvo com sucesso!';
                statusMessage.classList.remove('text-red-500');
                statusMessage.classList.add('text-green-500');
            } else {
                statusMessage.innerText = 'Erro ao salvar o template!';
                statusMessage.classList.remove('text-green-500');
                statusMessage.classList.add('text-red-500');
            }

            // Exibir mensagem e fechar o modal após 3 segundos
            statusMessage.style.display = 'block';
            setTimeout(closeModal, 2000);

            // Limpar os campos
            document.getElementById('templateTitle').value = '';
            document.getElementById('templateGroup').value = '';
            document.getElementById('templateTags').value = '';
        })
        .catch(error => {
            console.error('Erro:', error);
            const statusMessage = document.getElementById('statusMessage');
            statusMessage.innerText = 'Erro ao salvar o template!';
            statusMessage.classList.remove('text-green-500');
            statusMessage.classList.add('text-red-500');
            statusMessage.style.display = 'block';
            setTimeout(closeModal, 3000);
        });
    };

    function closeModal() {
        document.getElementById('templateModal').style.display = 'none'; // Fechar o modal
        document.getElementById('statusMessage').style.display = 'none'; // Ocultar a mensagem de status
    }
</script>
