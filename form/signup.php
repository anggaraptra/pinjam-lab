<!DOCTYPE html>
<html lang="en">

<head>
    <title>Pinjam Lab &mdash; Signup</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <link rel="icon" type="image/x-icon" href="../assets/img/logo.png">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" />

    <link rel="stylesheet" href="../assets/css/style-form.css" />
</head>

<body>
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 col-lg-10">
                    <div class="wrap d-md-flex">
                        <div class="text-wrap p-4 p-lg-5 text-center d-flex align-items-center order-md-last">
                            <div class="text w-100">
                                <h2>Daftar Akun</h2>
                                <p>Sudah Punya Akun?</p>
                                <a href="login.php" class="btn btn-white btn-outline-white">Login</a>
                            </div>
                        </div>
                        <div class="login-wrap p-4 p-lg-5">

                            <?php
                            if (isset($_GET["error"])) {
                                if ($_GET["error"] == "emptyinput") {
                                    echo "<p style='color:#025f99' class='text-center text-capitalize'>Tolong isi semua kolom!</p>";
                                } else if ($_GET["error"] == "invalidusername") {
                                    echo "<p style='color:#025f99' class='text-center text-capitalize'>Pilih username yang tepat!</p>";
                                } else if ($_GET["error"] == "invalidemail") {
                                    echo "<p style='color:#025f99' class='text-center text-capitalize'>Pilih email yang tepat!</p>";
                                } else if ($_GET["error"] == "passwordsdontmatch") {
                                    echo "<p style='color:#025f99' class='text-center text-capitalize'>Password tidak cocok!</p>";
                                } else if ($_GET["error"] == "stmtfailed") {
                                    echo "<p style='color:#025f99' class='text-center text-capitalize'>Ada yang salah, coba lagi!</p>";
                                } else if ($_GET["error"] == "usernametaken") {
                                    echo "<p style='color:#025f99' class='text-center text-capitalize'>Username sudah diambil!</p>";
                                } else if ($_GET["error"] == "nametaken") {
                                    echo "<p style='color:#025f99' class='text-center text-capitalize'>Nama sudah diambil!</p>";
                                } else if ($_GET["error"] == "none") {
                                    echo "<p style='color:#025f99' class='text-center text-capitalize'>Anda telah daftar, silahkan login!</p>";
                                }
                            }
                            ?>

                            <form action="../functions/signup.php" method="post" class="signin-form">
                                <div class="form-group mb-3">
                                    <label class="label" for="nama">Nama Anda</label>
                                    <input name="nama" type="text" class="form-control" id="nama" placeholder="Nama Anda" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="email">Email</label>
                                    <input name="email" type="email" id="email" class="form-control" placeholder="Email" />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="noHp">No Handphone</label>
                                    <input name="noHp" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" type="number" maxlength="13" class="form-control" id="noHp" placeholder="No Handphone" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="username">Username</label>
                                    <input name="username" type="text" class="form-control" id="username" placeholder="Username" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="password">Password</label>
                                    <input name="password" type="password" id="password" class="form-control" placeholder="Password" required />
                                </div>
                                <div class="form-group mb-3">
                                    <label class="label" for="ulangiPassword">Ulangi Password</label>
                                    <input name="ulangiPassword" type="password" class="form-control" id="ulangiPassword" placeholder="Ulangi Password" required />
                                </div>
                                <div class="form-group">
                                    <button type="submit" name="submitDaftar" class="form-control btn btn-primary submit px-3">Sign Up</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="../assets/js/jquery.min.js"></script>
    <script src="../assets/js/popper.js"></script>
    <script src="../assets/js/bootstrap.min.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>