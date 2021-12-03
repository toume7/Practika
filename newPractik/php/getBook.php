<?php
session_start();
require_once 'connect.php';
$statement = $pdo->prepare("SELECT * FROM book");
$statement->execute();
$posts = $statement->FetchAll(PDO::FETCH_ASSOC);
if(!empty($posts))
    $tmp_a = intval(current($posts[array_key_first($posts)]));

