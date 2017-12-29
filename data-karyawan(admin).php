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
		<link rel="stylesheet" type="text/css" href="assets/css/responsee.css">
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
					<li><a href="home-admin.php">Home<span> | </span></a></li>
					<li><a href="data-karyawan(admin).php">Data Karyawan<span> | </span></a></li>
					<li><a href="data-gaji-karyawan(admin).php">Data Gaji Karyawan<span> | </span></a></li>
					<li><a href="riwayat-penggajian(admin).php">Riwayat Penggajian<span> | </span></a></li>
					<li><a href="admin-area(admin).php">Admin Area</a></li>
				<ul>
				
				<div class="logout-btn">
					<a href="logout.php" class="btn">LOGOUT</a>
				</div>
				<!--Pemanggilan username dari session melalui login.php-->
				<p><?php
					echo $_SESSION['username'];
					?></p>
			</nav>
			<!--End Navbar-->
			
			<!--Content-->
			<div class="konten">
				<h2>Data Karyawan</h2>
				<div class="tab">
				<form action="" method="GET">	
					<input type="text" placeholder="Nama Karyawan" name="search">

					<input type="submit" value="CARI" class="search">
				</form>
				</div>

				<div class="clear"></div>

				<?php
					//koneksi database
					include ("koneksi/connection.php");
					
					//mengambil url dari form searching
					$s = $_GET['search'];

					//query
					$tampilkan = mysqli_query($connect, "SELECT id_karyawan,username,password,nik,nama,foto,ttl,jenis_kelamin,nomor_telepon,alamat,bagian FROM tbl_data WHERE nama LIKE '%$s%' ORDER BY nama");

					$ketemu = mysqli_num_rows($tampilkan);

					//menampilkan jumlah data
					$sql = "SELECT * FROM tbl_data";
					$query = mysqli_query($connect, $sql);
					$result = mysqli_num_rows($query);

					echo "<div id='tes'>";
					echo "Jumlah Data : $result";
					echo "</div>";
					//end tampilan jumlah data
					
					//tampilan table bagian atas dan sekaligus untuk bagian search nana, jika data ada maka akan tampil dengan isinya
					if($ketemu > 0){
						$i = 0;
						echo "<center><table width=1300 border=3>
							  <tr bgcolor=lightblue>
							  <td>Nik</td>
							  <td>Nama Karyawan</td>
							  <td width=110>Foto</td>
							  <td>Tempat Tanggal Lahir</td>
							  <td>Jenis Kelamin</td>
							  <td width=120>Nomor Telepon</td>
							  <td>Alamat</td>
							  <td>Bagian</td>
							  <td>Opsi</td>
							  </tr>
							  </center>";
					//end tampilan table bagian atas		  

					//pengulangan untuk isi table
						while($var = mysqli_fetch_array($tampilkan)){
							$i++;

						?>
							<tr>
								<center>
									<td><?php echo $var['nik']; ?></td>
									<td><?php echo $var['nama']; ?></td>
									<td><img src="images/<?php echo $var['foto']; ?>" style="margin-top:10px;width:100px; height:100px;"></td>
									<td><?php echo $var['ttl']; ?></td>
									<td><?php echo $var['jenis_kelamin']; ?></td>
									<td><?php echo $var['nomor_telepon']; ?></td>
									<td><?php echo $var['alamat']; ?></td>
									<td><?php echo $var['bagian']; ?></td>
									<td><a href="delete_data_karyawan(admin).php?id=<?php echo $var['id_karyawan']; ?>" class="tom"><b>Delete</b></a></td>
								</center>
							</tr>	 
							<?php
						}
					//end pengulangan	
					//jika data yg di search tidak ada maka akan tampil else di bawah ini	
					}else{
						echo "<div align='center'><b>Data $s tidak ditemukan</b></div>";
					}
					echo "</table>";
				?>

				<h4></h4>
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