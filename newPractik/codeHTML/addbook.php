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
<form id="form" action="../php/addBook.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="name_book" placeholder="Название книги" required><br><br>
    <div id="div">
        <p>Данные автора:</p>
        <input   type="text" name="name0" placeholder="Имя" required><br>
        <input type="text" name="surname0" placeholder="Фамилия" required><br>
        <input type="text" name="sursurname0" placeholder="Отчество"><br><br>

    </div>
    <button type="button" id="add">добавить автора</button>
    <br><br>

    <input type="file" name="img"><br>
    <input type="date" name="date_of_writing" required><BR>
    <textarea id="des" name="description" placeholder="Описание" ></textarea><br>

    <button id="a" ><a id="gg" href="admin.php">Вернуться</a></button>
    <button type="submit">Добавить</button>

    <script language="JavaScript">
        let count = 1;
        document.getElementById('add').onclick = function () {
            let div = document.createElement('div');
            div.innerHTML = '        <p>Данные автора:</p>'+'<input type="text" name="name' + count + '"placeholder="Имя"required><br>' +
                ' <input type="text" name="surname' + count + '"placeholder="Фамилия"required><br>' +
                '<input type="text" name="sursurname' + count + '" placeholder="Отчество"><br><br>'
            count++;
            document.querySelector('#div').appendChild(div);
        }
    </script>

</form>
</body>
</html>
