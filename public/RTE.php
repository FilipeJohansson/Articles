<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <title>Full Editor - Quill Rich Text Editor</title>
    <!-- Include stylesheet -->
    <!-- Bootstrap v5.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/quill.css" title="article">
    <link rel="stylesheet" href="../src/css/style.css" title="article">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <META http-equiv="Default-Style" content="article">
</head>

<body>
    <header id="" class="p-3 fixed-top d-flex align-items-center">
        <div>
            <label for="inputTitle" class="form-label">Título</label>
            <input type="text" id="inputTitle" class="form-control d-inline" aria-describedby="titleHelpBlock">
            <div id="titleHelpBlock" class="form-text">
                Máximo 100 caracteres
            </div>
        </div>

        <div>
            <button id="publish" type="button" class="btn btn-primary btn-lg start-0">Publicar</button>
        </div>
    </header>

    <!-- Create the editor container -->
    <main class="mt-5 pt-5">
        <div id="scrolling-container" class="pt-4">
            <section class="container mt-3">
                <div class="pb-3">
                    <label for="inputDescription" class="form-label mt-3">Descrição</label>
                    <input type="text" id="inputDescription" class="form-control" aria-describedby="descriptionHelpBlock">
                    <div id="descriptionHelpBlock" class="form-text">
                        Máximo 300 caracteres
                    </div>
                </div>

                <div id="article-editor">
                    <div id="editor" class="p-3">
                        O massa é que essa lista foi indicação de um queridão seguidor do meu canal do YouTube chamado Paulo Camargo, então muito obrigado Paulo!



                        E de fato são repositórios muito "delicinha" e essa matéria/artigo foi escrito pelo Simon Holdorf. Então agora partiu destacar o que tem de mais legal nesse artigo começando pelo:

                        Repositório #1: Construa suas próprias coisas
                        https://github.com/danistefanovic/build-your-own-x

                        O nome original desse repositório é “Build Your Own X” e isso significa “Construa o seu próprio X”, onde o X significa coisas como o seu próprio sistema operacional como eu comentei antes, mas tem muitas outras coisas legais e mais acessíveis que eu vou falar sobre mais para frente, mas eu quero antes dar destaque pra uma imagem sen-sa-ci-o-nal que colocaram no topo do repositório:



                        ﻿É uma imagem com uma frase escrita pelo físico Richard Feynman onde ele diz que “O que eu não consigo criar, eu não entendo.”

                        Caaara! Ler essa frase acendeu um fogo interno dentro de mim em um nível inédito e isso foi muito especial porque naquele exato momento, eu estava justamente aprendendo a programar um dos itens desse repositório que é sobre construir o seu próprio renderizador 3D, mais especificamente o “Raycasting” que foi utilizado em jogos como “Wolfenstein 3D” e turma, é delicioso você digitar linhas de código que você compreende e que começam a montar imagens 3D na tela.

                        Então eu prometo para vocês que, assim que eu finalizar todos os meus estudos sobre esse assunto, eu vou construir a maior playlist de vídeos do mundo sobre Raycasting. Do mundo mesmo! Não vai ter pra gringo, não vai ter pra ninguém! Vai ser tudo feito em português e a didática que eu quero usar vai ser inédita. Eu quero desenvolver uma capacidade computacional dentro da sua cabeça que você vai olhar pra outros assuntos do dia a dia, tipo fazer uma rota de autenticação num serviço web, e vai pensar:

                        “Poxa, mas é só isso? Não da pra pôr um renderizador 3D aí no meio não?”

                        Não, não dá! Por favor não faça isso!

                        Mas se você tiver interesse em chegar nesse nível de vontade, se certifique de estar inscrito no meu canal do YouTube para quando eu anunciar essa série, fechado?

                        E voltando para o primeiro repositório, ele é bem simples e direto, então passando pela apresentação inicial e índice, os tópicos e os respectivos links começam a ser listados e temos, por exemplo, uma seção para Renderizadores 3D, construir o seu próprio client de BitTorrent ou Blockchain, ou emulador de Gameboy ou Mastersystem, ou seu próprio framework frontend (porque a gente tem poucos no mercado… COF!), seu próprio jogo em diversas linguagens (C, C++, C#, Go, Java, JavaScript, Lua, Python, Ruby, Rust), sua própria Rede Neural também em várias linguagens, engine para simulação física, sua própria linguagem de programação e compilador (baita tópico avançado), seu próprio editor de Texto e também tópicos não categorizados como um que é um vídeo sobre como fazer uma inteligência artificial para jogar Tetris em JavaScript.

                        Enfim, é muita coisa massa e com certeza esse repositório vai se tornar fonte de inspiração pra eu aprender tópicos avançados e depois compartilhar esse conhecimento em forma de vídeo no canal e artigos aqui no Medium.

                        E se você acredita estar muito cru para colocar a mão na massa e quer estudar um pouco mais não tem problema. É por isso que a gente tem o:

                        Repositório #2: Livros Gratuitos de Programação
                        https://github.com/EbookFoundation/free-programming-books

                        Esse repositório vai além de somente livros. Ele apresenta também cursos, podcasts, lista de exercícios e programação competitiva. O mais massa é que tem uma seção exclusiva para conteúdos brasileiros!

                        Se a gente navegar na parte de livros, tem uma seção específica para materiais em Português/Brasil, e o índice de linguagens de programação é enorme! Dentro da seção Java, por exemplo, tem coisas da Caelum, que é a empresa irmã da Alura. E entrando na parte de “Java e Orientação a Objetos”, a quantidade de conteúdo do livro é monstruosa, e contém um índice enorme que cobre muita coisa mesmo.

                        O legal é que se você está procurando formas para contribuir no mundo open source, enviar um Pull Request sugerindo novos links para esse tipo de repositório é uma forma fantástica de colocar o pé na água nesse assunto.

                        Se você acha que já está preparado pra isso e está mais a procura de um emprego, chegou a hora do:
                    </div>
                </div>

                <button id="submit" type="submit">
                    Enviar
                </button>
            </section>
        </div>
    </main>

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