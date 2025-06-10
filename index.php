<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Manajemen Penjualan Harian</title>
</head>
<body>

<div class="navbar">
    <a href="index.php">Beranda</a>
    <a href="tambah_produk.php">Tambah Produk</a>
    <a href="tambah_penjualan.php">Tambah Penjualan</a>
    <a href="laporan.php">Laporan Harian</a>
</div>
<div class="container">

    <h1>Daftar Produk</h1>
    <table>
        <tr>
            <th>ID</th><th>Nama</th><th>Harga</th><th>Stok</th><th>Aksi</th>
        </tr>
        <?php
        $q = $conn->query("SELECT * FROM produk");
        while ($row = $q->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id_produk']}</td>
                <td>{$row['nama_produk']}</td>
                <td>{$row['harga']}</td>
                <td>{$row['stok']}</td>
                <td>
                    <a href='edit_produk.php?id={$row['id_produk']}'>Edit</a> | 
                    <a href='hapus_produk.php?id={$row['id_produk']}' onclick=\"return confirm('Yakin ingin menghapus produk ini?');\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>

    <h1>Daftar Penjualan</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Produk</th>
            <th>Jumlah</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>
        <?php
        $q = $conn->query("SELECT j.*, p.nama_produk FROM penjualan j JOIN produk p ON j.id_produk = p.id_produk");
        while ($row = $q->fetch_assoc()) {
            echo "<tr>
                <td>{$row['id_penjualan']}</td>
                <td>{$row['nama_produk']}</td>
                <td>{$row['jumlah']}</td>
                <td>{$row['tanggal']}</td>
                <td>
                    <a href='edit_penjualan.php?id={$row['id_penjualan']}'>Edit</a> | 
                    <a href='hapus_penjualan.php?id={$row['id_penjualan']}' onclick=\"return confirm('Yakin ingin menghapus penjualan ini?');\">Hapus</a>
                </td>
            </tr>";
        }
        ?>
    </table>

</div>
</body>
</html>
