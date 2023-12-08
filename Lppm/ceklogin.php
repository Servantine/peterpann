<?php

include("conn.php");

$username = $_POST["username"];
$password = $_POST["password"];

$cek3 = mysqli_query($conn, "SELECT * FROM `lppm` WHERE id_lppm='$username' AND password='$password'");
$datalppm = mysqli_fetch_array($cek3);


if(mysqli_num_rows($cek3) > 0) {
     session_start();
     $_SESSION['nama'] = $datalppm['nama_lppm'];
     $_SESSION['id_lppm'] = $datalppm['id_lppm'];
     $_SESSION['status'] = "lppm";
     header('Location: ./dashboard.php');
} else {
     header('Location: ./login.php?login=failed');
}

?>