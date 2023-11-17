<?php
include 'conn.php';

$nim = '72210456';
$sql = "SELECT kkn.tanggal_mulai, kkn.tanggal_selesai
        FROM kkn
        JOIN kelompok_kkn ON kkn.id_kkn = kelompok_kkn.id_kkn
        JOIN dtl_kelompok_kkn ON kelompok_kkn.id_kelompok = dtl_kelompok_kkn.id_kelompok
        JOIN mahasiswa ON dtl_kelompok_kkn.nim = mahasiswa.nim
        WHERE mahasiswa.nim = '$nim'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $response = array(
        'tanggalMulai' => $row['tanggal_mulai'],
        'tanggalSelesai' => $row['tanggal_selesai']
    );
    echo json_encode($response);
} else {
    echo json_encode(array('error' => 'Data KKN tidak ditemukan untuk nim ' . $nim));
}

// Tutup koneksi
$conn->close();
?>