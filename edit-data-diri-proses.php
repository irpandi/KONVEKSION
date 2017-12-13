<?php
	include ("koneksi/connection.php"); //koneksi ke database

	$user_id = $_GET['id']; //mengambil url id di edit-data-diri.php

	//mengambil data post di edit-data-diri.php
	$nama = $_POST['nama'];
	$ttl = $_POST['ttl'];
	$jen_k = $_POST['j_k'];
	$telp = $_POST['nomor_telepon'];
	$alamat = $_POST['alamat'];

	$max_size = 1024000; //mensetting maximum size dengan byte
	$valid_file = true; //variabel yg bernilai true
	$image_path = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION); //membuat variabel untuk memnentukan extensi format dile foto
	$extension = strtolower($image_path); //memasukkan variabel path k variabel extension dan di convert ke lowercase
	$file_size = $_FILES['foto']['size'];  //mengatur ukuran foto
 
	if(isset($_POST['ubah_foto'])) //jika kondisi checkbox di ceklis
	{

		//mengambil data post dari edi-data-diri.php
		$foto_lama = $_FILES['foto']['name'];
		$temp = $_FILES['foto']['tmp_name'];

		$foto_baru = date('dmYHis').$foto_lama; //merenanme foto dengan nama baru
		$path = "images/".$foto_baru; //menyimpan foto ke directory images

		if($file_size > $max_size) //jika foto lebih besar dari maximum size
		{	
			$valid_file = false; //kondisi foto false
			echo "<script>alert('Ukuran Foto terlalu Besar, Maximum 1 MB'); window.location='data-diri.php'; </script>";
		}

		else if($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "JPG" && $extension != "JPEG" && $extension != "PNG") //jika extensi foto tidak sama dengan jpg, jpeg, dan png
		{
		
			$valid_file = false; //kondisi foto salah
			echo "<script>alert('Extensi File tidak Mendukung, harus jpg,jpeg, dan png'); window.location='data-diri.php'; </script>";
		}

		else if(move_uploaded_file($temp, $path)) //kondisi jika file di move ke variabel path dan tmp kemudian disimpan ke database
		{
			//query
			$mysqli_query = mysqli_query($connect, "SELECT * FROM tbl_data WHERE id_karyawan='$user_id'");
			$data = mysqli_fetch_array($mysqli_query);

			if(is_file("images/".$data['foto'])) //jika file foto yg lama masih ada maka akan dihapus dan diganti dengan yg baru
			{
				unlink("images/".$data['foto']); //file foto dihapus (lama)
			}
			
			//query
			$query = mysqli_query($connect, "UPDATE tbl_data SET nama='$nama',foto='$foto_baru', ttl='$ttl', jenis_kelamin='$jen_k', nomor_telepon='$telp', alamat='$alamat' WHERE id_karyawan = '$user_id'");
			if($query) //jika query berhasil
			{
				echo "<script>alert('Data Berhasil diUpdate'); window.location='data-diri.php'; </script>";
			}

			else //jika query gagal
			{
				echo "<script>alert('Data Gagal diUpdate'); window.location='data-diri.php'; </script>";
			}
		}	
	}

	else //jika kondisi diatas tidak dieksekusi maka kondisi ini dijalankan
	{ 
		//query
		$query = mysqli_query($connect, "UPDATE tbl_data SET nama='$nama', ttl='$ttl', jenis_kelamin='$jen_k', nomor_telepon='$telp', alamat='$alamat' WHERE id_karyawan = '$user_id'");
				
		if($query) //jika query berhasil
		{
			echo "<script>alert('Data Berhasil diUpdate'); window.location='data-diri.php'; </script>";
		}

		else //jika query gagal
		{
			echo "<script>alert('Data gagal di Update'); window.location='data-diri.php'; </script>";
		}
	}
?>