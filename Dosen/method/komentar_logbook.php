<?php
    include("../../conn.php");

    $sql = "UPDATE logbook SET komentar_dosen = '".$_POST['komentar']."' WHERE id_logbook = '".$_POST['id_logbook']."'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../logbook.php?nim='.$_POST['nim'].'&success=true');
      } else {
        header('Location: ../logbook.php?nim='.$_POST['nim'].'&success=false');
      }
?>