<?php
session_start();
require('../php/getbook.php')
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
<header>
    <button class="logo">Duck-Books</button>
    <form action="search.php" method="post">
        <input type="text" name="search" placeholder="Поиск..">
        <button type="submit" class="search">ИСКАТЬ</button>
    </form>
    <ul>

        <li><a href="admin.php">Главная</a></li>
        <li><a id="add" href="addbook.php">Добавить Книгу</a></li>
        <li><a href="main.php">Выйти</a></li>
    </ul>
</header>
<div id="aut">
    <p>*Чтобы войти в режим админа введите данные ниже</p>
    <form action="../php/aut.php" method="post">
        <input type="text" name="login" placeholder="Логин..">
        <input type="text" name="pass" placeholder="Пароль..">
        <a href="#">Закрыть</a>
        <button type="submit">ВОЙТИ</button>

    </form>
</div>
<div id="main_book">
    <?php
    foreach ($posts as $post):?>

        <form id="allbooks" action="view_book_ADMIN.php" method="POST" enctype="multipart/form-data">
            <div id="">
                <img src="../uploads/<?= $post['img']; ?>">
                <div id="glav">
                    <h2 style="text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"> <?= $post['name_book'] ?></h2>
                    <p id="description"> Автор(ы): <?php
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
                            echo $temp['surname'], "  ";


                        }
                        ?></p>
                    <p>Год публикации: <?= $post['date_of_writing'] ?></p>

                    <button type="submit">Открыть</button>
                </div>

            </div>

            <input id="id5" name="id" value="<?= $tmp_a ?>">

        </form>
    <?php endforeach ?>
</div>
<footer>

    <p>Как связаться с нами:</p><br>

    <div class="allfooter">

        <div class="allIcons">
            <a href="https://yandex.ru/images/search?from=tabbar&text=%D0%BA%D0%BE%D1%82%D0%B8%D0%BA%D0%B8&pos=8&img_url=https%3A%2F%2Fcs.pikabu.ru%2Fpost_img%2Fbig%2F2013%2F07%2F10%2F7%2F1373452085_1891535844.jpg&rpt=simage"><img
                        src="">VK</a>
            <a href="https://yandex.ru/images/search?from=tabbar&text=%D0%BA%D0%BE%D1%82%D0%B8%D0%BA%D0%B8&pos=0&img_url=https%3A%2F%2Fpbs.twimg.com%2Fmedia%2FEBdpUraXkAIXxvJ.jpg&rpt=simage"><img
                        src="">INST</a>
            <a hred=""><img src="">PLACE</a>

        </div>
        <button class="logo">Duck-Books</button>
        <p>Тех.поддержка: 8805553535</p>

    </div>

</footer>

</body>

</html>