<?php

// jika tombol submit login ditekan
if (isset($_POST["submitLogin"])) {
    $username = $_POST["username"];
    $pwd = $_POST["password"];

    require_once 'function.php';

    if (emptyInputsLogin($username, $pwd) !== false) {
        header("location: ../form/login.php?error=emptyinput");
        exit();
    }

    loginUser($koneksi, $username, $pwd);
} else {
    header("location: ../form/login.php");
    exit();
}
