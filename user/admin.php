<?php 
session_start();
$title = "root";
$str = "관리자 페이지";
include("./config.php");
require_once("./func.php");
include("../../html/top.php");
?>
<?php
ensure_user_is_auth();
echo "<p>{$_SESSION['email']}</p>";
?>
<p><a href="./logout.php">logout</a></p>
<?php
include("../../html/btm.php");
?>