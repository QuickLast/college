<?php

session_start();

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";

// var_dump($_POST);

require_once("../models/database.php");

global $database;

unset($_SESSION['errors']);
$_SESSION['errors'] = [];

// var_dump($_SESSION['errors']);

if (isset($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $password = trim($_POST['password']);
    $re_password = trim($_POST['re_password']);

    $file = NULL;

    $username_exists = $database->query("SELECT * FROM `users` WHERE `username` = \"$username\"")->fetch(PDO::FETCH_ASSOC) === false ? false : true;
    $email_exists = $database->query("SELECT * FROM `users` WHERE `email` = \"$email\"")->fetch(PDO::FETCH_ASSOC) === false ? false : true;

    if ($email_exists) {
        $_SESSION['errors'][] = "Адрес электронной почты \"$email\" уже занят!";
    }

    if ($username_exists) {
        $_SESSION['errors'][] = "Имя пользователя \"$username\" уже существует!";
    }

    if (strlen($password) < 6) {
        $_SESSION['errors'][] = "Минимальная длина пароля - 6 символов!";
    }

    if ($password != $re_password) {
        $_SESSION['errors'][] = "Пароли не совпадают!";
    }

    var_dump($_SESSION);

    if (count($_SESSION['errors']) === 0) {
        $hash_password = md5($password);

        $create_query = "INSERT INTO `users`(`username`, `password`, `email`) 
                        VALUES ('$username', \"$hash_password\", \"$email\")";

        $database->query($create_query);

        $user_id = $database->lastInsertId();

        $_SESSION['AUTH_USER'] = $user_id;

        $hostname = explode("/", $_SERVER['PHP_SELF'])[1];
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $hostname . '/index.php';

        header("Location: $url");
        die();
    }
}

$hostname = explode("/", $_SERVER['PHP_SELF'])[1];
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $hostname . '/signup.php';

header("Location: $url");
die();