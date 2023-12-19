<?php
session_start();
if ($_SESSION['nama'] == null || $_SESSION['status'] != "lppm") {
     header("Location:./logout.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8" />
     <title>Dashboard</title>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta content="MoneyTrash!" name="description" />
     <meta content="MoneyTrash!" name="author" />
     <meta http-equiv="X-UA-Compatible" content="IE=edge" />
     <!-- App favicon -->
     <link rel="shortcut icon" href="https://lppm.ukdw.ac.id/wp-content/uploads/2023/02/logo-removebg-preview-300x300.png">
     <!-- App css -->

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
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
                         <a class="nav-link nav-user mr-0" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                              <img src="assets/images/users/user-default.webp" alt="user-image" class="rounded-circle">
                              <span class="pro-user-name ml-1" style="color: white;">
                                   <?php echo $namaPendek; ?> <i class="mdi mdi-chevron-down"></i>
                              </span>
                         </a>
                         <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                              <!-- item-->
                              <div class="dropdown-header noti-title">
                                   <h6 class="text-overflow m-0">Welcome <?php echo $namaPendek; ?>!</h6>
                              </div>

                              <!-- item-->
                              <a href="./logout.php"" class=" dropdown-item notify-item">
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
                         <a href="#"><?php echo $namaPendek; ?></a>
                         <p class="text-muted m-0">
                              LPPM
                         </p>
                    </div>
               </div>

               <!--- Sidemenu -->
               <div id="sidebar-menu">

                    <ul class="metismenu" id="side-menu">
                         <li class="menu-title">Navigasi</li>
                         <li>
                              <a href="../Lppm/dashboard.php">
                                   <i class="bi bi-house"></i>
                                   <span> Beranda</span>
                              </a>
                         </li>

                         <li>
                              <a href="../Lppm/kkn.php">
                                   <i class="bi bi-pin-map"></i>
                                   <span> KKN</span>
                              </a>
                         </li>

                         <li>
                              <a href="../Lppm/mahasiswa.php">
                                   <i class="bi bi-mortarboard"></i>
                                   <span> Mahasiswa</span>
                              </a>
                         </li>

                         <li>
                              <a href="../Lppm/dosen.php">
                                   <i class="bi bi-person"></i>
                                   <span> Dosen</span>
                              </a>
                         </li>

                         <li class="">
                              <a href="../Lppm/kelompok.php">
                                   <i class="bi bi-people"></i>
                                   <span class=""> Kelompok
                                   </span>
                              </a>
                         </li>

                         <li class="">
                              <a href="../Lppm/logbook.php" class="active-class active-txt">
                                   <i class="bi bi-book"></i>
                                   <span class=""> Logbook </span>
                              </a>
                         </li>
                         <li class="">
                              <a href="../Lppm/laporan.php">
                                   <i class="bi bi-list-check"></i>
                                   <span class=""> Laporan Kegiatan</span>
                              </a>
                         </li>
                         <li class="">
                              <a href="../Lppm/rencana.php">
                                   <i class="bi bi-pencil-square"></i>
                                   <span class=""> Rencana Kegiatan</span>
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
                         <li class="breadcrumb-item"><a href="../Lppm/dashboard.php">LPPM</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Logbook</li>
                    </ol>
               </nav>
               <!-- End Breadcrumb -->

               <div class="content pt-0 mt-0">

                    <!-- Start container-fluid -->
                    <div class="container-fluid">
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
                                             ?>, <?php echo $_SESSION["nama"]; ?>
                                        </h4>
                                   </div>
                              </div>
                    </div>
                    <?php if (isset($_GET['success'])) {
                        if ($_GET['success'] == true) { ?>
                            <div class="alert alert-success" role="alert">
                                <i class="bi bi-exclamation-circle"></i>
                                Berhasil menambahkan komentar!
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="bi bi-exclamation-circle"></i>
                                Gagal menambahkan komentar!
                            </div>
                    <?php }
                    } ?>

                    <div class="row">
                    </div>
                    <div class="col-`12">
                        <!-- Cards go here -->
                        <div class="card-container">

                            <!-- Card Mulai -->
                            <?php
                            if (isset($_GET["nim"])) {
                                include 'assets/php/conn.php';

                                $nama_hari_inggris = array(
                                    'Monday' => 'Senin',
                                    'Tuesday' => 'Selasa',
                                    'Wednesday' => 'Rabu',
                                    'Thursday' => 'Kamis',
                                    'Friday' => 'Jumat',
                                    'Saturday' => 'Sabtu',
                                    'Sunday' => 'Minggu'
                                );

                                $nim_pengguna = $_GET["nim"];

                                $sql = "SELECT * FROM logbook WHERE nim = '$nim_pengguna'";
                                $result = $conn->query($sql);

                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_assoc()) {
                                        $nama_hari = $nama_hari_inggris[date('l', strtotime($row['tanggal']))];
                                        echo '<div class="row">';
                                        echo '<div class="col-12">';
                                        echo '<div class="card" style="width: 100%;">';
                                        echo '<div class="card-body rounded shadow">';
                                        echo '<div class="row mb-2">';
                                        echo '<div class="col-1">';
                                        if($row['komentar_dosen']) {
                                             echo '<img src="assets/images/ok.webp" alt="Ok.png" width ="40">';
                                         } else {
                                             echo '<img src="assets/images/warning.png" alt="warning.png" width ="40">';
                                         }
                                        echo '</div>';
                                        echo '<div class="col-11">';
                                        echo '<h1 class="card-title m-0 p-0">' . $nama_hari . '<br>' . date('j F Y', strtotime($row['tanggal'])) . '</h1>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '<p class="card-text text-muted mb-0 pb-0">Apa yang kamu kerjakan hari ini?</p>';
                                        echo '<p class="card-text">' . $row['isi_logbook'] . '</p>';
                                        echo '<form action="./method/komentar_logbook.php" method="post">';
                                        echo '<input type="hidden" id="id_logbook" name="id_logbook" value="' . $row["id_logbook"] . '">';
                                        echo '<input type="hidden" id="nim" name="nim" value="' . $nim_pengguna . '">';
                                        echo '<div class="m-0 p-0">';
                                        echo '<label class="form-label" for="komentar">Komentar :</label> <br>
                                              <textarea class="form-control w-100" id="komentar" name="komentar" placeholder="Masukan Komentar" rows="3">' . $row['komentar_admin'] . '</textarea>';
                                        echo '<div>';
                                        echo '<button class="btn btn-success mt-1 float-end"> Simpan </button>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</form>';
                                        echo '<p class="card-text text-muted mb-0 pb-0">Komentar Dosen :</p>';
                                        echo '<p class="card-text">' . $row['komentar_dosen'] . '</p>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                        echo '</div>';
                                    }
                                } else {
                                    echo 'Tidak ada data logbook';
                                }
                            ?>



                                <!-- Card Selesai -->

                        </div>

                        <!-- Pagination -->
                        <nav aria-label="Page navigation">
                            <ul class="pagination justify-content-center mt-3">
                                <li class="page-item" id="prev-page">
                                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                </li>
                                <!-- Page indicators will be dynamically added here -->
                                <li class="page-item" id="next-page">
                                    <a class="page-link" href="#">Next</a>
                                </li>
                            </ul>
                        </nav>
                        <a href="./logbook.php" class="btn btn-info btn-lg"> Kembali </a>
                    </div>
                <?php
                                $conn->close();
                            } else {

                ?>
                    <div class="row">
                        <div class="col-12">
                            <h1>Daftar Anggota</h1>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Nim</th>
                                        <th>Name</th>
                                        <th>Prodi</th>
                                        <th>Fakultas</th>
                                        <th>Lokasi</th>
                                        <th>Tema</th>
                                        <th>Nama Kelompok</th>
                                        <th>Jabatan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'assets/php/conn.php';

                                    $sql = "SELECT mahasiswa.nim, mahasiswa.nama, mahasiswa.prodi, mahasiswa.fakultas, dtl_kelompok_kkn.jabatan, kelompok_kkn.nama_kelompok, kelompok_kkn.lokasi, kkn.tema FROM mahasiswa INNER JOIN dtl_kelompok_kkn ON mahasiswa.nim = dtl_kelompok_kkn.nim INNER JOIN kelompok_kkn ON dtl_kelompok_kkn.id_kelompok = kelompok_kkn.id_kelompok INNER JOIN kkn ON kelompok_kkn.id_kkn = kkn.id_kkn";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr style="transform: rotate(0);">';
                                            echo '<td><a href="logbook.php?nim=' . $row['nim'] . '" class="stretched-link">' . $row['nim'] . '</td>';
                                            echo '<td>' . $row['nama'] . '</td>';
                                            echo '<td>' . $row['prodi'] . '</td>';
                                            echo '<td>' . $row['fakultas'] . '</td>';
                                            echo '<td>' . $row['lokasi'] . '</td>';
                                            echo '<td>' . $row['tema'] . '</td>';
                                            echo '<td>' . $row['nama_kelompok'] . '</td>';
                                            echo '<td>' . $row['jabatan'] . '</td>';
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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.min.js"></script>

    <!-- Vendor js -->
    <script src="assets/js/vendor.min.js"></script>

    <script src="assets/libs/morris-js/morris.min.js"></script>
    <script src="assets/libs/raphael/raphael.min.js"></script>

    <script src="assets/js/pages/dashboard.init.js"></script>

    <!-- App js -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="assets/js/app.min.js"></script>
    <script src="assets/js/pagination.js"></script>

</body>

</html>