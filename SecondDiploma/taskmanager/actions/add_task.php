<?php

session_start();

global $id;
$id = 1;

require('../models/database.php');
require('../models/task.php');
require('../components/functions.php');

unset($_SESSION['errors']);
$_SESSION['errors'] = [];

if (isset($_POST)) {
    $name = trim($_POST['name']);
    $tag = trim($_POST['tag']);

    if (strlen($name) <= 3) {
        $_SESSION['errors'][] = "Minimum \"title\" length 4 characters";
    }

    if (strlen($tag) <= 3) {
        $_SESSION['errors'][] = "Minimum \"tag\" length 4 characters";
    }

    if (!auth()) {
        $_SESSION['errors'][] = "Only auth user!";
    }

    if (count($_SESSION['errors']) === 0) {
        $data = [
            'name' => $name,
            'tag' => $tag,
        ];

        $task = createTask($data);

        redirect('index');
    }
}

redirect('index');