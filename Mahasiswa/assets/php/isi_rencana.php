<?php
include 'conn.php';

$nim = $_POST['nim'];
$isiKegiatan = $_POST['isiKegiatan'];
$judulKegiatan = $_POST['judulKegiatan'];

$file = false;
$uploadOk = 1;

if ($_FILES) {
    $targetDirectory = "../uploads/rencanaKegiatan/$judulKegiatan/";

    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }
    $fileName = $judulKegiatan . '_' . $_FILES["fileUpload"]["tmp_name"];

    $fileInsert = $judulKegiatan . '_' . basename($_FILES["fileUpload"]["name"]);

    $targetFile = $targetDirectory . $judulKegiatan . '_' . basename($_FILES["fileUpload"]["name"]);

    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    $file = true;
    if ($_FILES["fileUpload"]["size"] > 5000000) {
        echo json_encode(array('status' => 'error', 'message' => 'Ukuran file terlalu besar.'));
        $uploadOk = 0;
    }

    $allowedFormats = array("pdf", "doc", "docx");
    if (!in_array($imageFileType, $allowedFormats)) {
        echo json_encode(array('status' => 'error', 'message' => 'Format file tidak diizinkan.'));
        $uploadOk = 0;
    }
}

if ($uploadOk == 0) {
    echo json_encode(array('status' => 'error', 'message' => 'File tidak diupload.'));
} else {
    if ($file === true) {
        move_uploaded_file($_FILES["fileUpload"]["tmp_name"], $targetFile);

        $sqlGetKelompok = "SELECT dtl_kelompok_kkn.id_kelompok
                                FROM dtl_kelompok_kkn
                                JOIN mahasiswa ON dtl_kelompok_kkn.nim = mahasiswa.nim
                                WHERE mahasiswa.nim = '$nim'";

        $resultKelompok = $conn->query($sqlGetKelompok);

        if ($resultKelompok->num_rows > 0) {
            $rowKelompok = $resultKelompok->fetch_assoc();
            $idKelompok = $rowKelompok['id_kelompok'];

            $sql = "INSERT INTO `rencana_kegiatan` (`id_kelompok`, `tanggal`, `judul_kegiatan`, `rencana_kegiatan`, `fileupload`) 
                        VALUES ('$idKelompok', NOW(), '$judulKegiatan', '$isiKegiatan', '$fileInsert')";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(array('status' => 'success', 'message' => 'Data rencana berhasil disimpan'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan: ' . $conn->error));
            }
        } else {
            echo json_encode(array('status' => 'error', 'message' => 'Tidak dapat menemukan kelompok untuk mahasiswa dengan nim ' . $nim));
        }
    } else {
        $sqlGetKelompok = "SELECT dtl_kelompok_kkn.id_kelompok
                            FROM dtl_kelompok_kkn
                            JOIN mahasiswa ON dtl_kelompok_kkn.nim = mahasiswa.nim
                            WHERE mahasiswa.nim = '$nim'";

        $resultKelompok = $conn->query($sqlGetKelompok);

        if ($resultKelompok->num_rows > 0) {
            $rowKelompok = $resultKelompok->fetch_assoc();
            $idKelompok = $rowKelompok['id_kelompok'];

            $sql = "INSERT INTO `rencana_kegiatan` (`id_kelompok`, `tanggal`, `judul_kegiatan`, `rencana_kegiatan`) 
                        VALUES ('$idKelompok', NOW(), '$judulKegiatan', '$isiKegiatan')";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(array('status' => 'success', 'message' => 'Data laporan berhasil disimpan'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Terjadi kesalahan: ' . $conn->error));
            }
        }
    }
}

$conn->close();
?>