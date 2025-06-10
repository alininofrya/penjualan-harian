<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

// Ambil data produk berdasarkan id
$result = $conn->query("SELECT * FROM produk WHERE id_produk = $id");
if ($result->num_rows == 0) {
    echo "Produk tidak ditemukan.";
    exit;
}
$produk = $result->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $conn->real_escape_string($_POST['nama_produk']);
    $harga = (float)$_POST['harga'];
    $stok = (int)$_POST['stok'];

    $update = $conn->query("UPDATE produk SET nama_produk='$nama',
     harga=$harga, stok=$stok WHERE id_produk= $id");

    if ($update) {
        header('Location: index.php');
        exit;
    } else {
        echo "Gagal update data: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Produk</title>
</head>
<body>
    <h1>Edit Produk</h1>
    <form method="post">
        <label>Nama Produk:</label><br>
        <input type="text" name="nama_produk" value="<?php echo htmlspecialchars($produk['nama_produk']); ?>" required><br><br>

        <label>Harga:</label><br>
        <input type="number" name="harga" step="0.01" value="<?php echo $produk['harga']; ?>" required><br><br>

        <label>Stok:</label><br>
        <input type="number" name="stok" value="<?php echo $produk['stok']; ?>" required><br><br>

        <button type="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>
</body>
</html>
