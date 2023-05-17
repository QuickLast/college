<?php

session_start();

require('../database/database.php');
require('../database/models/Article.php');
require('../services/functions.php');

unset($_SESSION['errors']);
$_SESSION['errors'] = [];

if (isset($_POST)) {
    $title = trim($_POST['title']);
    $theme = trim($_POST['theme']);
    $content = trim($_POST['content']);

    if (strlen($title) <= 3) {
        $_SESSION['errors'][] = "Minimum \"title\" length 4 characters";
    }

    if (strlen($theme) <= 3) {
        $_SESSION['errors'][] = "Minimum \"theme\" length 4 characters";
    }

    if (strlen($content) < 20) {
        $_SESSION['errors'][] = "Minimum \"content\" length 20 characters";
    }

    if (!auth()) {
        $_SESSION['errors'][] = "Only auth user!";
    }

    if (isset($_FILES['photo'])) {
        $mimes = ['image/jpeg', 'image/png', 'image/jpg'];

        if (!in_array($_FILES['photo']['type'], $mimes)) {
            $_SESSION['errors'][] = "Допустимые типы файла: .jpg, .jpeg, .png";
        }
    }

    $filename = uploadFile($_FILES['photo'], '../../public/images');

    if (count($_SESSION['errors']) === 0) {
        $data = [
            'title' => $title,
            'theme' => $theme,
            'content' => $content,
            'image_path' => $filename,
            'id' => $_POST['id']
        ];

        $article = updateArticle($data);

        redirect('post-details', 'id=' . $_POST['id']);
        die();
    }
}

redirect('update-article', 'id=' . $_POST['id']);
die();