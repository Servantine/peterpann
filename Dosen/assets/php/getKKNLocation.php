<?php
include 'conn.php';

$nidn = isset($_POST['nidn']) ? $_POST['nidn'] : '';

$sql = "SELECT kelompok_kkn.lokasi, kelompok_kkn.alamat 
        FROM kelompok_kkn
        JOIN dsn_pembimbing ON kelompok_kkn.nidn = dsn_pembimbing.nidn
        WHERE dsn_pembimbing.nidn = ?";

$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $nidn); 
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $data = array();
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(["message" => "No data found"]);
}

$conn->close();
?>
