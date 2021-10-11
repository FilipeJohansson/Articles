<?php
include_once('./connection.php');
$title = $_POST['title'];
$description = $_POST['description'];
$editor = $_POST['editor'];

$query = $pdo->prepare("INSERT INTO article (`title`, `description`, `thumb`, `text`) VALUES ('$title','$description','THUMB','$editor');");
$result = $query->execute();

if ($result)
    echo 'DONE';
else
    echo 'ERROR';
exit;
