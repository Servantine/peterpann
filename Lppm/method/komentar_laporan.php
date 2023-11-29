<?php
    include("../../conn.php");

    $sql = "UPDATE laporan_kegiatan SET komentar_lppm = '".$_POST['komentar']."' WHERE id_laporan_kegiatan = '".$_POST['id_laporan_kegiatan']."'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../laporan.php?success=true&id='.$_POST['id_kelompok']);
      } else {
        header('Location: ../laporan.php?success=false&id='.$_POST['id_kelompok']);
      }
?>