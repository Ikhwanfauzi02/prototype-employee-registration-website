<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- penambahan css -->
    <link rel="stylesheet" href="css/button.css">
    <title>Detail Data Pelamar</title>
</head>
<style>
.images {
    max-width: 100px;
    height: auto;
    display: block;
    margin: 0 auto;
}
</style>
<body>
    <div class="container">
    <h2>Detail Data Pelamar</h2><br>
        <?php
            // Memeriksa apakah ID pelamar disediakan melalui parameter GET
            if(isset($_GET['id_pelamar'])) {
                // Mendapatkan ID pelamar dari parameter GET
                $id_pelamar = $_GET['id_pelamar'];

                // Memanggil koneksi ke database
                include('koneksi.db.php');

                // untuk mendapatkan data pelamar berdasarkan ID
                $sql = "SELECT * FROM data_pelamar WHERE id_pelamar ='$id_pelamar'";
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

                // Periksa apakah ada nama file foto yang tersedia untuk pelamar
                if (!empty($row['nama_file_foto'])) {
                    $nama_file = $row['nama_file_foto']; // Ganti dengan nama kolom yang sesuai di tabel Anda
                    $lokasi_file = "bank/assets/img/" . $nama_file; // Ganti dengan lokasi direktori penyimpanan foto di server lokal Anda
                    echo "<img src='$lokasi_file' alt='Foto Pelamar' class='images'>";
                } else {
                    echo "Foto tidak tersedia.";
                }


        ?>
            <!-- Menampilkan formulir dengan data pelamar yang telah ditemukan -->
            <form action="proses_update.php" method="post">
                <!-- Penambahan form deskripsi -->
                <textarea id="deskripsi" name="deskripsi" rows="4"  readonly><?php echo $deskripsi; ?></textarea><br>
                <input type="hidden" name="id_pelamar" value="<?php echo $id_pelamar; ?>">
                <label for="nama">Nama :</label>
                <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>" readonly><br>
                <label for="email">Email :</label>
                <input type="email" id="email" name="email" value="<?php echo $email; ?>" readonly><br>
                <label for="alamat">Alamat :</label>
                <textarea id="alamat" name="alamat" readonly><?php echo $alamat; ?></textarea><br>
                <label for="telepon">Telepon :</label>
                <input type="text" id="telepon" name="telepon" value="<?php echo $telepon; ?>" readonly><br>
                <label for="pendidikan">Pendidikan :</label>
                <input type="text" id="pendidikan" name="pendidikan" value="<?php echo $pendidikan; ?>" readonly><br>
                <!-- Penambahan form universitas -->
                <label for="universitas">Universitas :</label>
                <input type="text" id="universitas" name="universitas" value="<?php echo $universitas; ?>" readonly><br>
                <!-- Penambahan form Pengalaman -->
                <label for="pengalaman">Pengalaman (tahun) :</label>
                <input type="text" id="pengalaman" name="pengalaman" value="<?php echo $pengalaman; ?>" readonly><br>
                <!-- mengubah tampilan tombol -->
                <a class="button2" href="view_data.php">Kembali ke Data Pelamar</a>
                <!-- Link download CV and foto -->
            
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
    </div>
</body>
</html>
