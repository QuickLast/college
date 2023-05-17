<?php

session_start();

require('../models/database.php');
require('../models/task.php');
require('../components/functions.php');

unset($_SESSION['errors']);
$_SESSION['errors'] = [];


if (isset($_POST)) {
    $name = trim($_POST['name']);
    $tag = trim($_POST['tag']);
    $id = intval($_POST['id']);

    // if (strlen($title) <= 3) {
    //     $_SESSION['errors'][] = "Minimum \"title\" length 4 characters";
    // }

    // if (strlen($theme) <= 3) {
    //     $_SESSION['errors'][] = "Minimum \"theme\" length 4 characters";
    // }

    // if (!auth()) {
    //     $_SESSION['errors'][] = "Only auth user!";
    // }

    // if (count($_SESSION['errors']) === 0) {
        $data = [
            'name' => $name,
            'tag' => $tag,
            'id' => $id,
        ];

        $task = updateTask($data);

        redirect('task', 'id=' . $id);
    }


redirect();