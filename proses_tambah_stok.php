<?php
include 'config.php';

$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];

// Update stok barang
$conn->query("UPDATE barang SET stok = stok + $jumlah WHERE id = $id_barang");

echo "<script>
        alert('Stok berhasil ditambah!');
        window.location.href='index.php';
      </script>";
?>
