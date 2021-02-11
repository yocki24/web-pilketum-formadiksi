<?php 
require_once "../kon/koneksi.php";
session_start();
unset($_SESSION['pin']);
session_destroy();
unset($_SESSION['nama']);
session_destroy();
unset($_SESSION['hasil']);
session_destroy();
header('Location: login.php');
?>