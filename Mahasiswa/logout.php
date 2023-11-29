<?php
session_start();
unset($_SESSION['nama']);
unset($_SESSION['status']);
session_destroy();
header("Location:../login.php");
?>