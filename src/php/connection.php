<?php
header('Content-Type: text/html; charset=utf-8');
$connection = "mysql:host=localhost;dbname=articles";

try {
	$pdo = new PDO($connection, "root", "") or die();
} catch (PDOException $e) {
	echo $e;
}
