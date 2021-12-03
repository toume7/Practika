<?php
session_start();
function e($ID)
{
    $pdo=new PDO("mysql:host=localhost;dbname=practiksavichecv","root","root");
    $id = intval($ID);
    $statement = $pdo->prepare("SELECT * FROM book  where `id`='$id'");
    $statement->execute();
    $posts = $statement->FetchAll(PDO::FETCH_ASSOC);
    return $posts;
}