<?php
include 'conn.php';

$nim_pengguna = '72210456';

$sqlLogbook = "SELECT DISTINCT logbook.tanggal
                FROM logbook
                JOIN mahasiswa ON logbook.nim = mahasiswa.nim
                JOIN dtl_kelompok_kkn ON mahasiswa.nim = dtl_kelompok_kkn.nim
                JOIN kelompok_kkn ON dtl_kelompok_kkn.id_kelompok = kelompok_kkn.id_kelompok
                JOIN kkn ON kelompok_kkn.id_kkn = kkn.id_kkn
                WHERE mahasiswa.nim = '$nim_pengguna';";
$resultLogbook = $conn->query($sqlLogbook);

$existingDates = array();

if ($resultLogbook->num_rows > 0) {
    while ($rowLogbook = $resultLogbook->fetch_assoc()) {
        $existingDates[] = $rowLogbook['tanggal'];
    }
}

echo json_encode($existingDates);

$conn->close();
?>
