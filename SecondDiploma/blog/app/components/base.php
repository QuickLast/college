<?php

session_start();

require("app/database/database.php");

global $database;

require("app/database/models/article.php");
require("app/database/models/user.php");

require("app/services/functions.php");

?>