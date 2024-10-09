<?php
include 'config.php';

// Hitung total penjualan
$result = $conn->query("SELECT SUM(total_harga) AS total_penjualan FROM transaksi");
$row = $result->fetch_assoc();
$total_penjualan = $row['total_penjualan'];

echo "<script>
        alert('Total Penjualan: Rp. $total_penjualan');
        window.location.href='index.php';
      </script>";
?>
