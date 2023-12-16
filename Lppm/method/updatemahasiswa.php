<?php
include("../../conn.php");

$sql = "UPDATE mahasiswa SET nim = '" . $_POST["nim"] . "', nama = '" . $_POST['nama'] . "', prodi = '" . $_POST["prodi"] . "', fakultas = '" . $_POST["fakultas"] . "', angkatan = '" . $_POST["angkatan"] . "', password = '" . $_POST["password"] . "' WHERE nim = '" . $_POST["nim"] . "'";

$sql2 = "UPDATE dtl_kelompok_kkn SET nim = '" . $_POST["nim"] . "', id_kelompok = '" . $_POST["kelompok"] . "', jabatan = '" . $_POST["jabatan"] . "' WHERE nim = '" . $_POST["nim"] . "'";

if ($conn->query($sql) === TRUE) {
    if ($conn->query($sql2) === TRUE) {
        header('Location: ../mahasiswa.php?success=true');
    } else {
        header('Location: ../mahasiswa.php?success=false');
    }
} else {
    header('Location: ../mahasiswa.php?success=false');
}
