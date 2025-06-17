<?php
include 'db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn->query("DELETE FROM penjualan WHERE id_penjualan = $id");
}

header("Location: index.php");
exit;
