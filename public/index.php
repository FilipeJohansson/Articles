<?php
include_once('../src/php/connection.php');

$pubs = $pdo->prepare("SELECT * FROM article WHERE id = 12");
$pubs->execute();

while ($pub = $pubs->fetch(PDO::FETCH_ASSOC)) {
    $title = $pub['title'];
    $description = $pub['description'];
    $article = $pub['text'];
    $thumb = '../src/images/image.jpg';
}
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <title>Article</title>

    <!-- Bootstrap v5.0 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../src/css/style.css">

    <!-- Bootstrap icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    <!-- Bootstrap v5.0 JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <!-- jQuery 3.6 -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital@1&display=swap" rel="stylesheet">
</head>

<body>
    <main class="container">
        <div class="row justify-content-center">
            <div class="col-8 align-self-center">
                <section id="header">
                    <div id="details">
                        <a href="#" id="author">
                            <img id="author-picture" src="../src/images/picture.jpg">
                            <span id="author-name">Filipe Johansson</span>
                        </a>
                        <div id="date">
                            30 Set 2021
                        </div>
                    </div>
                    <h1 id="title">
                        <?php
                        echo $title;
                        ?>
                    </h1>
                    <div id="description">
                        <?php
                        echo $description;
                        ?>
                    </div>
                    <div id="image">
                        <img src="<?php echo $thumb; ?>">
                    </div>
                </section>
                <section>
                    <div id="article">
                        <?php
                        echo $article;
                        ?>
                    </div>
                </section>
            </div>
        </div>

    </main>
</body>

</html>