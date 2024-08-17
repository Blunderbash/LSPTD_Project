<!DOCTYPE html>
<html>
<head>
    <title>Admin Panel - LSPTDTOKO</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            display: flex;
        }
        .sidebar {
            width: 250px;
            background-color: #f8f9fa;
            padding: 15px;
            height: 100vh;
        }
        .sidebar a {
            display: block;
            padding: 10px;
            color: #333;
            text-decoration: none;
        }
        .sidebar a:hover {
            background-color: #ddd;
        }
        .content {
            flex: 1;
            padding: 20px;
        }
        .table-container {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <h2>Menu</h2>
        <a href="index.php">Home</a>
        <a href="admin.php">Admin</a>
        <a href="laporan.php">Penjualan</a>
    </div>
    <div class="content">
        <h2>Admin Panel - LSPTDTOKO</h2>
        
        <!-- Goods (Barang) Table -->
        <h3>Barang</h3>
        <div class="table-container">
            <a href="add_barang.php" class="btn btn-primary mb-3">Tambah Barang</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>kode_barang</th>
                        <th>nama_barang</th>
                        <th>harga_beli</th>
                        <th>harga_jual</th>
                        <th>stok</th>
                        <th>satuan</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $query_barang = "SELECT * FROM barang";
                    $result_barang = mysqli_query($db, $query_barang);

                    while ($row_barang = mysqli_fetch_array($result_barang)) {
                        echo "<tr>
                                <td>{$row_barang['id']}</td>
                                <td>{$row_barang['kode_barang']}</td>
                                <td>{$row_barang['nama_barang']}</td>
                                <td>{$row_barang['harga_beli']}</td>
                                <td>{$row_barang['harga_jual']}</td>
                                <td>{$row_barang['stok']}</td>
                                <td>{$row_barang['satuan']}</td>
                                <td>
                                    <a href='edit_barang.php?id={$row_barang['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_barang.php?id={$row_barang['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
        
        <!-- Sales (Penjualan) Table -->
        <h3>Penjualan</h3>
        <div class="table-container">
            <a href="add_penjualan.php" class="btn btn-primary mb-3">Tambah Penjualan</a>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>id</th>
                        <th>no_penjualan</th>
                        <th>nama_kasir</th>
                        <th>tgl_penjualan</th>
                        <th>jam_penjualan</th>
                        <th>total</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query_penjualan = "SELECT * FROM penjualan";
                    $result_penjualan = mysqli_query($db, $query_penjualan);

                    while ($row_penjualan = mysqli_fetch_array($result_penjualan)) {
                        echo "<tr>
                                <td>{$row_penjualan['id']}</td>
                                <td>{$row_penjualan['no_penjualan']}</td>
                                <td>{$row_penjualan['nama_kasir']}</td>
                                <td>{$row_penjualan['tgl_penjualan']}</td>
                                <td>{$row_penjualan['jam_penjualan']}</td>
                                <td>{$row_penjualan['total']}</td>
                                <td>
                                    <a href='edit_penjualan.php?id={$row_penjualan['id']}' class='btn btn-warning btn-sm'>Edit</a>
                                    <a href='delete_penjualan.php?id={$row_penjualan['id']}' class='btn btn-danger btn-sm'>Delete</a>
                                </td>
                              </tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
