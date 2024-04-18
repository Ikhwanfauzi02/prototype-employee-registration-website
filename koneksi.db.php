<?php
// Konfigurasi ke database
$host = "localhost"; // Ganti dengan host Anda
$username = "root"; // Ganti dengan nama pengguna MySQL Anda
$password = ""; // Ganti dengan kata sandi MySQL Anda
$database = "cvbank"; // Ganti dengan nama database Anda

// Membuat koneksi ke database
$koneksi = mysqli_connect($host,$username,$password,$database);

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi gagal: " . $koneksi->connect_error);
}
?>