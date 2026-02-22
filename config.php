<?php
$host = 'localhost';
$user = 'root';
$pass = '';
$db   = 'db_kelompok';

$conn = new mysqli($host, $user, $pass, $db);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Set charset ke UTF-8
$conn->set_charset("utf8");
?>