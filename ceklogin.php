<?php

include("conn.php");

$username = $_POST["username"];
$password = $_POST["password"];

$cek = mysqli_query($conn, "SELECT mahasiswa.nama, dtl_kelompok_kkn.jabatan AS 'status' FROM mahasiswa INNER JOIN dtl_kelompok_kkn ON mahasiswa.nim = dtl_kelompok_kkn.nim WHERE mahasiswa.nim='$username' AND mahasiswa.password='$password'");
$cek2 = mysqli_query($conn, "SELECT * FROM `dsn_pembimbing` WHERE nidn='$username' AND password='$password'");
$cek3 = mysqli_query($conn, "SELECT * FROM `lppm` WHERE id_lppm='$username' AND password='$password'");
$datamahasiswa = mysqli_fetch_array($cek);
$datadosen = mysqli_fetch_array($cek2);
$datalppm = mysqli_fetch_array($cek3);


if (mysqli_num_rows($cek) > 0) {
     session_start();
     $_SESSION['nama'] = $datamahasiswa['nama'];
     $_SESSION['nim'] = $datamahasiswa['nim'];
     $_SESSION['status'] = $datamahasiswa['status'];
     header('Location: ./Mahasiswa/dashboard.php');
}
else if (mysqli_num_rows($cek2) > 0) {
     session_start();
     $_SESSION['nama'] = $datadosen['nama_dosen'];
     $_SESSION['nidn'] = $datadosen['nidn'];
     $_SESSION['status'] = "dosbing";
     header('Location: ./Dosen/dashboard.php');
}
else if(mysqli_num_rows($cek3) > 0) {
     session_start();
     $_SESSION['nama'] = $datalppm['nama_lppm'];
     $_SESSION['status'] = "lppm";
     header('Location: ./Lppm/dashboard.php');
} else {
     header('Location: ./login.php?login=failed');
}

?>