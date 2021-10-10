<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="utf-8">
    <title>Full Editor - Quill Rich Text Editor</title>
    <!-- Include stylesheet -->
    <link rel="stylesheet" href="../src/css/quill.css" title="article">
    <link rel="stylesheet" href="../src/css/style.css" title="article">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <META http-equiv="Default-Style" content="article">
</head>

<body>
    <!-- Create the editor container -->
    <div id="scrolling-container">
        <section>
            <div class="article">
                <div id="editor">
                </div>
            </div>
        </section>
    </div>
    <button id="submit" type="submit">
        Enviar
    </button>
    <div id="test"></div>

    <script>
        $('body').on('click', '#submit', function() {
            const editor = document.getElementsByClassName('ql-editor')
            console.log(editor[0].innerHTML)

            $.ajax({
                type: "POST",
                url: "../src/php/sendArticle.php",
                data: {
                    teste: editor[0].innerHTML
                },
                success: function(result) {
                    console.log(result)
                }
            });
        });
    </script>

    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var Delta = Quill.import('delta');
        var quill = new Quill('#editor', {
            modules: {
                toolbar: [
                    [{
                        header: [2, false]
                    }],
                    ['bold', 'italic', 'underline', 'blockquote'],
                    ['link', 'image', 'video'],
                    [{
                        'align': []
                    }],
                    [{
                        'list': 'ordered'
                    }, {
                        'list': 'bullet'
                    }],
                    [{
                        'indent': '-1'
                    }, {
                        'indent': '+1'
                    }],
                    ['clean']
                ]
            },
            scrollingContainer: '#scrolling-container',
            placeholder: 'Escreva aqui seu artigo',
            theme: 'snow' // or 'bubble'
        });

        // Store accumulated changes
        var change = new Delta();
        quill.on('text-change', function(delta) {
            change = change.compose(delta);
        });

        // Save periodically
        setInterval(function() {
            if (change.length() > 0) {
                console.log('Saving changes', change);
                /* 
                Send partial changes
                $.post('/your-endpoint', { 
                  partial: JSON.stringify(change) 
                });
                
                Send entire document
                $.post('/your-endpoint', { 
                  doc: JSON.stringify(quill.getContents())
                });
                */
                change = new Delta();
            }
        }, 5 * 1000);

        // Check for unsaved data
        window.onbeforeunload = function() {
            if (change.length() > 0) {
                return 'There are unsaved changes. Are you sure you want to leave?';
            }
        }
    </script>
</body>

</html>