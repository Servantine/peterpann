<?php
include 'conn.php';

$sql = "SELECT kelompok_kkn.lokasi, kelompok_kkn.alamat FROM kelompok_kkn;";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(["message" => "No data found"]);
}

// Menutup koneksi
$conn->close();
?>
