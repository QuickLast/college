<?php

session_start();

require('../database/database.php');
require('../database/models/user.php');
require('../services/functions.php');

if (isset($_SESSION['AUTH_USER'])) {
    $user = getUserById($_SESSION['AUTH_USER']);

    if (isAdmin($user)) {
        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        
            $database->query("DELETE FROM `articles` WHERE `id` = $id");

            $_SESSION['alerts'][] = "Success! Article \"$id\" has been deleted!";
        }
    } else {
        $_SESSION['errors'][] = "Not enough rights to do this procedure!";
    }
} else {
    $_SESSION['errors'][] = "This page requires authorization!";
}

redirect('admin', 'id=' . $article_id);
