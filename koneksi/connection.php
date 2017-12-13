<?php
$localhost = "localhost";
$username = "root";
$password = "";
$database = "konveksion";

$connect = new mysqli($localhost, $username, $password, $database);

if($connect -> connect_error){
	echo "Koneksi Database Gagal";
}
?>