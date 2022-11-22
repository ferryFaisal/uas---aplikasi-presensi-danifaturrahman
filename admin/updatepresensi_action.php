<?php
require "connect_db.php";
session_start();

$makul = $_POST['makul'];
$presensi = $_POST['presensi'];
$nid = $_GET['id'];
$sql1 = "UPDATE presensi SET makul='$makul', status_presensi='$presensi' WHERE id='$nid'";

if (mysqli_query($conn, $sql1)) {
    header('location: tables_presensi.php');
    ob_end_flush();
} else {
    echo "Error: " . $sql1 . "<br>" . $conn->error;
}

mysqli_close($conn);
