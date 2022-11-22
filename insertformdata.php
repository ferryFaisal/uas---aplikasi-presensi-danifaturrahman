<?php
require "connect_db.php";

$nim = ($_POST["nim"]);
$name = ($_POST["name"]);
$kelas = ($_POST["kelas"]);

//Insert table
$sql = "INSERT INTO mahasiswa (nim, nama, kelas)
        VALUES ('$nim', '$name', '$kelas')";

if (mysqli_query($conn, $sql)) {
    echo "berhasil";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

mysqli_close($conn);
