<?php
    include("../../conn.php");

    $sql = "SELECT id_kkn from kkn WHERE kode = '".$_POST['kode']."'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id_kkn"];
    } else {
        header('Location: ../kelompok.php?success=false');
    }

    $sql = "INSERT INTO kelompok_kkn VALUES('', '".$id."', '".$_POST["nidn"]."', '".$_POST['nama']."', '".$_POST["lokasi"]."', '".$_POST["alamat"]."');";

    print_r($sql);

    if ($conn->query($sql) === TRUE) {
        header('Location: ../kelompok.php?success=true');
      } else {
        header('Location: ../kelompok.php?success=false');
      }
?>