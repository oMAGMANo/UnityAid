<?php
ob_start();
session_start();
include '../config.inc.php';

if(!empty($_SESSION['admin_login'])){
if($_SESSION['admin_login'] != "" & $_SESSION['admin_stoken']!='bbd93f4ec95f7d856c53e3f9c4bf7dee71acaf34f290ef277f9effd35cb6e513'){ 
   echo '<script> window.location.href="logout.php"; </script>'; 
}
} else {
  echo '<script> window.location.href="logout.php"; </script>';   
}