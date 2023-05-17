<?php

session_start();

// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";


// die(getcwd() . '/../../public/images');

require_once("../database/database.php");

global $database;

unset($_SESSION['errors']);
$_SESSION['errors'] = [];

if (isset($_POST)) {
    $username = $_POST['username'];
    $email = $_POST['email'];

    $password = trim($_POST['password']);
    $re_password = trim($_POST['re_password']);

    // var_dump($_FILES);

    $file = NULL;

    if (isset($_FILES['photo'])) {
        $extension = pathinfo($_FILES['photo']['name'], PATHINFO_EXTENSION);

        $fileName = uniqid() . '.' . $extension;

        $mimes = ['image/jpeg', 'image/png', 'image/jpg'];

        if (!in_array($_FILES['photo']['type'], $mimes)) {
            $_SESSION['errors'][] = "Допустимые типы файла: .jpg, .jpeg, .jpg";
        }
        
        $file = [
            'input' => $_FILES['photo']['tmp_name'],
            'out' => '/Applications/XAMPP/xamppfiles/htdocs/blog/public/images' . $fileName
        ];

        var_dump($file);
    }

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

    if (count($_SESSION['errors']) === 0) {
        $hash_password = md5($password);

        $path = $file === NULL ? "public/images/default.png" : $file['out'];

        $create_query = "INSERT INTO `users`(`username`, `email`, `password`, `path`) 
                        VALUES ('$username', \"$email\", \"$hash_password\", \"$path\")";

        if ($file) {
            var_dump(move_uploaded_file($file['input'], '../../'.$file['out']));
        }

        $database->query($create_query);

        $user_id = $database->lastInsertId();

        $_SESSION['AUTH_USER'] = $user_id;

        $hostname = explode("/", $_SERVER['PHP_SELF'])[1];
        $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $hostname . '/index.php';

        header("Location: $url");

    }
}

$hostname = explode("/", $_SERVER['PHP_SELF'])[1];
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $hostname . '/signup.php';

header("Location: $url");
