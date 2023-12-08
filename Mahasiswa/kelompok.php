<?php
session_start();
if($_SESSION['nama'] == null) {
     header("Location:../mahasiswa/logout.php");
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
     <meta charset="utf-8" />
     <title>SIKKN - Kelompok</title>
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
                                   <h6 class="text-overflow m-0">Welcome  <?php echo $namaPendek; ?>!</h6>
                              </div>

                              <!-- item-->
                              <a href="../Mahasiswa/akun" class="dropdown-item notify-item">
                                   <i class="mdi mdi-settings-outline"></i>
                                   <span>Akun</span>
                              </a>

                              <div class="dropdown-divider"></div>

                              <!-- item-->
                              <a href="../Mahasiswa/logout.php" class="dropdown-item notify-item">
                                   <i class="mdi mdi-logout-variant"></i>
                                   <span>Logout</span>
                              </a>
                         </div>
                    </li>
               </ul>

               <!-- LOGO -->
               <div class="logo-box">
                    <a href="/" class="logo text-center logo-dark">
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
                         <a href="#"> <?php echo $namaPendek; ?></a>
                         <p class="text-muted m-0">
                              Mahasiswa
                         </p>
                    </div>
               </div>

               <!--- Sidemenu -->
               <div id="sidebar-menu">
                    <ul class="metismenu" id="side-menu">
                         <li class="menu-title">Navigasi</li>
                         <li>
                              <a href="../Mahasiswa/dashboard.php" class="mb-0">
                                   <i class="bi bi-house"></i>
                                   <span> Beranda</span>
                              </a>
                         </li>

                         <li class="">
                              <a href="../Mahasiswa/kelompok.php" class="active-class active-txt">
                                   <i class="bi bi-people"></i>
                                   <span class=""> Kelompok
                                   </span>
                              </a>
                         </li>

                         <li class="">
                              <a href="../Mahasiswa/logbook.php">
                                   <i class="bi bi-book"></i>
                                   <span class=""> Logbook </span>
                              </a>
                         </li>
                         <li class="">
                              <a href="../Mahasiswa/rencana.php">
                                   <i class="bi bi-pencil-square"></i>
                                   <span class=""> Rencana Kegiatan</span>
                              </a>
                         </li>
                         <li class="">
                              <a href="../Mahasiswa/laporan.php">
                                   <i class="bi bi-journal-text"></i>
                                   <span class=""> Laporan Kegiatan</span>
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
                         <li class="breadcrumb-item"><a href="../Mahasiswa/dashboard.php">Mahasiswa</a></li>
                         <li class="breadcrumb-item active" aria-current="page">Kelompok</li>
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
                              <div class="row">
                                   <div class="col-12">
                                        <h1>Daftar Anggota</h1>
                                        <table class="table">
                                             <thead>
                                                  <tr>
                                                       <th>NIM</th>
                                                       <th>Nama Mahasiswa</th>
                                                       <th>Prodi</th>
                                                       <th>Fakultas</th>
                                                       <th>Jabatan</th>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                  include 'assets/php/conn.php';

                                                  $nim_target = $_SESSION['nim'];

                                                  $sql = "SELECT mahasiswa.nim, mahasiswa.nama, mahasiswa.prodi, mahasiswa.fakultas, dtl_kelompok_kkn.jabatan FROM mahasiswa JOIN dtl_kelompok_kkn ON mahasiswa.nim = dtl_kelompok_kkn.nim WHERE dtl_kelompok_kkn.id_kelompok IN ( SELECT dtl_kelompok_kkn.id_kelompok FROM dtl_kelompok_kkn WHERE dtl_kelompok_kkn.nim = '$nim_target')";

                                                  $result = $conn->query($sql);

                                                  if ($result->num_rows > 0) {
                                                       while ($row = $result->fetch_assoc()) {
                                                            echo '<tr>';
                                                            echo '<td>' . $row['nim'] . '</td>';
                                                            echo '<td>' . $row['nama'] . '</td>';
                                                            echo '<td>' . $row['prodi'] . '</td>';
                                                            echo '<td>' . $row['fakultas'] . '</td>';
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
                              <!-- List Pembimbing -->
                              <div class="row">
                                   <div class="col-12">
                                        <h1>Daftar Pembimbing</h1>
                                        <table class="table">
                                             <thead>
                                                  <tr>
                                                       <th>NIDN</th>
                                                       <th>Nama Dosen</th>
                                                       <th>Jabatan</th>
                                                       <th>Prodi</th>
                                                       <th>Fakultas</th>
                                                       <th>Nomor Telepon</th>
                                                       <?php
                                                       if($_SESSION['status'] == 'Ketua Kelompok') {
                                                       ?>
                                                       <th class="text-center">Aksi</th>
                                                       <?php
                                                       }
                                                       ?>
                                                  </tr>
                                             </thead>
                                             <tbody>
                                                  <?php
                                                  include 'assets/php/conn.php';

                                                  $nim_target = '72210456';

                                                  $sql = "SELECT dosen.nidn, dosen.nama_dosen, dosen.jabatan, dosen.prodi, dosen.fakultas, dosen.no_telp FROM dsn_pembimbing AS dosen JOIN kelompok_kkn ON dosen.nidn = kelompok_kkn.nidn JOIN dtl_kelompok_kkn ON kelompok_kkn.id_kelompok = dtl_kelompok_kkn.id_kelompok JOIN mahasiswa ON dtl_kelompok_kkn.nim = mahasiswa.nim WHERE mahasiswa.nim = '$nim_target';";
                                                  $result = $conn->query($sql);

                                                  if ($result->num_rows > 0) {
                                                       while ($row = $result->fetch_assoc()) {
                                                            echo '<tr>';
                                                            echo '<td style="vertical-align: middle;">' . $row['nidn'] . '</td>';
                                                            echo '<td style="vertical-align: middle;">' . $row['nama_dosen'] . '</td>';
                                                            echo '<td style="vertical-align: middle;">' . $row['jabatan'] . '</td>';
                                                            echo '<td style="vertical-align: middle;">' . $row['prodi'] . '</td>';
                                                            echo '<td style="vertical-align: middle;">' . $row['fakultas'] . '</td>';
                                                            echo '<td style="vertical-align: middle;">' . $row['no_telp'] . '</td>';
                                                            if($_SESSION['status'] == 'Ketua Kelompok') {
                                                            echo '<td class="text-center" style="vertical-align: middle;"> <a href="https://wa.me/' . $row['no_telp'] . '"><button type="button" class="btn btn-primary">Hubungi Dosen</button> </td>';
                                                            }
                                                            echo '</tr>';
                                                       }
                                                  } else {
                                                       echo '<tr><td colspan="4">Tidak ada data pembimbing</td></tr>';
                                                  }

                                                  // Tutup koneksi
                                                  $conn->close();
                                                  ?>
                                             </tbody>
                                        </table>
                                   </div>
                              </div>
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

     <!-- Script -->

     <!-- Script -->
     <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
     </script>

     <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js" integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
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