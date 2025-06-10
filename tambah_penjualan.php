<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Tambah Penjualan</title>
</head>
<body>
<div class="navbar">
    <a href="index.php">Beranda</a>
    <a href="tambah_produk.php">Tambah Produk</a>
    <a href="tambah_penjualan.php">Tambah Penjualan</a>
    <a href="laporan.php">Laporan Harian</a>
</div>
<div class="container">
    <form method="post">
        <h2>Tambah Penjualan</h2>
        Produk:
        <select name="id_produk">
            <?php
            $res = $conn->query("SELECT * FROM produk");
            while ($row = $res->fetch_assoc()) {
                echo "<option value='{$row['id_produk']}'>{$row['nama_produk']}</option>";
            }
            ?>
        </select><br>
        Jumlah: <input type="number" name="jumlah"><br>
        <button type="submit">Simpan</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $id_produk = $_POST['id_produk'];
        $jumlah = $_POST['jumlah'];
        $tanggal = date('Y-m-d');
        $conn->query("INSERT INTO penjualan (id_produk, jumlah, tanggal) VALUES ($id_produk, $jumlah, '$tanggal')");
        echo "Penjualan ditambahkan. <a href='index.php'>Kembali</a>";
    }
    ?>
</div>
</body>
</html>