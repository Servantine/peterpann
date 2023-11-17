<?php
include 'conn.php';

$nim_pengguna = '72210456';

$sqlKKN = "SELECT kkn.tanggal_mulai, kkn.tanggal_selesai
    FROM kkn
    JOIN kelompok_kkn ON kkn.id_kkn = kelompok_kkn.id_kkn
    JOIN dtl_kelompok_kkn ON kelompok_kkn.id_kelompok = dtl_kelompok_kkn.id_kelompok
    JOIN mahasiswa ON dtl_kelompok_kkn.nim = mahasiswa.nim
    WHERE mahasiswa.nim = '$nim_pengguna';";
$resultKKN = $conn->query($sqlKKN);

if ($resultKKN->num_rows > 0) {
    $rowKKN = $resultKKN->fetch_assoc();
    $tanggalMulai = new DateTime($rowKKN['tanggal_mulai']);
    $tanggalSelesai = new DateTime($rowKKN['tanggal_selesai']);

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

    // Membuat array tanggal yang dapat dipilih
    $availableDates = array();
    $currentDate = clone $tanggalMulai;

    while ($currentDate <= $tanggalSelesai) {
        $formattedDate = $currentDate->format('Y-m-d');
        if (!in_array($formattedDate, $existingDates)) {
            $availableDates[] = $formattedDate;
        }

        $currentDate->add(new DateInterval('P1D'));
    }

    // Output dalam format JSON
    echo json_encode($availableDates);
} else {
    echo json_encode(array()); // Jika tidak ada data kkn
}

$conn->close();
?>