<?php
include '../config.inc.php';
ob_start();
session_start();
unset($_SESSION["login"]);
unset($_SESSION["stoken"]);
session_destroy();
header("location: $base_url");
?>