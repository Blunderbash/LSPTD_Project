<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $kode_barang = $_POST['kode_barang'];
    $nama_barang = $_POST['nama_barang'];
    $harga_beli = $_POST['harga_beli'];
    $harga_jual = $_POST['harga_jual'];
    $stok = $_POST['stok'];
    $satuan = $_POST['satuan'];

    $query = "UPDATE barang SET kode_barang='$kode_barang', nama_barang='$nama_barang', 
              harga_beli='$harga_beli', harga_jual='$harga_jual', stok='$stok', satuan='$satuan' 
              WHERE id='$id'";

    if (mysqli_query($db, $query)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error updating record: " . mysqli_error($db);
    }

    mysqli_close($db);
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM barang WHERE id='$id'";
    $result = mysqli_query($db, $query);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: admin.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Edit Barang - LSPTDTOKO</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Barang</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="kode_barang">kode_barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" value="<?php echo $row['kode_barang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_barang">nama_barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" value="<?php echo $row['nama_barang']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga_beli">harga_beli</label>
                <input type="text" class="form-control" id="harga_beli" name="harga_beli" value="<?php echo $row['harga_beli']; ?>" required>
            </div>
            <div class="form-group">
                <label for="harga_jual">harga_jual</label>
                <input type="text" class="form-control" id="harga_jual" name="harga_jual" value="<?php echo $row['harga_jual']; ?>" required>
            </div>
            <div class="form-group">
                <label for="stok">stok</label>
                <input type="text" class="form-control" id="stok" name="stok" value="<?php echo $row['stok']; ?>" required>
            </div>
            <div class="form-group">
                <label for="satuan">satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" value="<?php echo $row['satuan']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
