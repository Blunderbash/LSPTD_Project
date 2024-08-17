<?php
$server = "localhost";
$user = "root";
$password = "";
$nama_database = "data";
$db = mysqli_connect($server, $user, $password, $nama_database);
#echo "berhasil terkoneksi....";
if(!$db){
	die("Gagal terhubung dengan databse: ".mysqli_connect_error());
}
?>