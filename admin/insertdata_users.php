<?php
ob_start();
session_start();
require "connect_db.php";

$pass = sha1($pass);
//Insert table
$sql = "INSERT INTO users (email, name, password, role, photo, date_created, date_modified)
        VALUES ('$email', '$name', '$pass', '$role', '$image', curdate(), curdate())";

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
