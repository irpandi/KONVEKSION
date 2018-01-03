<?php
session_start(); //menyimpan data sementara di session

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
				<p><?php //mengambil data session dan menampilkannya
					echo $_SESSION['username'];
					?></p>
			</nav>
			<!--End Navbar-->
			
			<div class="clear"></div>

			<!--Content-->
			<div class="konten">
				<h2>Data Diri</h2>
				<div class="data">	
					<?php
						include ("koneksi/connection.php"); //koneksi ke database
						
						$id = $_SESSION['id']; //mengambil data dari session yg ada di login.php pada saat login

						//query
						$sql = mysqli_query($connect, "SELECT id_karyawan,nik,nama,foto,ttl,jenis_kelamin,nomor_telepon,alamat,bagian FROM tbl_data WHERE id_karyawan = '$id'");
						$var = mysqli_fetch_array($sql);
					?>
					<!--DataDiri-->
					<table>
						<tr>
							<td>NIK</td><td> : <td>
							<?php echo $var['nik']; ?></td>
						</tr>
					

						<tr>
							<td>Nama</td><td> : <td>
							<?php echo $var['nama']; ?></td>
						</tr>

						<tr>
							<td>Tempat Tanggal Lahir</td><td> : <td>
							<?php echo $var['ttl']; ?></td>
						</tr>

						<tr>
							<td>Jenis Kelamin</td><td> : <td>
							<?php echo $var['jenis_kelamin']; ?></td>
						</tr>

						<tr>
							<td>Nomor Telepon</td><td> : <td>
							<?php echo $var['nomor_telepon']; ?></td>
						</tr>

						<tr>
							<td>Alamat</td><td> : <td>
							<div style="width:40%;">	
								<?php echo $var['alamat']; ?></td>
							</div>
						</tr>

						<tr>
							<td>Bagian</td><td> : <td>
							<?php echo $var['bagian']; ?></td>
						</tr>
					</table>
					<!--EndDataDiri-->
				</div>
				
				<!--GambarUpload-->
				<div id="foto-profile">
					<tr>
						<img src="images/<?php echo $var['foto']; ?>">
					</tr>
				</div>
				<!--EndGambarUpload-->
				

				<!--ButtonGantiFoto>
				<a href="#">Ganti Foto</a>
				<EndButtonGantiFoto-->
				
				<!--ButtonEditData-->
				<div class="tom">
					<a href="edit-data-diri.php?id=<?php echo $var['id_karyawan']; ?>">Edit Data</a>
				</div>
				<!--EndButtonEditData-->
				
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