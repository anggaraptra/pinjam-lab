<?php
require '../functions/function.php';

$peminjam = query("SELECT * FROM peminjaman WHERE nama_lab = 'animasi'");

session_start();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">
    <!-- bootstrap -->
    <link rel="stylesheet" href="../assets/bootstrap-5.1.3-dist/css/bootstrap.min.css">
    <!-- mycss -->
    <link rel="stylesheet" href="../assets/css/style-labs.css">
    <title>Pinjam Lab &mdash; Animasi</title>
</head>

<body>
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand fw-bold" href="../index.php"><span>PINJAM</span>LAB</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Daftar Lab</a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="rpl.php">Lab RPL</a></li>
                            <li><a class="dropdown-item" href="tkj.php">Lab TKJ</a></li>
                            <li><a class="dropdown-item" href="mm.php">Lab MM</a></li>
                            <li><a class="dropdown-item" href="dkv.php">Lab DKV</a></li>
                            <li><a class="dropdown-item aktif" href="">Lab Animasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../pinjam.php">Pinjam</a>
                    </li>

                    <?php
                    if (isset($_SESSION["login"])) {
                        echo '<li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <img width="20" alt="" src="../assets/img/avatar-1.png" class="rounded-circle mr-1 mb-1">
                            Hi, ' . $_SESSION['login'] . '
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li><a href="../functions/logout.php" class="dropdown-item text-danger">
                                    <img src="../assets/icons/box-arrow-right.svg" alt=""> Logout
                                </a>
                            </li>
                        </ul>
                    </li>';
                    } else {
                        echo '<li class="nav-item">
                        <a class="nav-link" href="form/signup.php" data-bs-toggle="tooltip" title="Login atau Buat Akun"><img src="../assets/icons/person-fill.svg" alt=""></a>
                    </li>';
                    }
                    ?>

                </ul>
            </div>
        </div>
    </nav>

    <!-- jadwal lab yang digunakan -->
    <section id="jadwal">
        <div class="container-fluid">
            <div class="row p-2 mt-2 mb-3">
                <div class="col">
                    <h2 class="fw-normal">Jadwal Lab Animasi</h2>
                </div>
            </div>
            <div class="row p-3 mb-4">
                <div class="col">
                    <div class="table-responsive">
                        <table class="table table-bordered table-sm">
                            <tr>
                                <th class="text-center">Waktu</th>
                                <th class="text-center">Jadwal Peminjam Hari Ini</th>
                            </tr>
                            <tbody>
                                <tr>
                                    <th colspan="8">Pagi</th>
                                </tr>
                                <tr>
                                    <td>08:00 - 09:00</td>
                                    <td>
                                        <?php foreach ($peminjam as $pnjm) : ?>
                                            <?php if ($pnjm['waktu_pinjam'] == '08:00-09:00') : ?>
                                                <div class="schedule mb-1">
                                                    <p class="mt-2">
                                                        Dipinjam oleh <span class="fw-bold"><?= $pnjm['nama_peminjam']; ?></span>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>09:00 - 10:00</td>
                                    <td>
                                        <?php foreach ($peminjam as $pnjm) : ?>
                                            <?php if ($pnjm['waktu_pinjam'] == '09:00-10:00') : ?>
                                                <div class="schedule mb-1">
                                                    <p class="mt-2">
                                                        Dipinjam oleh <span class="fw-bold"><?= $pnjm['nama_peminjam']; ?></span>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>10:00 - 11:00</td>
                                    <td>
                                        <?php foreach ($peminjam as $pnjm) : ?>
                                            <?php if ($pnjm['waktu_pinjam'] == '10:00-11:00') : ?>
                                                <div class="schedule mb-1">
                                                    <p class="mt-2">
                                                        Dipinjam oleh <span class="fw-bold"><?= $pnjm['nama_peminjam']; ?></span>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <th colspan="8">Siang</th>
                                </tr>
                                <tr>
                                    <td>13:00 - 14:00</td>
                                    <td>
                                        <?php foreach ($peminjam as $pnjm) : ?>
                                            <?php if ($pnjm['waktu_pinjam'] == '13:00-14:00') : ?>
                                                <div class="schedule mb-1">
                                                    <p class="mt-2">
                                                        Dipinjam oleh <span class="fw-bold"><?= $pnjm['nama_peminjam']; ?></span>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>14:00 - 15:00</td>
                                    <td>
                                        <?php foreach ($peminjam as $pnjm) : ?>
                                            <?php if ($pnjm['waktu_pinjam'] == '14:00-15:00') : ?>
                                                <div class="schedule mb-1">
                                                    <p class="mt-2">
                                                        Dipinjam oleh <span class="fw-bold"><?= $pnjm['nama_peminjam']; ?></span>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                                <tr>
                                    <td>15:00 - 16:00</td>
                                    <td>
                                        <?php foreach ($peminjam as $pnjm) : ?>
                                            <?php if ($pnjm['waktu_pinjam'] == '15:00-16:00') : ?>
                                                <div class="schedule mb-1">
                                                    <p class="mt-2">
                                                        Dipinjam oleh <span class="fw-bold"><?= $pnjm['nama_peminjam']; ?></span>
                                                    </p>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- modal hubungi kami -->
    <div class="modal fade" id="modalKontak" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalLabel">Kontak Kami</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <?php if (isset($_SESSION['login'])) {
                                echo '<input name="nama" type="text" class="form-control" id="nama" required  value="' . $_SESSION['login'] . '" autocomplete="off" readonly/>';
                            } else {
                                echo '<input name="nama" type="text" class="form-control" id="nama" required autocomplete="off" />';
                            }
                            ?>
                        </div>
                        <div class="mb-3">
                            <label for="nomer" class="form-label">No Whatsapp</label>
                            <input name="noWa" type="number" class="form-control" id="nomer" autocomplete="off" />
                        </div>
                        <div class="mb-3">
                            <label for="pesan" class="form-label">Pesan</label>
                            <textarea name="pesan" class="form-control" id="pesan" rows="3" required></textarea>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn" id="submit">Kirim</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- footer -->
    <footer class="text-dark">
        <div class="container-fluid footer-1">
            <div class="row">
                <div class="col-md-3 mb-3 footer-logo">
                    <h3><span>PINJAM</span>LAB</h3>
                </div>
                <div class="col-md-3 mb-2 bantuan">
                    <h6>Bantuan</h6>
                    <ul class="list-unstyled">
                        <li><a href="">Cara Meminjam</a></li>
                        <li><a href="">Jika Terjadi Kendala</a></li>
                        <li><a href="">Panduan</a></li>
                    </ul>
                </div>
                <div class="col-md-3 mb-3 hubungi-kami">
                    <div class="mb-2">
                        <h6>Kontak Kami</h6>
                        <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#modalKontak">
                            Kontak
                        </button>
                    </div>
                    <h6>Temukan Sosial Media Kami</h6>
                    <div class="d-flex sosial-media">
                        <div class="p-2"><a href="" data-bs-toggle="tooltip" title="Instagram"><img src="../assets/icons/instagram.svg" alt=""></a></div>
                        <div class="p-2"><a href="" data-bs-toggle="tooltip" title="Facebook"><img src="../assets/icons/facebook.svg" alt=""></a></div>
                        <div class="p-2"><a href="" data-bs-toggle="tooltip" title="Twitter"><img src="../assets/icons/twitter.svg" alt=""></a></div>
                    </div>
                </div>
                <div class="col-md-3 mb-3 tentang-kami">
                    <h6>Tentang Kami</h6>
                    <p>Website ini adalah web peminjaman lab di sekolah, untuk siswa yang ingin meminjam di luar jam sekolah serta atas persetujuan staff dan guru.</p>
                </div>
            </div>
        </div>
        <div class="row container-fluid copyright">
            <div class="col-md-12">
                <div class="footer-copyright text-center">
                    <p>© Copyright PINJAMLAB - All rights reserved
                    </p>
                </div>
            </div>
        </div>
    </footer>

</body>
<!-- assets -->
<script src="../assets/bootstrap-5.1.3-dist/js/bootstrap.bundle.min.js"></script>

</html>