<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- penambahan css -->
    <link rel="stylesheet" href="css/button.css">
    <title>CV Bank</title>
</head>
<body>
    <div class="container">
        <?php
        // Konfigurasi ke database
        include('koneksi.db.php');

        // input data dari form ke database
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $alamat = $_POST['alamat'];
        $telepon = $_POST['telepon'];
        $pendidikan = $_POST['pendidikan'];
        $universitas = $_POST['universitas'];
        $pengalaman = $_POST['pengalaman'];
        $deskripsi = $_POST['deskripsi'];

        // Menyiapkan pernyataan SQL untuk menyisipkan data
        $sql = "INSERT INTO data_pelamar (nama, email, alamat, telepon, pendidikan,  universitas, pengalaman, deskripsi) VALUES ('$nama', '$email', '$alamat', '$telepon', '$pendidikan', '$universitas', '$pengalaman', '$deskripsi')";

        // Menjalankan pernyataan SQL dan memeriksa keberhasilannya
        if ($koneksi->query($sql) === TRUE) {
            echo "Data berhasil disimpan ke database. <a href='index.php'>Kembali ke halaman utama</a>";
            // Redirect ke halaman index.php setelah proses penyimpanan data selesai
        
        } else {
            echo "Error: " . $sql . "<br>" . $koneksi->error;
        }

        // Menutup koneksi database
        $koneksi->close();
        ?>

    </div>
</body>
</html>