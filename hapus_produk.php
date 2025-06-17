<?php
include 'db.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit;
}

$id = $_GET['id'];

// Hapus produk berdasarkan id
$delete = $conn->query("DELETE FROM produk WHERE id_produk = '$id' ");

if ($delete) {
    header('Location: index.php');
    exit;
} else {
    echo "Gagal menghapus produk: " . $conn->error;
}
?>
