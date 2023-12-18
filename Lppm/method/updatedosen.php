<?php
include("../../conn.php");

$sql = "UPDATE dsn_pembimbing SET nidn = '" . $_POST["nidn"] . "', nama_dosen = '" . $_POST['nama'] . "', jabatan = '" . $_POST["jabatan"] . "', prodi = '" . $_POST["prodi"] . "', fakultas = '" . $_POST["fakultas"] . "', no_telp = '" . $_POST["nomor"] . "', password = '" . $_POST["password"] . "' WHERE nidn = '" . $_POST["nidn_lama"] . "'";

print_r($sql);

if ($conn->query($sql) === TRUE) {
  header('Location: ../dosen.php?success=true');
} else {
  header('Location: ../dosen.php?success=false');
}
?>