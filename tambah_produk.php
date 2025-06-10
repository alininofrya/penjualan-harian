<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Tambah Produk</title>
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
        <h2>Tambah Produk</h2>
        Nama: <input type="text" name="nama"><br>
        Harga: <input type="number" name="harga"><br>
        Stok: <input type="number" name="stok"><br>
        <button type="submit">Simpan</button>
    </form>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama'];
        $harga = $_POST['harga'];
        $stok = $_POST['stok'];
        $conn->query("INSERT INTO produk (nama_produk, harga, stok) VALUES ('$nama', '$harga', '$stok')");
        echo "Produk ditambahkan. <a href='index.php'>Kembali</a>";
    }
    ?>
</div>
</body>
</html>