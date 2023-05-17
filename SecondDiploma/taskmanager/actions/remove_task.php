<?php

session_start();

require('../models/database.php');
require('../components/functions.php');
require('../models/user.php');

if (isset($_SESSION['AUTH_USER'])) {
    $user = getUserById($_SESSION['AUTH_USER']);

        if(isset($_GET['id'])) {
            $id = $_GET['id'];
        
            $database->query("DELETE FROM `tasks` WHERE `id` = $id");

            $_SESSION['alerts'][] = "Success! Task \"$id\" has been deleted!";
        }
    } else {
        $_SESSION['errors'][] = "Something went wrong!";
    }

redirect('index');
