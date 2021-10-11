<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Full Editor - Quill Rich Text Editor</title>
    <!-- Include stylesheet -->
    <!-- Bootstrap v5.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="//cdn.quilljs.com/1.3.6/quill.snow.css">
    <link rel="stylesheet" href="../src/css/quill.css" title="article">
    <link rel="stylesheet" href="../src/css/style.css" title="article">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <META http-equiv="Default-Style" content="article">
</head>

<body>
    <header id="" class="fixed-top d-flex align-items-center">
        <div class="header-title">
            <input type="text" autocomplete="off" id="inputTitle" class="form-control d-inline" aria-describedby="titleHelpBlock" required>
            <label for="inputTitle" class="form-label">Título</label>
            <div id="titleHelpBlock" class="form-text">
                Máximo 100 caracteres
            </div>
        </div>

        <div class="header-buttons">
            <button id="publish" type="submit" class="btn btn-primary btn-lg start-0 mx-0 my-0">
                <span class="d-flex" style="flex-direction: row; align-items: center;">
                    Publicar
                    <span class="material-icons" style="margin-left: .3rem;">
                        send
                    </span>
                </span>
            </button>
        </div>
    </header>

    <!-- Create the editor container -->
    <main class="mt-5 pt-5">
        <div id="scrolling-container" class="pt-4">
            <section class="container col-6 mt-3">
                <div class="pb-3">
                    <label for="inputArticleImage" class="form-label">Capa do Artigo</label>
                    <input type="file" accept=".png, .jpg, .jpeg" class="form-control" id="inputArticleImage" aria-label="Upload">
                </div>

                <div class="pb-3">
                    <label for="inputDescription" class="form-label">Descrição</label>
                    <textarea type="text" id="inputDescription" rows="3" class="form-control" aria-describedby="descriptionHelpBlock"></textarea>
                    <div id="descriptionHelpBlock" class="form-text">
                        Máximo 300 caracteres
                    </div>
                </div>

                <label class="form-label">Escreva seu artigo</label>
                <div id="article-editor">
                    <div id="editor" class="p-3 mb-4">
                    </div>
                </div>

                <div id="toolbar" class="fixed-bottom">
                    <span class="ql-formats">
                    </span>
                    <span class="ql-formats">
                        <span class="ql-formats">
                            <button class="ql-header" value="" label="Normal" selected>Normal</button>
                        </span>
                        <span class="ql-formats">
                        </span>
                        <span class="ql-formats">
                            <button class="ql-header" value="2" label="Subtítulo">Subtítulo</button>
                        </span>
                    </span>

                    <span class="ql-formats">
                        <button class="ql-bold"></button>
                        <button class="ql-italic"></button>
                        <button class="ql-underline"></button>
                        <button class="ql-blockquote"></button>
                    </span>

                    <span class="ql-formats">
                        <button class="ql-link"></button>
                        <button class="ql-image"></button>
                        <button class="ql-video"></button>
                    </span>

                    <span class="ql-formats">
                        <select class="ql-align">
                            <option selected></option>
                            <option value="center"></option>
                            <option value="right"></option>
                            <option value="justify"></option>
                        </select>
                    </span>

                    <span class="ql-formats">
                        <button class="ql-list" value="ordered"></button>
                        <button class="ql-list" value="bullet"></button>
                    </span>

                    <span class="ql-formats">
                        <button class="ql-indent" value="+1"></button>
                        <button class="ql-indent" value="-1"></button>
                    </span>

                    <span class="ql-formats">
                        <button class="ql-clean"></button>
                    </span>
                </div>
            </section>
        </div>
    </main>

    <script>
        $('body').on('click', '#publish', function() {
            const title = document.getElementById('inputTitle').value
            const description = document.getElementById('inputDescription').value
            const editor = document.getElementsByClassName('ql-editor')

            $.ajax({
                type: "POST",
                url: "../src/php/sendArticle.php",
                data: {
                    title: title,
                    description: description,
                    editor: editor[0].innerHTML
                },
                success: function(result) {
                    //console.log(result)
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
                toolbar: '#toolbar'
                /*[
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
                               ]*/
            },
            scrollingContainer: '#scrolling-container',
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