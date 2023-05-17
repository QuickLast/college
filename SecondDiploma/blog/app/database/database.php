<?php

// MACOS: mysql:host=localhost;dbname=blog;charset=utf8 
$dsn = "mysql:host=localhost;dbname=blog;charset=utf8;";

// new PDO($dsn, 'root', '');
$database = new PDO($dsn, 'root', '');

return $database;