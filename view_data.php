<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <!-- penambahan css -->
    <link rel="stylesheet" href="css/button.css">
    <title>Data Pelamar</title>
</head>
<body>
    <!-- pemanbahan div -->
    <div class="container2">
    <h2>Data Pelamar</h2></br></br>
    <!-- mengubah tampilan tombol -->
    <a class="button2" href="index.php">Menu Utama</a>
    <table>
        <tr>
            <th>ID</th>
            <th>Nama</th>
            <th>Email</th>
            <th>Telepon</th>
            <th>Pendidikan</th>
            <th>Action</th>
        </tr>
        <?php
        // Memanggil koneksi ke database
        include('koneksi.db.php');

        // Menyiapkan dan menjalankan query untuk mengambil data pelamar
        $sql = "SELECT * FROM data_pelamar";
        $result = $koneksi->query($sql);

        // Menampilkan data dalam tabel
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["id"] . "</td>";
                echo "<td>" . $row["nama"] . "</td>";
                echo "<td>" . $row["email"] . "</td>";
                echo "<td>" . $row["telepon"] . "</td>";
                echo "<td>" . $row["pendidikan"] . "</td>";
                // tombol delete dengan link ke halaman proses_delete.php
                echo "<td>
                        <a href='detail_form.php?id=" . $row["id"] . "' class='button'>Detail</a>
                        <a href='update_form.php?id=" . $row["id"] . "' class='button1'>Update</a>
                        <a href='proses_delete.php?id=" . $row["id"] . "' class='button2'>Delete</a>
                </td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>Tidak ada data pelamar.</td></tr>";
        }

        // Menutup koneksi database
        $koneksi->close();
        ?>
    </table>
    </div>
</body>
</html>
