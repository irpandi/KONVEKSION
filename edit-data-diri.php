<?php
session_start(); //menyimpan data semetara di session

if(empty($_SESSION['username'])){ //jika sessio username kosong
	header("location:index.html");
	}
?>

<!DOCTYPE HTML>
<html>
	<head>
		<title>KONVEKSION</title>
		<link rel="stylesheet" type="text/css" href="assets/css/style4.css">
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
				<h2>Edit Data Diri</h2>
				<?php
					include ("koneksi/connection.php"); //koneksi ke database

					$id = $_GET['id']; //mengambil url id di data-diri.php

					//query
					$sql = mysqli_query($connect, "SELECT id_karyawan,nik,nama,foto,ttl,jenis_kelamin,nomor_telepon,alamat,bagian FROM tbl_data WHERE id_karyawan = '$id'");

					$data = mysqli_fetch_array($sql);
				?>
				<div class="data1">	
					<!--DataDiri-->
					<form action="edit-data-diri-proses.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
						<div id="profile">
						<table>
							<tr>
								<td>NIK</td><td> :
								<?php echo $data['nik']; ?></td>
							</tr>

							<td></td>

							<tr>
								<td>Nama</td><td> :
								<input name="nama" placeholder="Masukkan Nama .." type="text" value="<?php echo $data['nama']; ?>"></td>
							</tr>

							<td></td>

							<tr>
								<td>Tempat Tanggal Lahir</td><td> :
								<input name="ttl" placeholder="nama kota, dd-mm-yyyy .." type="text" value="<?php echo $data['ttl']; ?>"></td>
							</tr>

							<td></td>

							<tr>
								<td>Jenis Kelamin</td><td> :
								<select name="j_k">
									<option value="Wanita" selected="selected">Wanita</option>
									<option value="Pria" selected="selected">Pria</option>
								</select>
							</tr>

							<td></td>

							<tr>
								<td>Nomor Telepon</td><td> :
								<input name="nomor_telepon" placeholder="contoh : 0882-1445-3321" type="text" value="<?php echo $data['nomor_telepon']; ?>"></td>
							</tr>

							<td></td>

							<tr>
								<td>Alamat</td><td> :
								<input name="alamat" placeholder="Masukkan Alamat .." type="text" value="<?php echo $data['alamat']; ?>"></td>
							</tr>

							<tr>
								<td>Bagian</td><td> :
								<?php echo $data['bagian']; ?></td>
							</tr>
						</table>
						</div>

						<div class="clear"></div>

						<!--tampilan foto profile-->
						<div id="foto-profile">
								<img src="images/<?php echo $data['foto']; ?>">
							<div id="foto-profile-input">
								<input type="checkbox" value="true" name="ubah_foto"><i>Ceklis, Jika Ingin Mengganti Foto</i><br>
								<input type="file" name="foto">
							</div>
						</div>
						<!--end tampilan foto profile-->
						<input type="submit" value="SIMPAN" class="tombol1">
					</form>
					<!--EndDataDiri-->
				</div>
			
				<!--a href="#" class="tombol">SIMPAN</a-->
				<!--a href="data-diri.html" class="tom">KEMBALI</a-->
				
				<div class="clear"></div>
				<h4></h4>
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