<?php
session_start();
require('../php/getnewbook.php');
require_once "../php/connect.php";
$posts = e($_POST['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/main.css">

    <title>ГЛАВНАЯ</title>
</head>
<body>
<div id="aut">
    <form action="../php/aut.php" method="post">
        <p>*Чтобы войти в режим админа введите данные ниже</p>
        <input type="text" name="login" placeholder="Логин..">
        <input type="text" name="pass" placeholder="Пароль..">
        <a href="#">Закрыть</a>
        <button type="submit">ВОЙТИ</button>

    </form>
</div>
<header>
    <button class="logo">Duck-Books</button>
    <form action="search_USer.php" method="post">
        <input type="text" name="search" placeholder="Поиск..">
        <button type="submit" class="search">ИСКАТЬ</button>
    </form>
    <ul>
        <li><a href="main.php">Главная</a></li>
        <li><a href="auto.php">Режим админа</a></li>
    </ul>
</header>
<div id="view_book">
    <?php foreach ($posts

                   as $post): ?>
        <img id="photo" src="../../uploads/<?= $post['img']; ?>">
        <h1><?= $post['name_book'] ?></h1>

        <p>Автор(ы):
            <?php
            $tmp_a = $post['id'];
            $id = $pdo->prepare("SELECT id_autor FROM beetween WHERE `id_book`='$tmp_a'");
            $id->execute();
            $id = $id->FetchAll(PDO::FETCH_ASSOC);
            foreach ($id as $i) {

                $temp_i = $i['id_autor'];
                $ids = intval($temp_i);
                $author = $pdo->prepare("SELECT * FROM author where `id`='$ids'");
                $author->execute();
                $author = $author->FetchAll(PDO::FETCH_ASSOC);
                $temp = $author['0'];
                echo $temp['name'], " ";
                echo $temp['surname'], "<br>";


            }
            ?></p>
        <div id="div"><p id="description2"><?= $post['description'] ?></p></div>
        <p id="tt">Дата публикации: <?= $post['date_of_writing'] ?></p>

    <?php endforeach; ?>
</div>
</div>

<footer>

    <p>Как связаться с нами:</p><br>

    <div class="allfooter">

        <div class="allIcons">
            <a hred=""><img src="">VK</a>
            <a hred=""><img src="">INST</a>
            <a hred=""><img src="">PLACE</a>

        </div>
        <button class="logo">Duck-Books</button>
        <p>Тех.поддержка: 8805553535</p>

    </div>

</footer>

</body>

</html>