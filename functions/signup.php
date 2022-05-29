<?php

// jika tombol submit signup ditekan
if (isset($_POST["submitDaftar"])) {
    $nama = $_POST["nama"];
    $email = $_POST['email'];
    $nohp = $_POST['noHp'];
    $username = $_POST['username'];
    $pwd = $_POST['password'];
    $ulangPwd = $_POST['ulangiPassword'];

    require_once 'function.php';

    if (emptyInputsSignup($nama, $email, $nohp, $username, $pwd, $ulangPwd) !== false) {
        header("location: ../form/signup.php?error=emptyinput");
        exit();
    }

    if (invalidUsername($username) !== false) {
        header("location: ../form/signup.php?error=invalidusername");
        exit();
    }

    if (invalidEmail($email) !== false) {
        header("location: ../form/signup.php?error=invalidemail");
        exit();
    }

    if (pwdMatch($pwd, $ulangPwd) !== false) {
        header("location: ../form/signup.php?error=passwordsdontmatch");
        exit();
    }

    if (usernameExist($koneksi, $username, $email) !== false) {
        header("location: ../form/signup.php?error=usernametaken");
        exit();
    }

    if (nameExist($koneksi, $nama) !== false) {
        header("location: ../form/signup.php?error=nametaken");
        exit();
    }

    createUser($koneksi, $nama, $email, $nohp, $username, $pwd);
} else {
    header("location: ../form/signup.php");
    exit();
}
