<?php

session_start();

session_unset();
session_destroy();

$hostname = explode("/", $_SERVER['PHP_SELF'])[1];
$url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $hostname . '/index.php';

header("Location: $url");