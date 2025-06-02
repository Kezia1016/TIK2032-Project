<?php
$host = "localhost";     // host server (biasanya localhost)
$user = "root";          // user MySQL (default: root)
$pass = "";              // password MySQL (default: kosong)
$db   = "portfolio_db";  // nama database yang kamu buat

$conn = new mysqli($host, $user, $pass, $db);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
