<?php
session_start();
require_once 'connect.php';
$login = $_POST['user'];
$pass = $_POST['pass'];
$check_user = mysqli_query($pdo, "SELECT * FROM `admin`where `login`='$login'and `password`='$pass'");
if (mysqli_num_rows($check_user) > 0) {
    header('location: aut.php');
} else {
    $_SESSION['message'] = 'неверные данные';
    header('location: index.php');
}