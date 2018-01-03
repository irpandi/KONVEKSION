<?php
session_start(); //menyimpan data di session

	if(empty($_SESSION['username'])){ //jika session username kosong kembali ke index.html
		header("location:index.html");
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>KONVEKSION</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style2.css">
		<link rel="stylesheet" type="text/css" href="assets/css/responsee-gaji-karyawan.css">
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
				<p><?php //menyimpan data session username kemudian menampilkannya
					echo $_SESSION['username'];
					?></p>
			</nav>
			<!--End Navbar-->
			
			<div class="clear"></div>

			<!--Content-->
			<div class="konten">
				<h2>Data Gaji</h2>
				<div id="data-gaji">	
					<?php
						include ("koneksi/connection.php"); //koneksi ke database
						
						$id = $_SESSION['id']; //mengambil sessio di login.php pada saat login

						//query
						$sql = mysqli_query($connect, "SELECT id_karyawan,nama,uang_makan,bonus,kasbon,gaji,gaji_total,banyak_1,banyak_2,banyak_3,nama_barang_1,nama_barang_2,nama_barang_3,harga_1,harga_2,harga_3,jumlah_1,jumlah_2,jumlah_3,jumlah_total,bagian FROM tbl_data WHERE id_karyawan = '$id'");
						$var = mysqli_fetch_array($sql);
					?>
					<!--DataDiri-->
					<table>
						<tr>
							<td>Nama</td><td> : <td>
							<?php echo $var['nama']; ?></td>
						</tr>

						<tr>
							<td>Bagian</td><td> : <td>
							<?php echo $var['bagian']; ?></td>
						</tr>

						<tr>
							<td>Uang Makan</td><td> : <td>
							<?php echo $var['uang_makan']; ?></td>
						</tr>

						<tr>
							<td>Bonus</td><td> : <td>
							<?php echo $var['bonus']; ?></td>
						</tr>

						<tr>
							<td>Kasbon</td><td> : <td>
							<?php echo $var['kasbon']; ?></td>
						</tr>
					</table>
				</div>

				<div id="gaji-table">
					<table border="2px">
						<tr bgcolor="lightblue">
							<td>Banyaknya</td>
							<td>Nama Barang</td>
							<td>Harga</td>
							<td>Jumlah</td>
						</tr>

						<tr>
							<td><?php echo $var['banyak_1'] ?></td>
							<td><?php echo $var['nama_barang_1'] ?></td>
							<td><?php echo $var['harga_1'] ?></td>
							<td><?php echo $var['jumlah_1'] ?></td>
						</tr>
						<tr>
							<td><?php echo $var['banyak_2'] ?></td>
							<td><?php echo $var['nama_barang_2'] ?></td>
							<td><?php echo $var['harga_2'] ?></td>
							<td><?php echo $var['jumlah_2'] ?></td>
						</tr>
						<tr>
							<td><?php echo $var['banyak_3'] ?></td>
							<td><?php echo $var['nama_barang_3'] ?></td>
							<td><?php echo $var['harga_3'] ?></td>
							<td><?php echo $var['jumlah_3'] ?></td>
						</tr>
						</table>

						<table border="2px">
							<tr>
								<th>Jumlah Total</th>
								<td><?php echo $var['jumlah_total']; ?></td>
							</tr>
							<tr>
								<th>Gaji Total</th>
								<td><?php echo $var['gaji_total']; ?></td>
							</tr>
						</table>
				</div>
				<!--EndDataDiri-->

				<!--ButtonGantiFoto>
				<a href="#">Ganti Foto</a>
				<EndButtonGantiFoto-->
				
				<!--ButtonPrintData-->
				<div class="tom1">
					<a target="blank" href="print-gaji-karyawan.php?id=<?php echo $var['id_karyawan']; ?>">Print</a>
				</div>
				<!--EndPrintEditData-->
				
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