<?php
session_start();

include('../database/database.php');

unset($_SESSION['errors']);
$_SESSION['errors'] = [];

if (isset($_POST)) {
    $article_id = $_POST['article_id'];
    $user_id = $_SESSION['AUTH_USER'];
    $text = trim($_POST['text']);

    if (strlen($text) < 20) {
        $_SESSION['errors'][] = 'Минимальная длина комментария 20 символов';
    }

    if (strlen($text) >= 300) {
        $_SESSION['errors'][] = 'Максимальная длина комментария не более 300 символов';
    }
    if (count($_SESSION['errors']) === 0) {
        $sql = "INSERT INTO
        `article_comments` (`article_id`, `user_id`, `text`)
        VALUES (:article_id, :user_id, :text)";

        $state = $database->prepare($sql);
        
        $state->execute([
            'article_id' => $article_id,
            'user_id' => $user_id,
            'text' => $text
        ]);
    }
}

$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/post-details.php?id=' . $article_id;

header("Location: $url");
