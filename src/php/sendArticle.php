<?php
include_once('./connection.php');
$text = $_POST['teste'];
$query = $pdo->prepare("INSERT INTO article (`title`, `description`, `thumb`, `text`) VALUES ('TITULO','DESCRIÇÃO','THUMB','$text');");
$result = $query->execute();

if ($result)
    echo 'DONE';
else
    echo 'ERROR';
exit;
