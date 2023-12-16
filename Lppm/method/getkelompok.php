<?php
include '../../conn.php';

if (isset($_POST['kkn'])) {
    $selectedKkn = $_POST['kkn'];

    $sql = "SELECT id_kelompok, nama_kelompok FROM `kelompok_kkn` WHERE id_kkn = '$selectedKkn' ORDER BY nama_kelompok;";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<option value="' . $row['id_kelompok'] . '">' . $row['nama_kelompok'] . '</option>';
        }
    } else {
        echo '<option value="" disabled selected>Tidak ada data Kelompok</option>';
    }
}
?>
