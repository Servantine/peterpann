<?php
    include("../../conn.php");

    $sql = "INSERT INTO dsn_pembimbing VALUES('".$_POST["nidn"]."', '".$_POST['nama']."', '".$_POST["jabatan"]."', '".$_POST["prodi"]."', '".$_POST["fakultas"]."', '".$_POST["nomor"]."', '".$_POST["password"]."');";

    print_r($sql);

    if ($conn->query($sql) === TRUE) {
        header('Location: ../dosen.php?success=true');
      } else {
        header('Location: ../dosen.php?success=false');
      }
?>