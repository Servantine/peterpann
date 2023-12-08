<?php
    include("../../conn.php");

    $sql = "INSERT INTO kkn VALUES('', '".$_POST["kode_kkn"]."', '".$_POST['id_lppm']."', '".$_POST["nama_kkn"]."', '".$_POST["tema_kkn"]."', '".$_POST["mulai_kkn"]."', '".$_POST["selesai_kkn"]."');";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../kkn.php?success=true');
      } else {
        header('Location: ../kkn.php?success=false');
      }
?>