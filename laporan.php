<?php include 'db.php'; ?>
<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="style.css">
    <title>Laporan Harian</title>
</head>
<body>
<div class="navbar">
    <a href="index.php">Beranda</a>
    <a href="tambah_produk.php">Tambah Produk</a>
    <a href="tambah_penjualan.php">Tambah Penjualan</a>
    <a href="laporan.php">Laporan Harian</a>
</div>
<div class="container">
    <h2>Laporan Harian</h2>
    <table>
        <tr><th>Tanggal</th><th>Produk</th><th>Total Terjual</th><th>Total Pendapatan</th></tr>
        <?php
        $q = $conn->query("SELECT * FROM v_laporan_harian");
        while ($row = $q->fetch_assoc()) {
            echo "<tr>
                <td>{$row['tanggal']}</td>
                <td>{$row['nama_produk']}</td>
                <td>{$row['total_terjual']}</td>
                <td>{$row['total_pendapatan']}</td>
            </tr>";
        }
        ?>
    </table>
</div>
</body>
</html>