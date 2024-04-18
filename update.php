<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pelamar</title>
</head>
<body>
    <h2>Update Data Pelamar</h2>
    <form action="proses_update.php" method="post">
        <input type="hidden" name="id" value="<?php echo $id; ?>"> <!-- id data yang akan diupdate -->
        <label for="nama">Nama:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $nama; ?>"><br>
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" value="<?php echo $email; ?>"><br>
        <label for="alamat">Alamat:</label><br>
        <textarea id="alamat" name="alamat"><?php echo $alamat; ?></textarea><br>
        <label for="telepon">Telepon:</label><br>
        <input type="text" id="telepon" name="telepon" value="<?php echo $telepon; ?>"><br>
        <label for="pendidikan">Pendidikan:</label><br>
        <input type="text" id="pendidikan" name="pendidikan" value="<?php echo $pendidikan; ?>"><br>
        <label for="universitas">Universitas:</label><br>
        <input type="text" id="universitas" name="universitas" value="<?php echo $universitas; ?>" disabled><br>
        <label for="pengalaman">Pengalaman:</label><br>
        <textarea id="pengalaman" name="pengalaman"><?php echo $pengalaman; ?></textarea><br><br>
        <label for="deskripsi">Deskripsikan Pengalaman Anda :</label><br>
        <textarea id="deskripsi" name="deskripsi" disabled value="<?php echo $deskripsi; ?>"></textarea><br><br>
        <input type="submit" value="Update Data">
    </form>
</body>
</html>
