<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Stok Barang</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Tambah Stok Barang</h1>
        <form action="proses_tambah_stok.php" method="POST">
            <label for="barang">Pilih Barang:</label>
            <select name="id_barang" id="barang" required>
                <?php
                include 'config.php';
                $result = $conn->query("SELECT * FROM barang");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nama_barang']}</option>";
                }
                ?>
            </select>

            <label for="jumlah">Jumlah Stok:</label>
            <input type="number" name="jumlah" id="jumlah" required>

            <button type="submit">Tambah Stok</button>
        </form>
    </div>
</body>
</html>
