<?php
include("../../conn.php");

foreach($_POST as $nim => $nilai) {
    $sql = "UPDATE mahasiswa SET nilai = ? WHERE nim = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $nilai, $nim);
    $stmt->execute();
    $stmt->close();
}

if ($conn->errno) {
    header('Location: ../nilai.php?success=false');
} else {
    header('Location: ../nilai.php?success=true');
}

$conn->close();
?>
