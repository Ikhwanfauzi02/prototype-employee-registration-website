<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- penambahan css -->
    <link rel="stylesheet" href="css/button.css">
    <title>Update Data Pelamar</title>
</head>
<body>
    <!-- pemanbahan div -->
    <div class="container">
        <h2>Update Data Pelamar</h2><br></br>
        <?php
            // Memeriksa apakah ID pelamar disediakan melalui parameter GET
            if(isset($_GET['id'])) {
                // Mendapatkan ID pelamar dari parameter GET
            $id = $_GET['id'];

            // Memanggil koneksi ke database
            include('koneksi.db.php');

            // Menyiapkan dan menjalankan query untuk mendapatkan data pelamar berdasarkan ID
            $sql = "SELECT * FROM data_pelamar WHERE id='$id'";
            $result = $koneksi->query($sql);

            // Memeriksa apakah data ditemukan
            if ($result->num_rows > 0) {
                // Mendapatkan data pelamar
                $row = $result->fetch_assoc();
                $nama = $row['nama'];
                $email = $row['email'];
                $alamat = $row['alamat'];
                $telepon = $row['telepon'];
                $pendidikan = $row['pendidikan'];
                $universitas = $row['universitas'];
                $pengalaman = $row['pengalaman'];
                $deskripsi = $row['deskripsi'];
        ?>
            <!-- Menampilkan formulir dengan data pelamar yang telah ditemukan -->
            <form action="proses_update.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <label for="nama">Nama :</label>
            <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>"><br>
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>
            <label for="alamat">Alamat :</label>
            <textarea id="alamat" name="alamat" rows="4" ><?php echo $alamat; ?></textarea><br>
            <label for="telepon">Telepon:</label>
            <input type="text" id="telepon" name="telepon" value="<?php echo $telepon; ?>"><br>
            <label for="pendidikan">Pendidikan Terakhir :</label>
            <select id="pendidikan" name="pendidikan" required>
                <option value="">Pilih Pendidikan</option>
                <option value="SMA/SMK">SMA/SMK</option>
                <option value="Diploma">Diploma</option>
                <option value="Sarjana (S1)">Sarjana (S1)</option>
                <option value="Magister (S2)">Magister (S2)</option>
                <option value="Doktor (S3)">Doktor (S3)</option>
            </select><br>
            <!-- Penambahan form universitas -->
            <label for="universitas">Universitas :</label>
            <input type="text" id="universitas" name="universitas" value="<?php echo $universitas; ?>"><br>
            <!-- Penambahan form pengalaman -->
            <label for="pengalaman">Pengalaman :</label>
            <input type="number" id="pengalaman" name="pengalaman" value="<?php echo $pengalaman; ?>"><br>
            <!-- Penambahan form deskripsi -->
            <label for="deskripsi">Deskripsi Pengalaman :</label>
            <textarea id="deskripsi" name="deskripsi" rows="6" ><?php echo $deskripsi; ?></textarea><br>
            <!-- mengubah tampilan tombol -->
            <a class="button2" href="view_data.php">Kembali ke Data Pelamar</a>
            <input class="pos" type="submit" value="Update Data"><br><br><br>
        </form>
    <?php
        } else {
            echo "Data pelamar tidak ditemukan.";
        }

        // Menutup koneksi database
        $koneksi->close();
    } else {
        echo "ID pelamar tidak diberikan.";
    }
    ?>
</body>
</html>
