<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- penambahan css -->
    <link rel="stylesheet" href="css/button.css">
    <title>Form Aplikasi Cv Bank</title>
</head>
<body>
    <div class="container">
        <h2>Form Aplikasi CV Bank Calon Pegawai</h2></br></br>
        <form action="proses.php" method="post" enctype="multipart/form-data"> <!--enctype attribut untuk izin upload file--> 
            <label for="nama">Nama Lengkap :</label>
            <input type="text" id="nama" name="nama" required placeholder="Nama Lengkap"><br>

            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required placeholder="Example@gmail.com"><br>

            <label for="alamat">Alamat:</label>
            <textarea id="alamat" name="alamat" rows="4" required placeholder="Alamat Lengkap"></textarea><br>

            <label for="telepon">Nomor Telepon :</label>
            <input type="text" id="telepon" name="telepon" placeholder="Phone Number" required><br>

            <label for="pendidikan">Pendidikan Terakhir :</label>
            <select id="pendidikan" name="pendidikan" required>
                <option value="">Pilih Pendidikan</option>
                <option value="SMA/SMK">SMA/SMK</option>
                <option value="Diploma">Diploma</option>
                <option value="Sarjana (S1)">Sarjana (S1)</option>
                <option value="Magister (S2)">Magister (S2)</option>
                <option value="Doktor (S3)">Doktor (S3)</option>
            </select><br>
            <!-- tambah univeristas -->
            <label for="universitas">Universitas :</label>
            <input type="text" id="universitas" name="universitas" required placeholder="Universitas"><br>
            <!-- tambah pengalaman -->
            <label for="pengalaman">Pengalaman Kerja (dalam tahun) :</label>
            <input type="number" id="pengalaman" name="pengalaman" min="0" required><br>
            <!-- tambah deskripsi -->
            <label for="deskripsi">Deskripsi Pengalaman :</label>
            <textarea id="deskripsi" name="deskripsi" rows="6" required placeholder="Deskripsi Pengalaman Kerja"></textarea></br>
            

            <input class="mgr" type="submit" value="Submit">
        </form>
        <!-- mengubah tampilan tombol -->
        <a class="button" href="view_data.php">Lihat Data</a>
    </div>
</body>
</html>
