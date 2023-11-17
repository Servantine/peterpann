<?php
     session_start();

     include("conn.php");

     $username = $_POST["username"];
     $password = $_POST["password"];

     $cek = mysqli_query($conn,"SELECT * FROM `mahasiswa` WHERE username='$username' AND password='$password'");
     $cek2 = mysqli_query($conn,"SELECT * FROM `dsn_pembimbing` WHERE username='$username' AND password='$password'");
     $datamahasiswa = mysqli_fetch_array($cek);
     $datadosen = mysqli_fetch_array($cek2);


     if (mysqli_num_rows($cek) > 0 || mysqli_num_rows($cek2) > 0) {
          if(mysqli_num_rows($cek) > 0) {
          $_SESSION['username'] = $datamahasiswa['username'];
          $_SESSION['nama'] = $datamahasiswa['nama'];
          echo'Mahasiswa ';
          }
          if(mysqli_num_rows($cek2) > 0) {
          $_SESSION['username'] = $datadosen['username'];
          $_SESSION['nama_dosen'] = $datamahasiswa['nama_dosen'];
          echo'Dosen ';
          }
          echo'login berhasil !';
          echo"<meta http-equiv='refresh' content='1; url=dashboard.php'>";
     } else {
          echo"<center> gagal, username atau password salah! ";
          session_destroy();

     }
?>