<?php
session_start(); //menyimpan data di session
include ("koneksi/connection.php"); //koneksi ke database

//mengambil data Post di index.html
$username = $_POST['username'];
$password = md5($_POST['password']);

//query untuk login admin
$query2 = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE username = '$username' AND password = '$password'");
$x = mysqli_fetch_array($query2);

//query untuk login karyawan
$query = mysqli_query($connect, "SELECT * FROM tbl_data WHERE username = '$username' AND password = '$password'");
$y = mysqli_fetch_array($query);

//jika kondisi adalah username admin dan password admin, masuk ke halaman admin
if($x['username'] == $username AND $x['password'] == $password){
	$_SESSION['username'] = $x['username'];
	$_SESSION['password'] = $x['password'];
	$_SESSION['id_admin'] = $x['id_admin'];

	header("location:home-admin.php");

}else if($y['username'] == $username AND $y['password'] == $password){
	$_SESSION['username'] = $y['username'];
	$_SESSION['password'] = $y['password'];
	$_SESSION['nama'] = $y['nama'];
	$_SESSION['id'] = $y['id_karyawan'];

	header("location:home-karyawan.php");

}else{
	echo "<script>alert('username/password salah'); window.location = 'index.html'; </script>";
}
?>