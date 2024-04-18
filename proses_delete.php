<?php
// Konfigurasi 
include('koneksi.db.php');
// Mendapatkan ID dari URL
$id = $_GET['id'];

// Menyiapkan dan menjalankan query untuk menghapus data pelamar berdasarkan ID
$sql = "DELETE FROM data_pelamar WHERE id = $id";

if ($koneksi->query($sql) === TRUE) {
    echo "Data berhasil dihapus.";
} else {
    echo "Error: " . $sql . "<br>" . $koneksi->error;
}

// Menutup koneksi database
$koneksi->close();

// Redirect kembali ke halaman view_data.php setelah proses penghapusan selesai
header("Location: view_data.php");
exit();
?>
