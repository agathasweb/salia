<form method="post">
    <textarea id="myeditorinstance">Crie seu primeiro template aqui!</textarea>
</form>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        tinymce.init({
            selector: 'textarea#myeditorinstance',
            license_key: 'gpl',
            plugins: 'code table lists',
            toolbar: 'blocks | undo redo | bold italic | alignjustify alignleft aligncenter alignright | indent outdent | bullist numlist | table',
            menubar: false,
            height: 500,
            block_formats: 'Salia_Style_01=h1; Salia_Style_02=h2; Salia_Style_03=h3;',
            formats: {
                h1: { block: 'h1', classes: 'heading' }
            },
            style_formats: [
                { title: 'My heading', format: 'h1' }
            ],
            setup: function (editor) {
                editor.on('init', function () {
                    // Formatação de texto
                    editor.getDoc().body.style.fontFamily = 'Arial, sans-serif';
                    editor.getDoc().body.style.fontSize = '12pt';
                    editor.getDoc().body.style.lineHeight = '1.5'; // Espaçamento de 1,5
                });
            },
            content_css: '{{ asset('css/abnt.css') }}'
        });
    });
</script>

