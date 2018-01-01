<?php
//penyimpanan data sementara pada session
session_start();

//jika session kosong maka akan kembali ke index.html.
if(empty($_SESSION['username'])){
	header("location:index.html");
}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>KONVEKSION</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style2.css">
		<link rel="shortcut icon" href="assets/img/ICON.png">
	</head>
	
	<body>
		<!--Wrapper-->
		<div class="wrapper">
			<!--Header-->
			<header>
				<!--Logo-->
				<div id="logo">
					<img src="assets/img/LOGO1.png">
					<p>Melayani dengan Tulus dan Senyuman</p>
				</div>
				<!--End Logo-->
			</header>	
			<!--End Header-->
			
			<div class="clear"></div>
			
			<!--Navbar-->
			<nav>
				<ul>
					<li><a href="home-admin.php">Home<span> | </span></a></li>
					<li><a href="data-karyawan(admin).php">Data Karyawan<span> | </span></a></li>
					<li><a href="data-gaji-karyawan(admin).php">Data Gaji Karyawan<span> | </span></a></li>
					<li><a href="riwayat-penggajian(admin).php">Riwayat Penggajian<span> | </span></a></li>
					<li><a href="admin-area(admin).php">Admin Area</a></li>
				<ul>
				
				<div class="logout-btn">
					<a href="logout.php" class="btn">LOGOUT</a>
				</div>
				<!--Mengambil data session username di login.php-->
				<p><?php
					echo $_SESSION['username'];
					?></p>
			</nav>
			<!--End Navbar-->
			
			<div class="clear"></div>

			<!--Content-->
			<div class="konten">
				<h2>Admin Area</h2>
				<div class="data-admin">	
					<?php
						//koneksi ke database.
						include ("koneksi/connection.php");

						//mengambil data session yg ada di login.php pada saat login
						$id = $_SESSION['id_admin'];

						//query
						$sql = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE id_admin = '$id'");
						$var = mysqli_fetch_array($sql);
					?>
					<!--Data Admin-->
					<table>
						<tr>
							<td>Nama</td><td> : <td>
							<?php echo $var['nama']; ?></td>
						</tr>
					

						<tr>
							<td>Alamat</td><td> : <td>
							<?php echo $var['alamat']; ?></td>
						</tr>

						<tr>
							<td>Nomor Telepon</td><td> : <td>
							<?php echo $var['nomor_telepon']; ?></td>
						</tr>
					</table>
					<!--End DAta Admin-->
				</div>

				<!--GambarUpload-->
				<div id="foto-profile-admin">
					<tr>
						<img src="images/<?php echo $var['foto']; ?>">
					</tr>
				</div>
				<!--EndGambarUpload-->

				<!--ButtonEdit-->
				<div class="tom">
					<a href="update-admin-area.php?id=<?php echo $var['id_admin']; ?>">Update Data</a>
				</div>
				<!--End ButtonEdit-->
				
				<!--BottomBorder-->
				<h4></h4>
				<!--EndBottomBorder-->
			</div>
			<!--EndContent-->

			<div class="clear"></div>
			
			<!--DropUS-->
			<div class="drop-us">
				<div class="drop-us-about">
					<img src="assets/img/LOGO1.png">
					<p>Merupakan Perusahaan yang bergerak di bidang konveksi</p>
				</div>
				
				<div class="drop-us-contact">
					<h2>Kontak Kami</h2>
					<ul>
						<li><a href="#"><img src="assets/img/flickr.png"width="50" height="50"></a></li>
						<li><a href="#"><img src="assets/img/pinterest.png"width="50" height="50"></a></li>
						<li><a href="#"><img src="assets/img/facebook.png"width="50" height="50"></a></li>
						<li><a href="#"><img src="assets/img/instagram.png"width="50" height="50"></a></li>
						<li><a href="#"><img src="assets/img/google-plus.png"width="50" height="50"></a></li>
						<li><a href="#"><img src="assets/img/twitter.png"width="50" height="50"></a></li>
					</ul>
					<br></br>
				</div>
				
				<div class="drop-us-location">
					<h2>Lokasi Kami</h2>
					<div class="drop-phone">
						<img src="assets/img/phone.png" width="50" height="50">
						<p>+628152246785</p>	
					</div>
					<div class="drop-mail">
						<img src="assets/img/mails.png" width="50" height="50">
						<p>konveksions@gmail.com</p>
					</div>
					<div class="drop-locate">
						<img src="assets/img/locations.png" width="50" height="70">
						<p>JL. Cibuntu No.12 Kab. Bandung Barat</p>
					</div>	
				</div>
			</div>
			<!--End DropUs-->
			
			<!--Footer-->
			<footer>
				<p>Copyright &copy Informatika 2017.</p>
			</footer>
			<!--End Footer-->
		</div>
		<!--EndWrapper-->
	</body>
</html>