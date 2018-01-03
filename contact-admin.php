<?php
session_start(); //menyimpan data di session

	if(empty($_SESSION['username'])){ //jika session username kosong
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
					<li><a href="home-karyawan.php">Home<span> | </span></a></li>
					<li><a href="data-diri.php">Data Diri<span> | </span></a></li>
					<li><a href="data-gaji-karyawan.php">Data Gaji<span> | </span></a></li>
					<li><a href="contact-admin.php">Contact Admin</a></li>
				<ul>
				
				<div class="logout-btn">
					<a href="logout.php" class="btn">LOGOUT</a>
				</div>
				<p><?php //menyimpan data session username dan menampilkannya
					echo $_SESSION['username'];
					?></p>
			</nav>
			<!--End Navbar-->
			
			<div class="clear"></div>

			<!--Content-->
			<div class="konten">
				<h2>Contact Admin</h2>
				<div class="data-admin">	
					<?php
						include ("koneksi/connection.php"); //koneksi ke database

						//query
						$sql = mysqli_query($connect, "SELECT * FROM tbl_admin");
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

				<div id="xper">
					<p><i>Note : jika ada kesalahan dalam menginput data, silahkan hubungi admin</i></p>
				</div>

				<!--GambarUpload-->
				<div id="foto-profile">
					<tr>
						<img src="images/<?php echo $var['foto']; ?>">
					</tr>
				</div>
				<!--EndGambarUpload-->
				
				<!--BottomBorder-->
				<h4></h4>
				<!--EndBottomBorder-->
			</div>
			<!--EndContent-->
			
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