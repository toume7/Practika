<?php
session_start();
require_once 'connect.php';
$login = $_POST['login'];
$pass = $_POST['pass'];
$getUser = $pdo->prepare("SELECT * FROM admin where `login`='$login'and `pass`='$pass'");
$getUser->execute();
$user = $getUser->fetchAll(PDO::FETCH_ASSOC);
if (!empty($user)) {
    header('Location: ../codeHTML/admin.php');
} else {
//    $_SESSION['message'] = 'неверные данные';
    header('Location: ../html-css/user/index.php');
}