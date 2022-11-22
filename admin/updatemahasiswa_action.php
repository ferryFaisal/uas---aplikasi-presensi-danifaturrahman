<?php
require "connect_db.php";
session_start();

$nnim = $_POST['nim'];
$sql1 = "UPDATE mahasiswa SET nama='$nama', kelas='$kelas' WHERE nim='$nnim'";

if (mysqli_query($conn, $sql1)) {
    if (($_SESSION['role']) == 'Admin') {
        header('location: tables_mahasiswa.php');
        ob_end_flush();
    }
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

mysqli_close($conn);
