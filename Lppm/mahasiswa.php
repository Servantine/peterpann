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
    <title>Mahasiswa</title>
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
                        <a href="/pemilik/akun" class="dropdown-item notify-item">
                            <i class="mdi mdi-settings-outline"></i>
                            <span>Akun</span>
                        </a>

                        <div class="dropdown-divider"></div>

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
                    <a href="#">
                        <?php echo $namaPendek; ?>
                    </a>
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
                        <a href="../Lppm/mahasiswa.php" class="active-class active-txt">
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
                        <a href="../Lppm/logbook.php">
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
                    <li class="breadcrumb-item active" aria-current="page">Mahasiswa</li>
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
                                    ?>,
                                    <?php echo $_SESSION["nama"]; ?>
                                </h4>
                            </div>
                        </div>
                    </div>
                    <!-- end row -->
                    <?php if (isset($_GET['success'])) {
                        if ($_GET['success'] == true) { ?>
                            <div class="alert alert-success" role="alert">
                                <i class="bi bi-exclamation-circle"></i>
                                Berhasil menambahkan/update data mahasiswa!
                            </div>
                        <?php } else { ?>
                            <div class="alert alert-danger" role="alert">
                                <i class="bi bi-exclamation-circle"></i>
                                Gagal menambahkan/update data mahasiswa!
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
                            if (isset($_GET["add"])) {
                                include 'assets/php/conn.php';

                                $id_lppm = $_SESSION['id_lppm'];

                                $nama_hari_inggris = array(
                                    'Monday' => 'Senin',
                                    'Tuesday' => 'Selasa',
                                    'Wednesday' => 'Rabu',
                                    'Thursday' => 'Kamis',
                                    'Friday' => 'Jumat',
                                    'Saturday' => 'Sabtu',
                                    'Sunday' => 'Minggu'
                                );
                                ?>
                                <form action="./method/addmahasiswa.php" method="post">
                                    <input type="hidden" name="id_lppm" value="<?php echo $id_lppm ?>" />
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="number" class="form-control" id="nim" name="nim" placeholder=""
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder=""
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fakultas">Fakultas</label>
                                        <select class="form-control" id="fakultas" name="fakultas" onchange="fetchProdi()"
                                            required>
                                            <option value="Teologi">Teologi</option>
                                            <option value="Arsitektur">Arsitektur</option>
                                            <option value="Bioteknologi">Bioteknologi</option>
                                            <option value="Bisnis">Bisnis</option>
                                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                                            <option value="Kedokteran">Kedokteran</option>
                                            <option value="Kependidikan dan Humaniora">Kependidikan dan Humaniora</option>
                                        </select>
                                    </div>
                                    <script>
                                        var prodiFromDb = null;
                                    </script>
                                    <div class="form-group">
                                        <label for="prodi">Prodi</label>
                                        <select class="form-control" id="prodi" name="prodi" required>
                                            <option value="S-1 Teologi">S-1 Teologi</option>
                                            <option value="S-1 Arsitektur">S-1 Arsitektur</option>
                                            <option value="S-1 Desain Produk">S-1 Desain Produk</option>
                                            <option value="S-1 Manajemen">S-1 Manajemen</option>
                                            <option value="S-1 Akuntansi">S-1 Akuntansi</option>
                                            <option value="S-1 Biologi">S-1 Biologi</option>
                                            <option value="S-1 Informatika">S-1 Informatika</option>
                                            <option value="S-1 Sistem Informasi">S-1 Sistem Informasi</option>
                                            <option value="S-1 Kedokteran">S-1 Kedokteran</option>
                                            <option value="S-1 Pendidikan Bahasa Inggris">S-1 Pendidikan Bahasa Inggris
                                            </option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="angkatan">Angkatan</label>
                                        <input type="number" class="form-control" id="angkatan" name="angkatan"
                                            placeholder="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kkn">KKN</label>
                                        <select class="form-control" id="kkn" name="kkn" required>
                                            <?php
                                            include 'assets/php/conn.php';

                                            $sql = "SELECT id_kkn, nama_kkn FROM `kkn` ORDER BY nama_kkn;";

                                            $result = $conn->query($sql);

                                            if ($result->num_rows > 0) {
                                                while ($row = $result->fetch_assoc()) {
                                                    echo '<option value="' . $row['id_kkn'] . '">' . $row['nama_kkn'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">Tidak ada data KKN</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="kelompok">Kelompok</label>
                                        <select class="form-control" id="kelompok" name="kelompok" required>
                                            <!-- Ditambahkan Oleh JavaScript -->
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select class="form-control" id="jabatan" name="jabatan" required>
                                            <option value="Ketua Kelompok">Ketua Kelompok</option>
                                            <option value="Anggota Kelompok">Anggota Kelompok</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="password">Password</label>
                                        <input type="password" class="form-control" id="password" name="password"
                                            placeholder="" required>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>

                            </div>

                        </div>

                        <?php
                            } elseif (isset($_GET['update'])) {

                                ?>

                        <?php
                        include 'assets/php/conn.php';
                        $sql = "SELECT mahasiswa.nim, mahasiswa.nama, mahasiswa.prodi, mahasiswa.fakultas, mahasiswa.angkatan, mahasiswa.password, kelompok_kkn.nama_kelompok, dtl_kelompok_kkn.jabatan from mahasiswa inner join dtl_kelompok_kkn ON mahasiswa.nim = dtl_kelompok_kkn.nim inner join kelompok_kkn ON dtl_kelompok_kkn.id_kelompok = kelompok_kkn.id_kelompok WHERE mahasiswa.nim = '" . $_GET['update'] . "' ORDER BY mahasiswa.nim, kelompok_kkn.nama_kelompok;";

                        $result = $conn->query($sql);

                        $id_lppm = $_SESSION['id_lppm'];

                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                ?>

                                <form action="./method/updatemahasiswa.php" method="post">
                                    <input type="hidden" name="id_lppm" value="<?php echo $id_lppm ?>" />
                                    <div class="form-group">
                                        <label for="nim">NIM</label>
                                        <input type="text" class="form-control" id="nim" name="nim" placeholder=""
                                            value="<?php echo $row['nim'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama</label>
                                        <input type="text" class="form-control" id="nama" name="nama" placeholder=""
                                            value="<?php echo $row['nama'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="fakultas">Fakultas</label>
                                        <select class="form-control" id="fakultas" name="fakultas" onchange="fetchProdi()" required>
                                            <?php
                                            $fakultasOptions = array("Teologi", "Arsitektur", "Bioteknologi", "Bisnis", "Teknologi Informasi", "Kedokteran", "Kependidikan dan Humaniora");

                                            foreach ($fakultasOptions as $fakultas) {
                                                $selected = ($fakultas == $row['fakultas']) ? 'selected' : '';
                                                echo "<option value=\"$fakultas\" $selected>$fakultas</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <script>
                                        var prodiFromDb = "<?php echo $row['prodi']; ?>";
                                    </script>
                                    <div class="form-group">
                                        <label for="prodi">Prodi</label>
                                        <select class="form-control" id="prodi" name="prodi" required>
                                            <?php
                                            $prodiOptions = array(
                                                "S-1 Teologi", "S-1 Arsitektur", "S-1 Desain Produk", "S-1 Manajemen", "S-1 Akuntansi",
                                                "S-1 Biologi", "S-1 Informatika", "S-1 Sistem Informasi", "S-1 Kedokteran", "S-1 Pendidikan Bahasa Inggris"
                                            );

                                            foreach ($prodiOptions as $prodi) {
                                                $selected = ($prodi == $row['prodi']) ? 'selected' : '';
                                                echo "<option value=\"$prodi\" $selected>$prodi</option>";
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="angkatan">Angkatan</label>
                                        <input type="number" class="form-control" id="angkatan" name="angkatan" placeholder=""
                                            value="<?php echo $row['angkatan'] ?>" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="kkn">KKN</label>
                                        <select class="form-control" id="kkn" name="kkn" required>
                                            <?php
                                            include 'assets/php/conn.php';

                                            $sql = "SELECT id_kkn, nama_kkn FROM `kkn` ORDER BY nama_kkn;";

                                            $result2 = $conn->query($sql);

                                            if ($result2->num_rows > 0) {
                                                while ($row2 = $result2->fetch_assoc()) {
                                                    echo '<option value="' . $row2['id_kkn'] . '">' . $row2['nama_kkn'] . '</option>';
                                                }
                                            } else {
                                                echo '<option value="">Tidak ada data KKN</option>';
                                            }
                                            ?>
                                        </select>
                                    </div>

                                    <script>
                                        var kelompokFromDb = "<?php echo $row['id_kelompok']; ?>"; // Pastikan ini adalah ID kelompok yang benar
                                    </script>
                                    <div class="form-group">
                                        <label for="kelompok">Kelompok</label>
                                        <select class="form-control" id="kelompok" name="kelompok" required>
                                            <!-- Ditambahkan Oleh JavaScript -->
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="jabatan">Jabatan</label>
                                        <select class="form-control" id="jabatan" name="jabatan" required>
                                            <option value="Ketua Kelompok">Ketua Kelompok</option>
                                            <option value="Anggota Kelompok">Anggota Kelompok</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="password" required>Password</label>
                                        <input type="password" class="form-control" id="password" name="password" placeholder=""
                                            value="<?php echo $row['password'] ?>">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Kirim</button>
                                </form>

                                <?php
                            }
                        }
                        ?>
                    </div>

                    <?php
                    $conn->close();
                            } else {

                                ?>
                    <div class="row">
                        <div class="col-12">
                            <h1>Daftar Mahasiswa</h1>
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Prodi</th>
                                        <th>Fakultas</th>
                                        <th>Angkatan</th>
                                        <th>Kelompok</th>
                                        <th>Jabatan</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    include 'assets/php/conn.php';

                                    $sql = "SELECT mahasiswa.nim, mahasiswa.nama, mahasiswa.prodi, mahasiswa.fakultas, mahasiswa.angkatan, kelompok_kkn.nama_kelompok, dtl_kelompok_kkn.jabatan from mahasiswa inner join dtl_kelompok_kkn ON mahasiswa.nim = dtl_kelompok_kkn.nim inner join kelompok_kkn ON dtl_kelompok_kkn.id_kelompok = kelompok_kkn.id_kelompok ORDER BY mahasiswa.nim, kelompok_kkn.nama_kelompok;";

                                    $result = $conn->query($sql);

                                    if ($result->num_rows > 0) {
                                        while ($row = $result->fetch_assoc()) {
                                            echo '<tr style="transform: rotate(0);">';
                                            echo '<td>' . $row['nim'] . '</td>';
                                            echo '<td>' . $row['nama'] . '</td>';
                                            echo '<td>' . $row['prodi'] . '</td>';
                                            echo '<td>' . $row['fakultas'] . '</td>';
                                            echo '<td>' . $row['angkatan'] . '</td>';
                                            echo '<td>' . $row['nama_kelompok'] . '</td>';
                                            echo '<td>' . $row['jabatan'] . '</td>';
                                            echo '<td> <a href="./mahasiswa.php?update=' . $row['nim'] . '" class="btn btn-warning"> Update Mahasiswa </a> </td>';
                                            echo '</tr>';
                                        }
                                    } else {
                                        echo '<tr><td colspan="4">Tidak ada data mahasiswa</td></tr>';
                                    }

                                    $conn->close();
                                    ?>
                                </tbody>
                            </table>
                            <a href="./mahasiswa.php?add=true" class="btn btn-info btn-lg"> Tambah Mahasiswa </a>
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

    <!-- Script -->
    <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBRPlQuuQmmWWhwkDiUijv6F6deBOflQhk&callback=initMap&libraries=places">
        </script>

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
    <!-- Fakultas & Prodi -->
    <script>
        function fetchProdi() {
            var selectedFakultas = document.getElementById("fakultas").value;
            var prodiOptions = getProdiOptions(selectedFakultas);
            document.getElementById("prodi").innerHTML = prodiOptions;

            if (prodiFromDb) {
                $("#prodi").val(prodiFromDb);
            }
        }

        function getProdiOptions(selectedFakultas) {
            var prodiOptionsArray = {
                "Teologi": ["S-1 Teologi"],
                "Arsitektur": ["S-1 Arsitektur"],
                "Bioteknologi": ["S-1 Biologi"],
                "Bisnis": ["S-1 Manajemen", "S-1 Akuntansi"],
                "Teknologi Informasi": ["S-1 Informatika", "S-1 Sistem Informasi"],
                "Kedokteran": ["S-1 Kedokteran"],
                "Kependidikan dan Humaniora": ["S-1 Pendidikan Bahasa Inggris"]
            };

            return prodiOptionsArray[selectedFakultas].map(function (prodi) {
                return '<option value="' + prodi + '">' + prodi + '</option>';
            }).join('');
        }
    </script>

    <!-- KKN & Kelompok & Intansiasion -->
    <script>
        $(document).ready(function () {
            fetchProdi();
            fetchKelompok($("#kkn").val());

            function fetchKelompok(selectedKkn) {
                $.ajax({
                    type: "POST",
                    url: "method/getkelompok.php",
                    data: { kkn: selectedKkn },
                    success: function (response) {
                        $("#kelompok").html(response);
                        checkGroupLeader();
                    }
                });
            }

            $("#kkn").change(function () {
                var selectedKkn = $(this).val();
                fetchKelompok(selectedKkn);
            });

            function checkGroupLeader() {
                var selectedGroup = $("#kelompok").val();
                $.ajax({
                    type: "POST",
                    url: "method/checkGroupLeader.php",
                    data: { groupId: selectedGroup },
                    success: function (hasLeader) {
                        var jabatanDropdown = $("#jabatan");
                        if (hasLeader) {
                            jabatanDropdown.val("Anggota Kelompok"); 
                            jabatanDropdown.find("option[value='Ketua Kelompok']").prop('disabled', true);
                        } else {
                            jabatanDropdown.find("option[value='Ketua Kelompok']").prop('disabled', false);
                        }
                    }
                });
            }

            $("#kelompok").change(function () {
                checkGroupLeader();
            });
        });
    </script>

</body>

</html>