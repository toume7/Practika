<?php
session_start();
require_once 'connect.php';
$img = $_FILES['img'];
$extension = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = uniqid() . "." . $extension;
move_uploaded_file($img['tmp_name'], "../uploads/" . $filename);
$idB = checkBookId($_POST['name_book']);
$name_book = trim($_POST['name_book']);
$description = trim($_POST['description']);

if (empty($idB)) {
    $sql = "INSERT INTO book(name_book,img,date_of_writing,description) VALUE(:name,:img,:date_of_writing,:description)";
    $statement = $pdo->prepare($sql);
    $statement->bindParam(":name", $name_book);
    $statement->bindParam(":img", $filename);
    $statement->bindParam(":date_of_writing", $_POST['date_of_writing']);
    $statement->bindParam(":description", $description);
    $statement->execute();
}
$id_book = checkBookId($name_book);

$count = 0;
while (isset($_POST['name' . $count])) {
    $name = trim($_POST['name' . $count]);
    $surname = trim($_POST['surname' . $count]);
    $sursurname = trim($_POST['sursurname' . $count]);
    $idA = getAid($name, $surname, $sursurname);
    if (empty($idA)) {
        $pdo = new PDO("mysql:host=localhost;dbname=practiksavichecv", "root", "root");
        $sql = "INSERT INTO author(name,surname,sursurname) VALUES (:name,:surname,:sursurname)";
        $statement = $pdo->prepare($sql);
        $statement->bindParam(":name", $name);
        $statement->bindParam(":surname", $surname);
        $statement->bindParam(":sursurname", $sursurname);
        $statement->execute();
    }

    $pdo = new PDO("mysql:host=localhost;dbname=practiksavichecv", "root", "root");
    $idA = getAid($name, $surname, $sursurname);
    $tmp_a = intval(current($idA[array_key_last($idA)]));
    $tmp_b = intval(current($id_book[array_key_last($id_book)]));
    $sql = "INSERT INTO beetween(id_autor,id_book) value ('$tmp_a','$tmp_b')";
    $bd = $pdo->prepare($sql);
    $bd->execute();
    $count++;
}

function checkBookId($name)
{
    $pdo = new PDO("mysql:host=localhost;dbname=practiksavichecv", "root", "root");
    $book = $pdo->prepare("SELECT id FROM book where `name_book`='$name'");
    $book->execute();
    $books = $book->FetchAll(PDO::FETCH_ASSOC);
    if (!empty($books))
        return $books;

}

function getAid($name, $surname, $sursurname)
{
    $pdo = new PDO("mysql:host=localhost;dbname=practiksavichecv", "root", "root");
    $id = $pdo->prepare("SELECT id FROM author where `name`='$name' and `surname`='$surname'and `sursurname`='$sursurname'");
    $id->execute();
    $ids = $id->FetchAll(PDO::FETCH_ASSOC);
    if (!empty($ids))
        return $ids;

}

header("Location:../codeHTML/admin.php");


