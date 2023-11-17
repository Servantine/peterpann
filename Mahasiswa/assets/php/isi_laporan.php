<?php
include 'conn.php';

$nim = $_POST['nim'];
$isiLaporan = $_POST['isiLaporan'];
$judulLaporan = $_POST['idRencanaKegiatan'];

$file = false;
$uploadOk = 1;

if ($_FILES) {
    $targetDirectory = "../uploads/laporanKegiatan/$judulLaporan/";

    if (!file_exists($targetDirectory)) {
        mkdir($targetDirectory, 0777, true);
    }
    $fileName = $judulLaporan . '_' . $_FILES["fileUpload"]["tmp_name"];

    $fileInsert = $judulLaporan . '_' . basename($_FILES["fileUpload"]["name"]);

    $targetFile = $targetDirectory . $judulLaporan . '_' . basename($_FILES["fileUpload"]["name"]);

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

            $sql = "INSERT INTO laporan_kegiatan (id_kelompok, tanggal, id_rencana_kegiatan, laporan_kegiatan, fileupload) 
                    VALUES ('$idKelompok', NOW(), '$judulLaporan', '$isiLaporan', '$fileInsert')";

            if ($conn->query($sql) === TRUE) {
                echo json_encode(array('status' => 'success', 'message' => 'Data laporan berhasil disimpan'));
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

            $sql = "INSERT INTO laporan_kegiatan (id_kelompok, tanggal, id_rencana_kegiatan, laporan_kegiatan) 
                VALUES ('$idKelompok', NOW(), '$judulLaporan', '$isiLaporan')";

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