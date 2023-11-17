<?php
include 'conn.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nimMahasiswa = $_POST['nim'];
    $logbookContent = $_POST['isiLogbook'];
    $tanggal = $_POST['tanggalLogbook'];

    $sql = "INSERT INTO logbook (nim, tanggal, isi_logbook) VALUES ('$nimMahasiswa', '$tanggal', '$logbookContent')";

    if ($conn->query($sql) === TRUE) {
        echo 'Logbook berhasil disimpan.';
    } else {
        echo 'Error: ' . $sql . '<br>' . $conn->error;
    }

    $conn->close();
} else {
    echo 'Invalid request method.';
}
?>