<!DOCTYPE html>
<html>
<head>
    <title>LSPTDTOKO</title>
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
        <h2>LSPTDTOKO</h2>
        <form method="GET" action="index.php">
            <div class="form-group">
                <label for="search">Pencarian</label>
                <input type="text" class="form-control" id="search" name="search" placeholder="Cari Barang">
            </div>
            <button type="submit" class="btn btn-primary">Mencari</button>
        </form>

        <div class="table-container">
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
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'koneksi.php';
                    $search = isset($_GET['search']) ? $_GET['search'] : '';
                    $query = "SELECT * FROM barang WHERE nama_barang LIKE '%$search%' OR kode_barang LIKE '%$search%'";
                    $result = mysqli_query($db, $query);

                    while ($row = mysqli_fetch_array($result)) {
                        echo "<tr>
                                <td>{$row['id']}</td>
                                <td>{$row['kode_barang']}</td>
                                <td>{$row['nama_barang']}</td>
                                <td>{$row['harga_beli']}</td>
                                <td>{$row['harga_jual']}</td>
                                <td>{$row['stok']}</td>
                                <td>{$row['satuan']}</td>
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
