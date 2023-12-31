<?php
session_start();
if ($_SESSION['nama'] == null || $_SESSION['status'] != "dosbing") {
    header("Location:../logout.php");
}

function getGrade($nilai)
{
    if ($nilai == null) {
        return '-';
    } else {
        if ($nilai >= 85) {
            return 'A';
        } elseif ($nilai >= 80) {
            return 'A-';
        } elseif ($nilai >= 75) {
            return 'B+';
        } elseif ($nilai >= 70) {
            return 'B';
        } elseif ($nilai >= 65) {
            return 'B-';
        } elseif ($nilai >= 60) {
            return 'C+';
        } elseif ($nilai >= 55) {
            return 'C';
        } elseif ($nilai >= 45) {
            return 'D';
        } else {
            return 'E';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Nilai Mahasiswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="MoneyTrash!" name="description" />
    <meta content="MoneyTrash!" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon"
        href="https://lppm.ukdw.ac.id/wp-content/uploads/2023/02/logo-removebg-preview-300x300.png">
    <!-- App css -->

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" id="bootstrap-stylesheet" />
    <link href="assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/app.min.css" rel="stylesheet" type="text/css" id="app-stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link rel="stylesheet" href="assets/styles/navbar-css.css">

    <!-- CSS per Page-->

</head>

<body>

    <?php
    $namaPendek = explode(' ', trim($_SESSION['nama']))[0];
    ?>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        <div class="navbar-custom">
            <ul class="list-unstyled topnav-menu float-right mb-0">
                <li class="dropdown notification-list">
                    <a class="nav-link nav-user mr-0" data-toggle="dropdown" href="#" role="button"
                        aria-haspopup="false" aria-expanded="false">
                        <img src="assets/images/users/user-default.webp" alt="user-image" class="rounded-circle">
                        <span class="pro-user-name ml-1" style="color: white;">
                            <?php echo $namaPendek; ?> <i class="mdi mdi-chevron-down"></i>
                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                        <!-- item-->
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome
                                <?php echo $namaPendek; ?>!
                            </h6>
                        </div>

                        <!-- item-->
                        <a href="../logout.php"" class=" dropdown-item notify-item">
                            <i class="mdi mdi-logout-variant"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>

            <!-- LOGO -->
            <div class="logo-box">
                <a href="./dashboard.php" class="logo text-center logo-dark">
                    <span class="logo-lg">
                        <img src="assets/images/lppm-2.png" alt="Logo_LPPM.png" height="43">
                        <!-- <span class="logo-lg-text-dark">Simple</span> -->
                    </span>
                    <span class="logo-sm">
                        <!-- <span class="logo-lg-text-dark">S</span> -->
                        <img src="assets/images/lppm-1.png" alt="" height="43">
                    </span>
                </a>
            </div>

            <ul class="list-unstyled topnav-menu topnav-menu-left m-0">
                <li>
                    <button class="button-menu-mobile">
                        <i class="bi bi-list" style="color: white; "></i>
                    </button>
                </li>
            </ul>
        </div>
        <!-- end Topbar -->
        <!-- ========== Left Sidebar Start ========== -->
        <div class="left-side-menu">
            <div class="user-box">
                <div class="float-left">
                    <img src="assets/images/users/user-default.webp" alt="" class="avatar-md rounded-circle">
                </div>
                <div class="user-info">
                    <a href="#">
                        <?php echo $namaPendek; ?>
                    </a>
                    <p class="text-muted m-0">
                        Dosen
                    </p>
                </div>
            </div>

            <!--- Sidemenu -->
            <div id="sidebar-menu">

                <ul class="metismenu" id="side-menu">
                    <li class="menu-title">Navigasi</li>
                    <li>
                        <a href="../Dosen/dashboard.php">
                            <i class="bi bi-house"></i>
                            <span> Beranda</span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../Dosen/kelompok.php">
                            <i class="bi bi-people"></i>
                            <span class=""> Kelompok
                            </span>
                        </a>
                    </li>

                    <li class="">
                        <a href="../Dosen/logbook.php">
                            <i class="bi bi-book"></i>
                            <span class=""> Logbook </span>
                        </a>
                    </li>
                    <li class="">
                        <a href="../Dosen/rencana.php">
                            <i class="bi bi-pencil-square"></i>
                            <span class=""> Rencana Kegiatan</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="../Dosen/laporan.php">
                            <i class="bi bi-list-check"></i>
                            <span class=""> Laporan Kegiatan</span>
                        </a>
                    </li>
                    <li class="">
                        <a href="../Dosen/nilai.php" class="active-class active-txt">
                            <i class="bi bi-journal-text"></i>
                            <span class=""> Nilai</span>
                        </a>
                    </li>
                </ul>

            </div>
            <!-- End Sidebar -->

            <div class="clearfix"></div>

        </div>
        <!-- Left Sidebar End -->

        <div class="content-page">
            <!-- Start Breadcrumb -->
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb" style="background-color: transparent !important">
                    <li class="breadcrumb-item"><a href="/">Dosen</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Nilai</li>
                </ol>
            </nav>
            <!-- End Breadcrumb -->

            <div class="content pt-0 mt-0">

                <!-- Start container-fluid -->
                <div class="container-fluid">
                    <?php if (isset($_GET['success'])) {
                        if ($_GET['success'] == true) { ?>
                            <div class="alert alert-success" role="alert">
                                <i class="bi bi-exclamation-circle"></i>
                                Berhasil mengubah nilai!
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="bi bi-exclamation-circle"></i>
                                Gagal mengubah nilai!
                            </div>
                        <?php }
                    } ?>
                    <?php
                    if (isset($_GET["details"])) {
                        include 'assets/php/conn.php';
                        ?>
                        <div class="row">
                            <div class="col-12">
                                <div>
                                    <h4 class="header-title mb-3">Selamat
                                        <?php
                                        date_default_timezone_set('Asia/Jakarta');

                                        $jam = date('H');

                                        if ($jam >= 5 && $jam < 12) {
                                            $waktu = 'Pagi';
                                        } elseif ($jam >= 12 && $jam < 18) {
                                            $waktu = 'Siang';
                                        } else {
                                            $waktu = 'Malam';
                                        }

                                        echo $waktu;
                                        ?>,
                                        <?php echo $_SESSION["nama"]; ?>
                                    </h4>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <?php
                                    include 'assets/php/conn.php';

                                    $nidn_target = $_SESSION['nidn'];

                                    $sql = "SELECT kelompok_kkn.nama_kelompok FROM mahasiswa INNER JOIN dtl_kelompok_kkn ON mahasiswa.nim = dtl_kelompok_kkn.nim INNER JOIN kelompok_kkn ON dtl_kelompok_kkn.id_dtl_kelompok_kkn = kelompok_kkn.id_kelompok WHERE kelompok_kkn.nidn = '$nidn_target' LIMIT 1";

                                    $result = $conn->query($sql);
                                    $result = $result->fetch_assoc();

                                    if ($result != null) {
                                        echo '<h1>Daftar Anggota Kelompok ' . $result['nama_kelompok'] . '</h1>';
                                    } else {
                                        echo '<h1> Data Belum Di Inputkan </h1>';
                                    }

                                    $conn->close();
                                    ?>

                                    <div class="card-box">
                                        <h5 class="mt-0 font-14">Penilaian KKN</h5>
                                        <table class="table">
                                            <thead>
                                                <tr align="center">
                                                    <td>A</td>
                                                    <td>A-</td>
                                                    <td>B+</td>
                                                    <td>B</td>
                                                    <td>B-</td>
                                                    <td>C+</td>
                                                    <td>C</td>
                                                    <td>D</td>
                                                    <td>E</td>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr align="center">
                                                    <td>≥ 85</td>
                                                    <td>≥ 80</td>
                                                    <td>≥ 75</td>
                                                    <td>≥ 70</td>
                                                    <td>≥ 65</td>
                                                    <td>≥ 60</td>
                                                    <td>≥ 55</td>
                                                    <td>≥ 45</td>
                                                    <td>0</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <form action="./method/nilai.php" method="post">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>Nim</th>
                                                    <th>Name</th>
                                                    <th>Prodi</th>
                                                    <th>Fakultas</th>
                                                    <th>Jabatan</th>
                                                    <th>Nilai</th>
                                                    <th>Huruf</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                include 'assets/php/conn.php';

                                                $nidn_target = $_SESSION['nidn'];

                                                $sql = "SELECT mhs.nim, mhs.nama, mhs.prodi, mhs.fakultas, mhs.nilai, dtl.jabatan FROM mahasiswa mhs INNER JOIN dtl_kelompok_kkn dtl ON mhs.nim = dtl.nim WHERE dtl.id_kelompok ='" . $_GET['details'] . "'";

                                                $result = $conn->query($sql);

                                                if ($result->num_rows > 0) {
                                                    while ($row = $result->fetch_assoc()) {
                                                        echo '<tr>';
                                                        echo '<td class="align-middle">' . $row['nim'] . '</td>';
                                                        echo '<td class="align-middle">' . $row['nama'] . '</td>';
                                                        echo '<td class="align-middle">' . $row['prodi'] . '</td>';
                                                        echo '<td class="align-middle">' . $row['fakultas'] . '</td>';
                                                        echo '<td class="align-middle">' . $row['jabatan'] . '</td>';
                                                        echo '<td><input type="text" style="width: 70px;" name="' . $row['nim'] . '" class="form-control" placeholder="Nilai" value=' . $row['nilai'] . '></td>';

                                                        echo '<td class="align-middle">';

                                                        echo getGrade($row['nilai']);
                                                        echo '</td>';
                                                        echo '</tr>';
                                                    }
                                                } else {
                                                    echo '<tr><td colspan="4">Tidak ada data mahasiswa</td></tr>';
                                                }

                                                $conn->close();
                                                ?>
                                            </tbody>
                                        </table>
                                        <button class="btn btn-success mt-1 float-end"> Simpan </button>
                                        <a href="./nilai.php?" class="btn btn-info btn-lg"> Kembali </a>
                                    </form>
                                </div>
                            </div>
                            <?php
                    } else {
                        ?>
                            <div class="row">
                                <div class="col-12">
                                    <h1>Daftar Kelompok</h1>
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Nama Kelompok</th>
                                                <th>Kode KKN</th>
                                                <th>Nama KKN</th>
                                                <th>Tema</th>
                                                <th>Lokasi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            include 'assets/php/conn.php';


                                            $sql = "SELECT kelompok_kkn.id_kelompok, kelompok_kkn.nama_kelompok, kelompok_kkn.lokasi, kkn.kode, kkn.nama_kkn, kkn.tema, kelompok_kkn.nidn FROM kelompok_kkn INNER JOIN kkn ON kelompok_kkn.id_kkn = kkn.id_kkn WHERE kelompok_kkn.nidn = '" . $_SESSION['nidn'] . "';";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<tr style="transform: rotate(0);">';
                                                    echo '<td> <a href="nilai.php?details=' . $row['id_kelompok'] . '" class="stretched-link">' . $row['nama_kelompok'] . '</td>';
                                                    echo '<td>' . $row['kode'] . '</td>';
                                                    echo '<td>' . $row['nama_kkn'] . '</td>';
                                                    echo '<td>' . $row['tema'] . '</td>';
                                                    echo '<td>' . $row['lokasi'] . '</td>';
                                                    echo '</tr>';
                                                }
                                            } else {
                                                echo '<tr><td colspan="4">Tidak ada data mahasiswa</td></tr>';
                                            }
                                            $conn->close();
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <?php
                    }
                    ?>
                    </div>
                    <!-- end row -->

                    <!-- End of col -->
                </div>
                <!-- end row -->

            </div>
            <!-- end container-fluid -->



            <!-- Footer Start -->
            <!-- {{-- <footer class="footer"> --}}
                {{-- <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            2017 - 2020 &copy; Simple theme by <a href="">Coderthemes</a>
                        </div>
                    </div>
                </div> --}}
                {{-- </footer> --}} -->
            <!-- end Footer -->

        </div>
        <!-- end content -->

    </div>
    <!-- END content-page -->
    </div>
    <!-- END wrapper -->

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
        </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
        integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
        </script>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <script src="assets/libs/morris-js/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/app.min.js"></script>

</body>

</html>