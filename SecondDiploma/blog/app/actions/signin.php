<?php

session_start();

echo "<pre>";
print_r($_SESSION);
echo "</pre>";

require_once("../database/database.php");

global $database;

unset($_SESSION['errors']);
$_SESSION['errors'] = [];

if (isset($_POST)) {
    $username = $_POST['username'];

    var_dump($username);

    $password = trim($_POST['password']);
    $hash_password = md5($password);

    $user = $database->query("SELECT * FROM `users` WHERE `username` = \"$username\"")->fetch(PDO::FETCH_ASSOC);

    if ($user === false)
    {
        $_SESSION['errors'][] = "Введенное имя пользователя не существует!";
    }

    if ($user['password'] != $hash_password)
    {
        $_SESSION['errors'][] = "Введенный пароль не верен!"; 
    }

    if (strlen($password) < 6)
    {
        $_SESSION['errors'][] = "Минимальная длина пароля - 6 символов!";
    }

    if (count($_SESSION['errors']) === 0)
    {
        $_SESSION['AUTH_USER'] = $user['id'];

        $hostname = explode("/", $_SERVER['PHP_SELF'])[1];
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $hostname . '/index.php';

        header("Location: $url");

        die();
    }
}

$hostname = explode("/", $_SERVER['PHP_SELF'])[1];
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $hostname . '/signin.php';

header("Location: $url");

