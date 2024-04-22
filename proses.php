<!DOCTYPE html>
<html lang="en">
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

            // Cek apakah formulir telah disubmit
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                // Ambil nilai yang disubmit dari form
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $alamat = $_POST['alamat'];
                $telepon = $_POST['telepon'];
                $pendidikan = $_POST['pendidikan'];
                $universitas = $_POST['universitas'];
                $pengalaman = $_POST['pengalaman'];
                $deskripsi = $_POST['deskripsi'];
                
                // Query untuk menyimpan data pelamar
                $sql = "INSERT INTO data_pelamar (nama, email, alamat, telepon, pendidikan, universitas, pengalaman, deskripsi) VALUES ('$nama', '$email', '$alamat', '$telepon', '$pendidikan', '$universitas', '$pengalaman', '$deskripsi')";
                
                // Jalankan query
                if ($koneksi->query($sql) === TRUE) {
                    $id_pelamar = $koneksi->insert_id; // Dapatkan ID_Pelamar yang baru saja dimasukkan

                    // Validasi format file CV
                    $cv_allow_types = array('application/pdf', 'application/msword'); // Format yang diizinkan untuk CV (PDF dan DOC)
                    $cv_max_size = 5242880; // Ukuran maksimum file CV (5MB)
                    if (in_array($_FILES['cv']['type'], $cv_allow_types) && $_FILES['cv']['size'] <= $cv_max_size) {
                    // Lakukan penyimpanan file CV
                    $cv_nama = $_FILES['cv']['name'];
                    $cv_tmp_name = $_FILES['cv']['tmp_name'];
                    $cv_lokasi = "assets/fileCV/" . $cv_nama;
                    move_uploaded_file($cv_tmp_name, $cv_lokasi);
                    // Query untuk menyimpan informasi file CV
                    $sql_cv = "INSERT INTO file_pelamar (id_pelamar, jenis_file, nama_file, lokasi_file) VALUES ('$id_pelamar', 'CV', '$cv_nama', '$cv_lokasi')";
                    $koneksi->query($sql_cv);
                    } else {
                        echo "<script>alert('Format atau ukuran file CV tidak valid. Hanya file PDF dan DOC dengan ukuran maksimum 5MB yang diperbolehkan.'); window.location.href = 'index.php';</script>";
                        exit; // Hentikan eksekusi skrip karena format atau ukuran file CV tidak valid
                    }

                    // Validasi format file foto
                    $foto_allow_types = array('image/jpeg', 'image/png'); // Format yang diizinkan untuk foto (JPG dan PNG)
                    $foto_max_size = 8097152; // Ukuran maksimum file foto (8 MB)
                    if (in_array($_FILES['foto']['type'], $foto_allow_types) && $_FILES['foto']['size'] <= $foto_max_size) {
                    // Lakukan penyimpanan file foto
                    $foto_nama = $_FILES['foto']['name'];
                    $foto_tmp_name = $_FILES['foto']['tmp_name'];
                    $foto_lokasi = "assets/img/" . $foto_nama;
                    move_uploaded_file($foto_tmp_name, $foto_lokasi);
                    // Query untuk menyimpan informasi file foto
                    $sql_foto = "INSERT INTO File_Pelamar (id_pelamar, jenis_file, nama_file, lokasi_file) VALUES ('$id_pelamar', 'Foto', '$foto_nama', '$foto_lokasi')";
                    $koneksi->query($sql_foto);
                    } else {
                        echo "<script>alert('Format atau ukuran file foto tidak valid. Hanya file JPG dan PNG dengan ukuran maksimum 2MB yang diperbolehkan.'); window.location.href = 'index.php';</script>";
;

                        exit; // Hentikan eksekusi skrip karena format atau ukuran file foto tidak valid
                    }

                    echo "Data pelamar dan file berhasil disimpan.";

                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

                // Tutup koneksi
                $koneksi->close();
            }
        ?>
        <a href="index.php" class="button2 pos">Kembali ke Form Input</a>
    </div>
</body>
</html>
