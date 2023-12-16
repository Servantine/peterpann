<?php
include("../../conn.php");

$sql = "INSERT INTO mahasiswa VALUES('" . $_POST["nim"] . "', '" . $_POST['nama'] . "', '" . $_POST["prodi"] . "', '" . $_POST["fakultas"] . "', '" . $_POST["angkatan"] . "', '" . $_POST["password"] . "', null, null);";

$sql2 = "INSERT INTO dtl_kelompok_kkn VALUES('', '" . $_POST["nim"] . "', '" . $_POST["kelompok"] . "', '" . $_POST["jabatan"] . "');";

if ($conn->query($sql) === TRUE) {
  if ($conn->query($sql2) === TRUE) {
    header('Location: ../mahasiswa.php?success=true');
  } else {
    header('Location: ../mahasiswa.php?success=false');
  }
} else {
  header('Location: ../mahasiswa.php?success=false');
}
