<?php

$dsn = "mysql:host=localhost;dbname=taskmanager;charset=utf8;";

// new PDO($dsn, 'root', '');
$database = new PDO($dsn, 'root', '');

return $database;