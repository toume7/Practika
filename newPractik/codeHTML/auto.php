<?php
session_start();
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
<div id="aut">

    <form action="../php/aut.php" method="post">
        <p id="p">*Чтобы войти в режим админа введите данные ниже</p>
        <input type="text" name="login" placeholder="Логин..">
        <input type="text" name="pass" placeholder="Пароль..">
        <a id="a" href="main.php">Закрыть</a>
        <button type="submit">Войти</button>

    </form>
</div>

</body>
</html>
