<?php
session_start();
require_once "../php/getnewbook.php";
require_once "../php/connect.php";
$posts = e($_POST['id']);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../css/autorizationAdmin.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Авторизация</title>
</head>
<body>
<div id="editing">
    <?php foreach ($posts as $post): ?>
        <div id="name">
            <form id="form" action="../php/edit_book.php" method="POST" enctype="multipart/form-data">
                <input type="text" name="name_book" placeholder="Название книги" value="<?= $post['name_book'] ?>"><br>
                <br>
                <div id="div">
                    <?php foreach ($posts as $post): ?>
                        <?php
                        $tmp_a = $post['id'];
                        $id = $pdo->prepare("SELECT id_autor FROM beetween WHERE `id_book`='$tmp_a'");
                        $id->execute();
                        $id = $id->FetchAll(PDO::FETCH_ASSOC);
                        $count=0;?>

                        <?php foreach ($id as $i): ?><?php

                            $temp_i = $i['id_autor'];
                            $ids = intval($temp_i);
                            $author = $pdo->prepare("SELECT * FROM author where `id`='$ids'");
                            $author->execute();
                            $author = $author->FetchAll(PDO::FETCH_ASSOC);
                            $temp = $author['0'];

                            ?>
                            <input type="text" name="name<?=$count ?>" placeholder="Имя" value="<?= $temp['name'] ?>">
                            <input type="text" name="surname<?=$count ?>" placeholder="Фамилия" value="<?= $temp['surname'] ?>">
                            <?php if (empty($temp['sursurname'.$count]))
                                $temp['sursurname'.$count] = ' ' ?>
                            <input type="text" name="sursurname<?=$count ?>" placeholder="Отчество"
                                   value="<?= $temp['sursurname'] ?>"><br>
                        <p hidden><?= $count++;?></p>
                        <?php endforeach; ?>

                    <?php endforeach; ?>
                </div>

                <input type="file" name="img"><br>
                <input type="date" name="date_of_writing" value="<?= $post['date_of_writing'] ?>"><BR>
                <textarea name="description" placeholder="Описание"><?= $post['description'] ?></textarea><br>

                <button type="submit">Обновить</button>
                <input type="text" name="id" value="<?= $tmp_a ?>" style="display: none">
                <form action="../codeHTML/view_book_ADMIN.php" method="post">
                    <button type="submit">Закрыть окно</button>
                    <input hidden name="id" value="<?= $tmp_a ?>" style="    display: none;
">
                </form>
            </form>
            <form action="../php/delet_book.php" method="POST">
                <input hidden type="text" name="id" value="<?= $tmp_a ?>" style="display: none">
                <button type="submit">Удалить</button>
            </form>
        </div>
    <?php endforeach; ?>
</div>
</body>
</html>
