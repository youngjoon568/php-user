<?php
session_start();
session_unset();
session_destroy();

require_once("./func.php");
redirect('./login.php');
die();
?>