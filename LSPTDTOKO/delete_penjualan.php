<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $query = "DELETE FROM penjualan WHERE id='$id'";

    if (mysqli_query($db, $query)) {
        header("Location: admin.php");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($db);
    }

    mysqli_close($db);
} else {
    header("Location: admin.php");
    exit();
}
?>
