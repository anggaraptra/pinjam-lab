<?php
// koneksi ke database
$koneksi = mysqli_connect("localhost", "root", "", "pinjam_lab");

// fungsi untuk menampilkan data
function query($query)
{
    global $koneksi;
    $result = mysqli_query($koneksi, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

// fungsi tambah data pinjaman
function tambah($data)
{
    global $koneksi;
    $nama = htmlspecialchars($data["nama"]);
    $jumlahPeminjam = $data['jumlahPeminjam'];
    $lab = $data["lab"];
    $jamPinjam = $data["jamPinjam"];

    $query = "INSERT INTO peminjaman VALUES ('', '$nama', '$jumlahPeminjam', '$lab', '$jamPinjam')";

    mysqli_query($koneksi, $query);
    return mysqli_affected_rows($koneksi);
}

// fungsi edit nama lab
function editLab($data)
{
    global $koneksi;
    $id = $data['id'];
    $lab = $data['lab'];

    $query =  "UPDATE peminjaman SET nama_lab = '$lab' WHERE id = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi edit waktu pinjam
function editWaktuPinjam($data)
{
    global $koneksi;
    $id = $data['id'];
    $waktuPinjam = $data['waktuPinjam'];

    $query =  "UPDATE peminjaman SET waktu_pinjam = '$waktuPinjam' WHERE id = '$id'";

    mysqli_query($koneksi, $query);

    return mysqli_affected_rows($koneksi);
}

// fungsi sign up
function emptyInputsSignup($nama, $email, $nohp, $username, $pwd, $ulangPwd)
{
    $result = '';

    if (empty($nama)  || empty($email) || empty($nohp) || empty($username) || empty($pwd) || empty($ulangPwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidUsername($username)
{
    $result = '';

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidNama($nama)
{
    $result = '';

    if (!preg_match("/^[a-zA-Z0-9]*$/", $nama)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function invalidEmail($email)
{
    $result = '';
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function pwdMatch($pwd, $ulangPwd)
{
    $result = '';
    if ($pwd !== $ulangPwd) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function nameExist($koneksi, $nama)
{
    $result = '';
    $sql = "SELECT * FROM user WHERE nama = ?;";
    $stmt = mysqli_stmt_init($koneksi);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../form/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "s", $nama);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function usernameExist($koneksi, $username, $email)
{
    $result = '';
    $sql = "SELECT * FROM user WHERE username = ? OR email = ?;";
    $stmt = mysqli_stmt_init($koneksi);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../form/signup.php?error=stmtfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $username, $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    } else {
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}

function createUser($koneksi, $nama, $email, $nohp, $username, $pwd)
{
    $result = '';
    $sql = "INSERT INTO user (nama, email, no_hp, username, password, level) VALUES (?, ?, ?, ?, ?, 'user');";
    $stmt = mysqli_stmt_init($koneksi);

    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../form/signup.php?error=stmtfailed");
        exit();
    }

    $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sssss", $nama, $email, $nohp, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../form/signup.php?error=none");
    exit();
}

// fungsi login
function emptyInputsLogin($username, $pwd)
{
    $result = '';
    if (empty($username) || empty($pwd)) {
        $result = true;
    } else {
        $result = false;
    }

    return $result;
}

function loginUser($koneksi, $username, $pwd)
{
    $result = '';
    $usernameExists = usernameExist($koneksi, $username, $username);

    if ($usernameExists === false) {
        header("location: ../form/login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $usernameExists["password"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if ($checkPwd === false) {
        header("location: ../form/login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true && $usernameExists["level"] === "user") {
        session_start();
        $_SESSION["login"] = $usernameExists["nama"];
        $_SESSION["level"] = $usernameExists["level"];
        header("location: ../index.php");
        exit();
    } else if ($checkPwd === true && $usernameExists["level"] === "admin") {
        session_start();
        $_SESSION["login"] = $usernameExists["nama"];
        $_SESSION["level"] = $usernameExists["level"];
        header("location: ../admin/index.php");
        exit();
    }
}
