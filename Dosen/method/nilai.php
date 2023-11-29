<?php
    include("../../conn.php");

    foreach($_POST as $nim => $nilai) {
        $sql = "UPDATE mahasiswa SET nilai = '".$nilai."' WHERE nim = '".$nim."'";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: ../nilai.php?success=true');
      } else {
        header('Location: ../nilai.php?success=false');
      }
?>