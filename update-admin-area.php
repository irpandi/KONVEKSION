<?php
//menyimpan data sementara di session
session_start();

//jika session kosong maka akan kembali ke index.html
if(empty($_SESSION['username'])){
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
				<h2>Update Data Admin</h2>
				<?php
					//koneksi ke database
					include ("koneksi/connection.php");

					//mengambil url id di admin-area(admin).php
					$id = $_GET['id'];

					//query
					$sql = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE id_admin = '$id'");
					$data = mysqli_fetch_array($sql);
				?>
				<div class="data1">	
					<!--DataAdmin-->
					<!--Action yg berisi url untuk id-->
					<form action="update-admin-area-proses.php?id=<?php echo $id; ?>" method="POST" enctype="multipart/form-data">
						<div id="profile">
						<table>
							<tr>
								<td>Nama</td><td> :
								<input name="nama" placeholder="Masukkan Nama .." type="text" value="<?php echo $data['nama']; ?>"></td>
							</tr>

							<td></td>

							<tr>
								<td>Alamat</td><td> :
								<input name="alamat" placeholder="Masukkan Alamat .." type="text" value="<?php echo $data['alamat']; ?>"></td>
							</tr>

							<td></td>

							<tr>
								<td>Nomor Telepon</td><td> :
								<input name="nomor_telepon" placeholder="Masukkan No.Telp .." type="text" value="<?php echo $data['nomor_telepon']; ?>"></td>
							</tr>
						</table>
						</div>

						<div class="clear"></div>

						<div id="foto-profile">
								<img src="images/<?php echo $data['foto']; ?>">
							<div id="foto-profile-input-admin">
								<input type="checkbox" value="true" name="ubah_foto"><i>Ceklis, Jika Ingin Mengganti Foto</i><br>
								<input type="file" name="foto">
							</div>
						</div>
						<input type="submit" value="SIMPAN" class="tombol1">
					</form>
					<!--End Data Admin-->
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
					<h3>Jangan ragu, tunggu apa lagi??</h3>
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