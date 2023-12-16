<?php
    include("../../conn.php");

    $sql = "UPDATE kkn SET kode = '".$_POST["kode_kkn"]."', id_lppm = '".$_POST['id_lppm']."', nama_kkn = '".$_POST["nama_kkn"]."', tema = '".$_POST["tema_kkn"]."', tanggal_mulai = '".$_POST["mulai_kkn"]."', tanggal_selesai = '".$_POST["selesai_kkn"]."' WHERE id_kkn = '".$_POST["id_kkn"]."'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../kkn.php?success=true');
      } else {
        header('Location: ../kkn.php?success=false');
      }
?>