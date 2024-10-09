<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Program Kasir</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function openModal() {
            document.getElementById('modal').style.display = 'block';
        }

        function closeModal() {
            document.getElementById('modal').style.display = 'none';
        }
    </script>
    <style>
        /* Modal style */
        .modal {
            display: none;
            position: fixed;
            z-index: 1;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgb(0,0,0);
            background-color: rgba(0,0,0,0.4);
            padding-top: 60px;
        }

        .modal-content {
            background-color: #fefefe;
            margin: 5% auto;
            padding: 20px;
            border: 1px solid #888;
            width: 80%;
            max-width: 500px;
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
        }

        .close:hover,
        .close:focus {
            color: black;
            text-decoration: none;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Program Kasir</h1>
        <form action="proses_transaksi.php" method="POST">
            <label for="barang">Pilih Barang:</label>
            <select name="id_barang" id="barang" required>
                <?php
                include 'config.php';
                $result = $conn->query("SELECT * FROM barang");
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['id']}'>{$row['nama_barang']} - Tersedia ({$row['stok']})</option>";
                }
                ?>
            </select>

            <label for="jumlah">Jumlah:</label>
            <input type="number" name="jumlah" id="jumlah" required>

            <button type="submit">Tambahkan Transaksi</button>
        </form>

        <h2>Daftar Transaksi</h2>
        <table>
            <thead>
                <tr>
                    <th>Nama Barang</th>
                    <th>Jumlah</th>
                    <th>Total Harga</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $result = $conn->query("SELECT transaksi.*, barang.nama_barang FROM transaksi JOIN barang ON transaksi.id_barang = barang.id ORDER BY transaksi.tanggal DESC");
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>
                            <td>{$row['nama_barang']}</td>
                            <td>{$row['jumlah']}</td>
                            <td>Rp. {$row['total_harga']}</td>
                            <td>{$row['tanggal']}</td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>

        <h2>Hasil Penjualan</h2>
        <form action="hitung_penjualan.php" method="POST">
            <button type="submit">Hitung Hasil Penjualan</button>
        </form>

        <h2>Manajemen Stok</h2>
        <button onclick="openModal()">Tambah Stok Barang</button>
        
        <!-- Modal -->
        <div id="modal" class="modal">
            <div class="modal-content">
                <span class="close" onclick="closeModal()">&times;</span>
                <h1>Tambah Stok Barang</h1>
                <form action="proses_tambah_stok.php" method="POST">
                    <label for="barang">Pilih Barang:</label>
                    <select name="id_barang" id="barang" required>
                        <?php
                        $result = $conn->query("SELECT * FROM barang");
                        while ($row = $result->fetch_assoc()) {
                            echo "<option value='{$row['id']}'>{$row['nama_barang']} - Tersedia ({$row['stok']})</option>";
                        }
                        ?>
                    </select>

                    <label for="jumlah">Jumlah Stok:</label>
                    <input type="number" name="jumlah" id="jumlah" required>

                    <button type="submit">Tambah Stok</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
