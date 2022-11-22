<?php
session_start();
require "connect_db.php";

$pass = sha1($pass);
//Insert table
$sql = "INSERT INTO presensi (tgl_presensi, makul, kelas, nim, nama, status_presensi)
        VALUES (SYSDATE(), '$makul', '$kelas', '$nim', '$nama', '$status')";

if (mysqli_query($conn, $sql)) {
    if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Admin')) {
        header('location: index.php');
    }
    if (isset($_SESSION['login']) && ($_SESSION['role'] == 'Dosen')) {
        header('location: ../index.php');
    } else {
        header('location: login.php');
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
