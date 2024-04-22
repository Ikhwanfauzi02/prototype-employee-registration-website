<?php
// Konfigurasi 
include('koneksi.db.php');

// Memeriksa apakah parameter id_pelamar tersedia dalam URL
if(isset($_GET['id_pelamar'])) {
    // Mendapatkan ID dari URL
    $id_pelamar = $_GET['id_pelamar'];

    // Menyiapkan dan menjalankan query untuk menghapus data pelamar berdasarkan ID
    $sql = "DELETE FROM data_pelamar WHERE id_pelamar = id_pelamar";
    
    // Prepare statement
    $stmt = $koneksi->prepare($sql);

    // Bind parameter
    $stmt->bind_param("i", $id_pelamar);

    // Execute statement
    if ($stmt->execute()) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }

    // Menutup statement
    $stmt->close();
} else {
    // Jika parameter id_pelamar tidak tersedia dalam URL
    echo "ID pelamar tidak diberikan.";
}

// Menutup koneksi database
$koneksi->close();

// Redirect kembali ke halaman view_data.php setelah proses penghapusan selesai
header("Location: view_data.php");
exit();
?>
