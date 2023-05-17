<?php
session_start();

include('../models/database.php');
require('../components/functions.php');

unset($_SESSION['errors']);
$_SESSION['errors'] = [];

if (isset($_POST)) {
    $task_id = $_POST['task_id'];
    $user_id = $_SESSION['AUTH_USER'];
    $text = trim($_POST['text']);

    if (strlen($text) < 2) {
        $_SESSION['errors'][] = 'Минимальная длина комментария 20 символов';
    }

    if (strlen($text) >= 300) {
        $_SESSION['errors'][] = 'Максимальная длина комментария не более 300 символов';
    }
    if (count($_SESSION['errors']) === 0) {
        $sql = "INSERT INTO
        `task_comments` (`task_id`, `user_id`, `text`)
        VALUES (:task_id, :user_id, :text)";

        $state = $database->prepare($sql);
        
        $state->execute([
            'task_id' => $task_id,
            'user_id' => $user_id,
            'text' => $text
        ]);

        redirect('task', 'id=' . $task_id);
    }
}

redirect('task', 'id=' . $task_id);