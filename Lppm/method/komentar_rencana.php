<?php
    include("../../conn.php");

    $sql = "UPDATE rencana_kegiatan SET komentar_lppm = '".$_POST['komentar']."' WHERE id_rencana_kegiatan = '".$_POST['id_rencana_kegiatan']."'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../rencana.php?success=true&id='.$_POST['id_kelompok']);
      } else {
        header('Location: ../rencana.php?success=false&id='.$_POST['id_kelompok']);
      }
?>