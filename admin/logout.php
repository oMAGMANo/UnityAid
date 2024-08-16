<?php
include '../config.inc.php';
ob_start();
session_start();
unset($_SESSION["admin_login"]);
unset($_SESSION["admin_stoken"]);
session_destroy();
header("location: $base_url/admin");
?>