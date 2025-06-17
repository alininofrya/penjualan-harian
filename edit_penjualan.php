<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $q = $conn->query("SELECT * FROM penjualan WHERE id_penjualan = $id");
    $data = $q->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_produk = $_POST['id_produk'];
    $jumlah = $_POST['jumlah'];
    $tanggal = $_POST['tanggal'];

    $conn->query("UPDATE penjualan SET id_produk='$id_produk', jumlah='$jumlah', tanggal='$tanggal' WHERE id_penjualan=$id");
    header("Location: index.php");
}
?>

<h2>Edit Penjualan</h2>
<form method="POST">
    <label>Produk:</label>
    <select name="id_produk">
        <?php
        $produk = $conn->query("SELECT * FROM produk");
        while ($p = $produk->fetch_assoc()) {
            $selected = ($p['id_produk'] == $data['id_produk']) ? 'selected' : '';
            echo "<option value='{$p['id_produk']}' $selected>{$p['nama_produk']}</option>";
        }
        ?>
    </select><br><br>
    <label>Jumlah:</label>
    <input type="number" name="jumlah" value="<?= $data['jumlah'] ?>"><br><br>
    <label>Tanggal:</label>
    <input type="date" name="tanggal" value="<?= $data['tanggal'] ?>"><br><br>
    <button type="submit">Simpan Perubahan</button>
</form>
