<?php

const ADMIN = 'admin';

function getUserById($id)
{
    global $database;

    $sql = "SELECT * FROM `users` WHERE `id` = :id";

    $state = $database->prepare($sql);

    $state->execute(['id' => $id]);

    $user = $state->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        return [];
    }

    return $user;
}

function isAdmin($user) 
{
    return $user['role'] === ADMIN;
}