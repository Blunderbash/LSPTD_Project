<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST['id'];
    $no_penjualan = $_POST['no_penjualan'];
    $nama_kasir = $_POST['nama_kasir'];
    $tgl_penjualan = $_POST['tgl_penjualan'];
    $jam_penjualan = $_POST['jam_penjualan'];
    $total = $_POST['total'];

    $query = "UPDATE penjualan SET no_penjualan='$no_penjualan', nama_kasir='$nama_kasir', 
              tgl_penjualan='$tgl_penjualan', jam_penjualan='$jam_penjualan', total='$total' 
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
    $query = "SELECT * FROM penjualan WHERE id='$id'";
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
    <title>Edit Penjualan - LSPTDTOKO</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Penjualan</h2>
        <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <div class="form-group">
                <label for="no_penjualan">no_penjualan</label>
                <input type="text" class="form-control" id="no_penjualan" name="no_penjualan" value="<?php echo $row['no_penjualan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="nama_kasir">nama_kasir</label>
                <input type="text" class="form-control" id="nama_kasir" name="nama_kasir" value="<?php echo $row['nama_kasir']; ?>" required>
            </div>
            <div class="form-group">
                <label for="tgl_penjualan">tgl_penjualan</label>
                <input type="date" class="form-control" id="tgl_penjualan" name="tgl_penjualan" value="<?php echo $row['tgl_penjualan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="jam_penjualan">jam_penjualan</label>
                <input type="time" class="form-control" id="jam_penjualan" name="jam_penjualan" value="<?php echo $row['jam_penjualan']; ?>" required>
            </div>
            <div class="form-group">
                <label for="total">total</label>
                <input type="text" class="form-control" id="total" name="total" value="<?php echo $row['total']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Changes</button>
        </form>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
