<?php
require_once "connect.php";
$id_t = intval($_POST['id']);
$book = $pdo->prepare("DELETE FROM book WHERE `id`='$id_t'");
$book->execute();
header("Location:../codeHTML/admin.php");