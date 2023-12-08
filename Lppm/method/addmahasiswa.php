<?php
    include("../../conn.php");

    $sql = "INSERT INTO mahasiswa VALUES('".$_POST["nim"]."', '".$_POST['nama']."', '".$_POST["prodi"]."', '".$_POST["fakultas"]."', '".$_POST["angkatan"]."', '', '".$_POST["password"]."', null, null);";

    print_r($sql);

    if ($conn->query($sql) === TRUE) {
        header('Location: ../mahasiswa.php?success=true');
      } else {
        header('Location: ../mahasiswa.php?success=false');
      }
?>