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
}

function generateFilename($file): string
{
    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);

    $filename = uniqid() . '.' . $extension;

    return $filename;
}

function uploadFile($file, string $to)
{
    $filename = generateFilename($file);

    var_dump($_SERVER['DOCUMENT_ROOT'] . '/blog/' . $to . '/' . $filename);

    if (move_uploaded_file($file['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/' . $to . '/' . $filename)) {
        return 'public/images/' . $filename;
    }

    return false;
}
