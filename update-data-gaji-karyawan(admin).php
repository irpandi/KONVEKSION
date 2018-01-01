<?php
//menghalangi error reporting dari website
error_reporting("E_ALL ^ E_NOTICE");

//menyimpan data sementara di session pada saat login
session_start();

//jika session kosong maka akan kembali ke index.html artinya jika tidak login terlebih dahulu maka akan kembali ke index.html.
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
			
			<!--Navbar-->
			<div class="clear"></div>
			<nav>
				<ul>
					<li><a href="home-admin.html">Home<span> | </span></a></li>
					<li><a href="data-karyawan(admin).php">Data Karyawan<span> | </span></a></li>
					<li><a href="data-gaji-karyawan(admin).php">Data Gaji Karyawan<span> | </span></a></li>
					<li><a href="riwayat-penggajian(admin).php">Riwayat Penggajian<span> | </span></a></li>
					<li><a href="admin-area(admin).php">Admin Area</a></li>
				<ul>
				
				<div class="logout-btn">
					<a href="logout.php" class="btn">LOGOUT</a>
				</div>
				<p><?php
					echo $_SESSION['username'];
					?></p>
			</nav>
			<!--End Navbar-->
			
			<!--Content-->
			<?php
				//koneksi ke database
				include ("koneksi/connection.php");

				//mengambil url dari data-gaji-karyawan(admin).php
				$id = $_GET['id'];

				//query
				$query = mysqli_query ($connect, "SELECT id_karyawan,nama,bagian,uang_makan,bonus,kasbon,gaji,gaji_total,banyak_1,banyak_2,banyak_3,nama_barang_1,nama_barang_2,nama_barang_3,harga_1,harga_2,harga_3,jumlah_1,jumlah_2,jumlah_3,jumlah_total FROM tbl_data WHERE id_karyawan = '$id'");
				$data = mysqli_fetch_array($query);
			?>
			<div class="konten">
				<h2>Update Data Gaji</h2>
				<div class="data1">
					<!--isi dari yang akan di edit dan ditampilkan di form-->
					<form action="update-proses-gaji(admin).php" method="POST">
						<!--Mengambil id dengan POST dan typenya di hidden/tidak ditampilkan-->
						<input name="id" type="hidden" value="<?php echo $data['id_karyawan']; ?>">
						<table>
							<tr>
								<td>Nama Karyawan</td><td> :
								<?php echo $data['nama']; ?>
							</tr>

							<tr>
								<td>Bagian</td><td> :
								<?php echo $data['bagian']; ?>
							</tr>

							<tr>
								<td>Uang Makan</td><td> :
								<input name="uang_makan" placeholder = "Masukkan Uang Makan .." type="text" value = "<?php echo $data['uang_makan']; ?>"></td>
							</tr>

							<tr>
								<td>Bonus</td><td> :
								<input name="bonus" placeholder = "Masukkan Bonus .." type="text" value = "<?php echo $data['bonus']; ?>"></td>
							</tr>

							<tr>
								<td>Kasbon</td><td> :
								<input name="kasbon" placeholder = "Masukkan Kasbon .." type="text" value = "<?php echo $data['kasbon']; ?>"></td>
							</tr>


							<tr>
								<td>Banyak 1</td><td> :
								<input name="banyak1" placeholder = "Masukkan Banyak 1 .." type="text" value = "<?php echo $data['banyak_1']; ?>"></td>
							</tr>

							<tr>
								<td>Banyak 2</td><td> :
								<input name="banyak2" placeholder = "Masukkan Banyak 2 .." type="text" value = "<?php echo $data['banyak_2']; ?>"></td>
							</tr>

							<tr>
								<td>Banyak 3</td><td> :
								<input name="banyak3" placeholder = "Masukkan Banyak 3 .." type="text" value = "<?php echo $data['banyak_3']; ?>"></td>
							</tr>

							<tr>
								<td>Nama Barang 1</td><td> :
								<input name="namabarang1" placeholder = "Masukkan Nama Barang 1 .." type="text" value = "<?php echo $data['nama_barang_1']; ?>"></td>
							</tr>

							<tr>
								<td>Nama Barang 2</td><td> :
								<input name="namabarang2" placeholder = "Masukkan Nama Barang 2 .." type="text" value = "<?php echo $data['nama_barang_2']; ?>"></td>
							</tr>

							<tr>
								<td>Nama Barang 3</td><td> :
								<input name="namabarang3" placeholder = "Masukkan Nama Barang 3 .." type="text" value = "<?php echo $data['nama_barang_3']; ?>"></td>
							</tr>

							<tr>
								<td>Harga 1</td><td> :
								<input name="harga1" placeholder = "Masukkan Harga 1 .." type="text" value = "<?php echo $data['harga_1']; ?>"></td>
							</tr>

							<tr>
								<td>Harga 2</td><td> :
								<input name="harga2" placeholder = "Masukkan Harga 2 .." type="text" value = "<?php echo $data['harga_2']; ?>"></td>
							</tr>

							<tr>
								<td>Harga 3</td><td> :
								<input name="harga3" placeholder = "Masukkan Harga 3 .." type="text" value = "<?php echo $data['harga_3']; ?>"></td>
							</tr>

							<tr>
								<td>Jumlah 1</td><td> :
								<?php echo $data['jumlah_1']; ?>
							</tr>

							<tr>
								<td>Jumlah 2</td><td> :
								<?php echo $data['jumlah_2']; ?>
							</tr>

							<tr>
								<td>Jumlah 3</td><td> :
								<?php echo $data['jumlah_3']; ?>
							</tr>

							<tr>
								<td>Jumlah Total</td><td> :
								<?php echo $data['jumlah_total']; ?>
							</tr>

							<tr>
								<td>Gaji</td><td> :
								<?php echo $data['gaji']; ?>
							</tr>

							<tr>
								<td>Gaji Total</td><td> :
								<?php echo $data['gaji_total']; ?>
							</tr>
						</table>
				</div>
				<div class="clear"></div>
				<input value = "SIMPAN" type="submit" class="tombol">
				<div class="clear"></div>
				<a href="data-gaji-karyawan(admin).php" class="tom">KEMBALI</a>
				</form>
				
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