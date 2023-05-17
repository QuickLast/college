<?php

function formatDate(string $date, string $format = "M d, Y"): string
{
    return date($format, strtotime($date));
}

function auth()
{
    return isset($_SESSION['AUTH_USER']) ? intval($_SESSION['AUTH_USER']) : false;
}

function redirect(string $to = "index", string $params = "")
{
    $hostname = explode("/", $_SERVER['PHP_SELF'])[1];

    $params = strlen($params) > 0 ? '?' . $params : '';

    $url = $_SERVER['REQUEST_SCHEME'] . '://' . $_SERVER['HTTP_HOST'] . '/' . $hostname . '/' . $to . '.php' . $params;

    header("Location: $url");

    die();
}

