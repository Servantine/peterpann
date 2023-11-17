<?php
include 'conn.php';

$nim = $_POST['nim'];

// Assuming there is a common field 'nim' between 'mahasiswa' and 'rencana_kegiatan' tables
$sql = "SELECT r.id_rencana_kegiatan, r.judul_kegiatan 
            FROM rencana_kegiatan r
            JOIN kelompok_kkn k ON r.id_kelompok = k.id_kelompok
            JOIN dtl_kelompok_kkn d ON k.id_kelompok = d.id_kelompok
            JOIN mahasiswa m ON d.nim = m.nim
            WHERE m.nim = '$nim'";

$result = $conn->query($sql);

$activities = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $activities[] = array('id' => $row['id_rencana_kegiatan'], 'judul' => $row['judul_kegiatan']);
    }
}

echo json_encode($activities);

$conn->close();
?>
