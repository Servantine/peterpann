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

    $sql = "UPDATE kelompok_kkn SET id_kkn = '".$id."', nidn = '".$_POST["nidn"]."', nama_kelompok = '".$_POST['nama']."', lokasi = '".$_POST["lokasi"]."', alamat = '".$_POST["alamat"]."' WHERE id_kelompok = '".$_POST["id_kelompok"]."'";

    if ($conn->query($sql) === TRUE) {
        header('Location: ../kelompok.php?success=true');
      } else {
        header('Location: ../kelompok.php?success=false');
      }
?>