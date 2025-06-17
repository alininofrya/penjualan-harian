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

    <?php
    // Query rata-rata total pendapatan
    $q_avg = $conn->query("SELECT AVG(total_pendapatan) AS rata_rata_pendapatan FROM v_laporan_harian");
    $avg = $q_avg->fetch_assoc();
    ?>
    <p><strong>Rata-rata Total Pendapatan: </strong>Rp <?php echo number_format($avg['rata_rata_pendapatan'], 2, ',', '.'); ?></p>

    <?php
    // Produk yang paling banyak terjual (akumulasi total per produk)
    $q_top = $conn->query("SELECT nama_produk, MAX(total_terjual) AS jumlah_terjual 
                           FROM v_laporan_harian 
                           GROUP BY nama_produk 
                           ORDER BY jumlah_terjual DESC");
    $top = $q_top->fetch_assoc();
    ?>
    <p><strong>Produk Terlaris: </strong><?php echo $top['nama_produk']; ?> (<?php echo $top['jumlah_terjual']; ?> unit)</p>

</div>

<?php


?>
</body>
</html>