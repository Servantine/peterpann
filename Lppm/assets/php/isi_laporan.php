<?php
include 'conn.php';

$nim = $_POST['nim'];
$isiLaporan = $_POST['isiLaporan'];
$judulLaporan = $_POST['judulLaporan'];

$sqlGetKelompok = "SELECT dtl_kelompok_kkn.id_kelompok
                    FROM dtl_kelompok_kkn
                    JOIN mahasiswa ON dtl_kelompok_kkn.nim = mahasiswa.nim
                    WHERE mahasiswa.nim = '$nim'";

$resultKelompok = $conn->query($sqlGetKelompok);

if ($resultKelompok->num_rows > 0) {
    $rowKelompok = $resultKelompok->fetch_assoc();
    $idKelompok = $rowKelompok['id_kelompok'];

    // Query untuk memasukkan data ke dalam tabel laporan_kegiatan
    $sql = "INSERT INTO laporan_kegiatan (id_kelompok, tanggal, judul_laporan, laporan_kegiatan) VALUES ('$idKelompok', NOW(), '$judulLaporan', '$isiLaporan')";

    if ($conn->query($sql) === TRUE) {
        echo json_encode(array('status' => 'success', 'message' => 'Data laporan berhasil disimpan'));
    } else {
        echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan: ' . $conn->error));
    }
} else {
    echo json_encode(array('status' => 'error', 'message' => 'Tidak dapat menemukan kelompok untuk mahasiswa dengan nim ' . $nim));
}

$conn->close();
?>