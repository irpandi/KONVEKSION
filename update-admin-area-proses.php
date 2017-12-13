<?php
	include ("koneksi/connection.php"); //koneksi ke database

	$user_id    = $_GET['id']; //membuat variabel user_id sama dengan id url yg diambil dari update-admin-area.php
	$nama       = $_POST['nama']; //membuat variable nama sama dengan name dari nama yg ada di update-admin-area.php
	$alamat     = $_POST['alamat']; //membuat variable alamat sama dengan name dari alamat yg ada di update-admin-area.php
	$telp       = $_POST['nomor_telepon']; //membuat variable telp sama dengan name dari nomor_telepon yg ada di update-admin-area.php
	$max_size   = 1024000; //membuat variabel untuk maximum size dengan format byte.
	$valid_file = true; //membuat vaeiable valid yg bernilai true
	$image_path = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION); //membuat variabel untuk menentuka extensi format file foto
	$extension  = strtolower($image_path); //memasukkan variabel parh ke variabel extension dan di convert ke lowercase
	$file_size  = $_FILES['foto']['size'];  //menentukan ukuran foto
	$ceklis = 1;
	
	if(isset($_POST['ubah_foto'])) //kondisi jika checkbox di ceklis
 	{

		$foto_lama = $_FILES['foto']['name']; //mengambil method post dari update-admin-area.php  yg bernama foto dan name secara default
		$temp = $_FILES['foto']['tmp_name']; //mengambil method post dari update-admin-area.php yg bernama foto dan menyimpan foto sementara
		$foto_baru = date('dmYHis').$foto_lama; //merename foto dengan nama yg baru
		$path = "images/".$foto_baru; //membuat variabel untuk menyimpan foto ke directory images di konveksion folder

		if($file_size > $max_size) //jika ukuran size lebih besar dari maksimum size
		{
			$valid_file = false; //file tidak valid dan bernilai false
			echo "<script>alert('Ukuran Foto terlalu Besar, Maximum 1 MB'); window.location='admin-area(admin).php'; </script>";
		}
		
		else if($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "JPG" && $extension != "JPEG" && $extension != "PNG") //mengecek format file, file harus berformat jpg,png,dan jpeg.
		{
			$valid_file = false; //file tidak valid bernilai false
			echo "<script>alert('Extensi File tidak Mendukung, harus jpg,jpeg, dan png'); window.location='admin-area(admin).php'; </script>";
		}
		
		else if(move_uploaded_file($temp, $path)) //kondisi jika file di move ke variable path dan tmp kemudian disimpan ke database
		{
			//query
			$mysqli_query = mysqli_query($connect, "SELECT * FROM tbl_admin WHERE id_admin='$user_id'");
			$data = mysqli_fetch_array($mysqli_query);


			if(is_file("images/".$data['foto'])) //jika file foto masih ada yg lama akan dihapus dan di ganti dengan yg baru
			{
				unlink("images/".$data['foto']); //penghapusan file foto di directory images di folder konveksion
			}
			
			//query
			$query = mysqli_query($connect, "UPDATE tbl_admin SET nama='$nama',foto='$foto_baru', alamat='$alamat', nomor_telepon='$telp'WHERE id_admin = '$user_id'");
			if($query) //jika query berhasil
			{
				echo "<script>alert('Data Berhasil diUpdate'); window.location='admin-area(admin).php'; </script>";
			}
			
			else //jika query gagal
			{
				echo "<script>alert('Data Gagal diUpdate'); window.location='admin-area(admin).php'; </script>";
			}
		}	
		
	}

	else //jika kondisi diatas tidak dieksekusi maka kondisi ini dijalankan
	{
		$query = mysqli_query($connect, "UPDATE tbl_admin SET nama='$nama', alamat='$alamat', nomor_telepon='$telp' WHERE id_admin = '$user_id'");
				
		if($query)
		{
			echo "<script>alert('Data Berhasil diUpdate'); window.location='admin-area(admin).php'; </script>";
		}
		
		else
		{
			echo "<script>alert('Data gagal di Update'); window.location='admin-area(admin).php'; </script>";
		}
	}
?>