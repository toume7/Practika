<?php
require_once "connect.php";
$img = $_FILES['img'];
$extension = pathinfo($img['name'], PATHINFO_EXTENSION);
$filename = uniqid() . "." . $extension;
move_uploaded_file($img['tmp_name'], "../uploads/" . $filename);
$temp_a = $_POST['name_book'];
$temp_date = $_POST['date_of_writing'];
$temp_descr = $_POST['description'];
$temp_id = $_POST['id'];
$count = 0;
while (empty($_POST['name' . $count])) {
    $temp_name = $_POST['name' . $count];
    $temp_sur = $_POST['surname' . $count];
    $temp_sursur = $_POST['sursurname' . $count];
}

if (empty($img['name'])) {
    $statement = $pdo->prepare("UPDATE book SET `name_book`='$temp_a',`date_of_writing`='$temp_date',`description`='$temp_descr' where `id`='$temp_id'");
    $statement->execute();

} else {
    $statement = $pdo->prepare("UPDATE book SET `name_book`='$temp_a',`img`='$filename',`date_of_writing`='$temp_date',`description`='$temp_descr' where `id`='$temp_id'");
    $statement->execute();
}
$id = $pdo->prepare("SELECT id_autor FROM beetween WHERE `id_book`='$temp_id'");
$id->execute();
$ids = $id->FetchAll(PDO::FETCH_ASSOC);
foreach ($ids as $id) {
        $temp_name = $_POST['name' . $count];
        $temp_sur = $_POST['surname' . $count];
        $temp_sursur = $_POST['sursurname' . $count];

//    var_dump($temp_name);
    $id_user = intval($id['id_autor']);
    $author = $pdo->prepare("UPDATE author SET `name`='$temp_name',`surname`='$temp_sur',`sursurname`='$temp_sursur' WHERE `id`='$id_user'");
    $author->execute();
    $count++;
}
header("Location:../codeHTML/admin.php");