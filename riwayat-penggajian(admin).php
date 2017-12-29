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
		<link rel="stylesheet" type="text/css" href="assets/css/style3.css">
		<link rel="stylesheet" type="text/css" href="assets/css/responsee-riwayat.css">
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
				<!--audio autoplay="true" loop="true">
					<source src="music/Ed Sheeran - Shape Of You.mp3" type="audio/mpeg">
				</audio-->
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
				<p><?php
					echo $_SESSION['username'];
					?></p>
			</nav>
			<!--End Navbar-->
			
			<!--Content-->
			<div class="konten">
				<h2>Riwayat Penggajian</h2>
				<div class="tab">
				<form action="" method="GET">	
					<input type="text" placeholder="Nama Karyawan" name="search">
					<input type="submit" value="CARI" class="search">
				</form>
				</div>

				<div class="clear"></div>

				<?php
					//koneksi ke database
					include ("koneksi/connection.php");
					
					//mengambil url dari serch
					$s = $_GET['search'];

					$batas = 5;
					$halaman = $_GET['halaman'];
					if(empty($halaman)){
						$posisi = 0;
						$halaman = 1;
					}else{
						$posisi = ($halaman-1)*$batas;
					}

					//query yg menggabungkan dari 2 table yaitu tbl_data dan tbl_riwayat, nama dan bagian diambil dari tbl_data, sedangkan sisanya diambil dari tbl_riwayat
					$tampilkan = mysqli_query($connect, "SELECT * FROM tbl_data INNER JOIN tbl_riwayat  ON tbl_data.id_karyawan = tbl_riwayat.id_karyawan WHERE nama LIKE '%$s%' ORDER BY nama LIMIT $posisi, $batas");


					$ketemu = mysqli_num_rows($tampilkan);

					//menampilkan jumlah data
					$sql = "SELECT * FROM tbl_riwayat";
					$query = mysqli_query($connect, $sql);
					$result = mysqli_num_rows($query);

					echo "<div id='tes'>";
					echo "Jumlah Data : $result";
					echo "</div>";
					//end menampilkan jumlah data
					?>

					<?php
					//jika data ditemukan pada di search maka akan muncul, dan ini punu sekaligus untuk menampilkan bagian atas tabel
					if($ketemu > 0){
						$i = $posisi+0;
						echo "<center><table border=2px solid black>
							  <tr bgcolor=lightblue>
							  <td>No</td>
							  <td width=100>Nama Karyawan</td>
							  <td>Bagian</td>
							  <td>Tanggal dan Waktu</td>
							  <td>Uang Makan (Rp)</td>
							  <td>Bonus (Rp)</td>
							  <td>Kasbon (Rp)</td>
							  <td>Banyaknya 1</td>
							  <td>Banyaknya 2</td>
							  <td>Banyaknya 3</td>
							  <td>Nama Barang 1</td>
							  <td>Nama Barang 2</td>
							  <td>Nama Barang 3</td>
							  <td>Harga 1 (Rp)</td>
							  <td>Harga 2 (Rp)</td>
							  <td>Harga 3 (Rp)</td>
							  <td>Jumlah 1</td>
							  <td>Jumlah 2</td>
							  <td>Jumlah 3</td>
							  <td>Gaji (Rp)</td>
							  <td>Jumlah Total</td>
							  <td>Gaji Total (Rp)</td>
							  <td>Opsi</td>
							  </tr>
							  </center>";

						//pengulangan isi dari table yg diambil dari database
						while($var = mysqli_fetch_array($tampilkan)){
							$i++;

						?>
							<tr>
								<center>
									<td><?php echo $i; ?> </td>
									<td><?php echo $var['nama']; ?></td>
									<td><?php echo $var['bagian']; ?></td>
									<td><?php echo $var['tanggal']; ?></td>
									<td><?php echo number_format($var['uang_makan']); ?></td>
									<td><?php echo number_format($var['bonus']); ?></td>
									<td><?php echo number_format($var['kasbon']); ?></td>
									<td><?php echo $var['banyak_1']?></td>
									<td><?php echo $var['banyak_2']; ?></td>
									<td><?php echo $var['banyak_3']; ?></td>
									<td><?php echo $var['nama_barang_1']; ?></td>
									<td><?php echo $var['nama_barang_2']; ?></td>
									<td><?php echo $var['nama_barang_3']; ?></td>
									<td><?php echo number_format($var['harga_1']); ?></td>
									<td><?php echo number_format($var['harga_2']); ?></td>
									<td><?php echo number_format($var['harga_3']); ?></td>
									<td><?php echo number_format($var['jumlah_1']); ?></td>
									<td><?php echo number_format($var['jumlah_2']); ?></td>
									<td><?php echo number_format($var['jumlah_3']); ?></td>
									<td><?php echo number_format($var['gaji']); ?></td>
									<td><?php echo number_format($var['jumlah_total']); ?></td>
									<td><?php echo number_format($var['gaji_total']); ?></td>
									<td><a style="margin-top:20px;" href="delete_riwayat_gaji_karyawan.php?id=<?php echo $var['id_riwayat']; ?>" class="tom"><b>Delete</b></a>
									</td>
								</center>
							</tr>	 

							<?php 
						}
					//jika data tidak ditemukan pada saat di search maka akan muncul else
					}else{
						echo "<div align='center'><b>Data $s tidak ditemukan</b></div>";
					}
					echo "</table>";

					$mysql_query = mysqli_query($connect, "SELECT * FROM tbl_data INNER JOIN tbl_riwayat  ON tbl_data.id_karyawan = tbl_riwayat.id_karyawan");
					$jmlhdata = mysqli_num_rows($mysql_query);
					$jmlhalaman = ceil($jmlhdata/$batas);

					echo "<br> Halaman : ";

					for($x=1; $x<=$jmlhalaman; $x++)
						if($x != $halaman){
							echo "<a href ='riwayat-penggajian(admin).php?halaman=$x'>$x</a>";
						}else{
							echo "<b>$x</b>";
						}
				?>
				
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