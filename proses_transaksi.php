<?php
include 'config.php';

$id_barang = $_POST['id_barang'];
$jumlah = $_POST['jumlah'];

// Ambil data barang
$result = $conn->query("SELECT * FROM barang WHERE id = $id_barang");
$barang = $result->fetch_assoc();

if ($barang['stok'] < $jumlah) {
    echo "<script>
            alert('Stok tidak mencukupi!');
            window.location.href='index.php';
          </script>";
    exit();
}

$total_harga = $barang['harga'] * $jumlah;

// Insert ke tabel transaksi
$conn->query("INSERT INTO transaksi (id_barang, jumlah, total_harga) VALUES ($id_barang, $jumlah, $total_harga)");

// Update stok barang
$conn->query("UPDATE barang SET stok = stok - $jumlah WHERE id = $id_barang");

echo "<script>
        alert('Transaksi berhasil!');
        window.location.href='index.php';
      </script>";
?>
