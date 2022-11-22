<?php
require 'connect_db.php';
session_start();

$email = $_GET['email'];
$sql = "DELETE FROM users WHERE email = '$email'";

if (mysqli_query($conn, $sql)) {
    if (($_SESSION['role']) == 'Admin') {
        header('location: tables_users.php');
        ob_end_flush();
    }
} else {
    echo "Error deleting record: " . $conn->error;
}

mysqli_close($conn);
