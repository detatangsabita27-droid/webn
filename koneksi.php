<?php

$server   = "localhost"; // Alamat host database xampp
$user     = "root";     // User default xampp
$pass     = "";         // Password user root
$db_name  = "db_mahasiswa";

$koneksi = mysqli_connect($server, $user, $pass, $db_name);

if (!$koneksi) {
    die("Gagal terhubung ke database: " . mysqli_connect_error());
}

?>