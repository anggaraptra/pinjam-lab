<?php
require '../functions/function.php';

$peminjaman = query("SELECT * FROM peminjaman ORDER BY waktu_pinjam");

session_start();

if (($_SESSION['level'] != 'admin')) {
    header('Location: ../index.php');
    exit;
}

if (isset($_POST['submitEditLab'])) {
    if (editLab($_POST) > 0) {
        echo "<script>
        alert('Nama lab berhasil di edit!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Nama lab gagal di edit!');
        document.location.href = 'index.php';
        </script>";
    }
}

if (isset($_POST['submitEditWaktu'])) {
    if (editWaktuPinjam($_POST) > 0) {
        echo "<script>
        alert('Waktu pinjam berhasil di edit!');
        document.location.href = 'index.php';
        </script>";
    } else {
        echo "<script>
        alert('Waktu pinjam gagal di edit!');
        document.location.href = 'index.php';
        </script>";
    }
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
    <title>Pinjam Lab &mdash; Admin dashboard</title>

    <!-- General CSS Files -->
    <link rel="stylesheet" href="assets/modules/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/modules/fontawesome/css/all.min.css">

    <!-- CSS Libraries -->
    <link rel="stylesheet" href="assets/modules/jqvmap/dist/jqvmap.min.css">
    <link rel="stylesheet" href="assets/modules/summernote/summernote-bs4.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css">

    <!-- Template CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/components.css">
    <!-- Start GA -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-94034622-3');
    </script>
    <!-- /END GA -->
</head>

<body>
    <div id="app">
        <div class="main-wrapper main-wrapper-1">
            <div class="navbar-bg"></div>
            <nav class="navbar navbar-expand-lg main-navbar">
                <form class="form-inline mr-auto">
                    <ul class="navbar-nav mr-3">
                        <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg"><i class="fas fa-bars"></i></a></li>
                        <li><a href="#" data-toggle="search" class="nav-link nav-link-lg d-sm-none"><i class="fas fa-search"></i></a></li>
                    </ul>
                </form>
                <ul class="navbar-nav navbar-right">
                    <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
                            <img alt="image" src="assets/img/avatar/avatar-1.png" class="rounded-circle mr-1">
                            <div class="d-sm-none d-lg-inline-block">Hi, <?= $_SESSION['login']; ?></div>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right">
                            <a href="../functions/logout.php" class="dropdown-item has-icon text-danger">
                                <i class="fas fa-sign-out-alt"></i>Logout
                            </a>
                        </div>
                    </li>
                </ul>
            </nav>
            <div class="main-sidebar sidebar-style-2">
                <aside id="sidebar-wrapper">
                    <div class="sidebar-brand">
                        <a href="../index.php"><span style="color: #025f99">PINJAM</span>LAB</a>
                    </div>
                    <div class="sidebar-brand sidebar-brand-sm">
                        <a href="index.php"><span style="color: #025f99">P</span>LAB</a>
                    </div>
                    <ul class="sidebar-menu">
                        <li class="menu-header">Dashboard</li>
                        <li class="active">
                            <a href="index.php" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
                        </li>
                    </ul>
                </aside>
            </div>

            <!-- Main Content -->
            <div class="main-content">
                <section class="section">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-header shadow-sm">
                                    <h4>Tabel Pinjaman</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-hover my-0">
                                            <thead>
                                                <tr>
                                                    <th>Nama Peminjam</th>
                                                    <th>Lab</th>
                                                    <th></th>
                                                    <th>Jumlah Peminjam / orang</th>
                                                    <th>Waktu Pinjam</th>
                                                    <th></th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($peminjaman as $pnjm) : ?>
                                                    <tr>
                                                        <td><?= $pnjm['nama_peminjam']; ?></td>
                                                        <td>
                                                            <form action="" method="post">
                                                                <input type="hidden" name="id" value="<?= $pnjm['id']; ?>">
                                                                <select class="form-control" name="lab" id="">
                                                                    <option class="form-control" value="<?= $pnjm['nama_lab'] ?>"><?= $pnjm['nama_lab']; ?></option>
                                                                    <option value="rpl">rpl</option>
                                                                    <option value="tkj">tkj</option>
                                                                    <option value="mm">mm</option>
                                                                    <option value="dkv">dkv</option>
                                                                    <option value="animasi">animasi</option>
                                                                </select>
                                                        </td>
                                                        <td><button type="submit" name="submitEditLab" class="btn btn-primary">Edit</button></td>
                                                        </form>
                                                        <td><?= $pnjm['jumlah_peminjam']; ?></td>
                                                        <td>
                                                            <form action="" method="post">
                                                                <input type="hidden" name="id" value="<?= $pnjm['id']; ?>">
                                                                <select class="form-control" name="waktuPinjam" id="">
                                                                    <option class="form-control" value="<?= $pnjm['waktu_pinjam'] ?>"><?= $pnjm['waktu_pinjam']; ?></option>
                                                                    <option value="08:00-09:00">08:00 - 09:00</option>
                                                                    <option value="09:00-10:00">09:00 - 10:00</option>
                                                                    <option value="10:00-11:00">10:00 - 11:00</option>
                                                                    <option value="13:00-14:00">13:00 - 14:00</option>
                                                                    <option value="14:00-15:00">14:00 - 15:00</option>
                                                                    <option value="15:00-16:00">15:00 - 16:00</option>
                                                                </select>
                                                        </td>
                                                        <td><button type="submit" name="submitEditWaktu" class="btn btn-primary">Edit</button></td>
                                                        </form>
                                                        <td><a href="../functions/delete.php?id=<?= $pnjm['id']; ?>" class="btn btn-danger" onclick="return confirm('Menghapus peminjaman jika selesai!, ingin melanjutkan?')">Done</a></td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/jquery.sparkline.min.js"></script>
    <script src="assets/modules/chart.min.js"></script>
    <script src="assets/modules/owlcarousel2/dist/owl.carousel.min.js"></script>
    <script src="assets/modules/summernote/summernote-bs4.js"></script>
    <script src="assets/modules/chocolat/dist/js/jquery.chocolat.min.js"></script>

    <!-- Page Specific JS File -->
    <script src="assets/js/page/index.js"></script>

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
</body>

</html>