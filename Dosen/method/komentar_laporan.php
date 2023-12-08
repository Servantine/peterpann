<?php
    include("../../conn.php");

    $sql = "UPDATE laporan_kegiatan SET komentar_dosen = '".$_POST['komentar']."', acc_dosen = true WHERE id_laporan_kegiatan = '".$_POST['id_laporan_kegiatan']."'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../laporan.php?success=true');
      } else {
        header('Location: ../laporan.php?success=false');
      }
?>