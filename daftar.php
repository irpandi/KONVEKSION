<?php
	error_reporting("E_ALL ^ E_NOTICE");
	
	include ("koneksi/connection.php"); //connection to database;


	$username      = $_POST['username']; 			//mengambil method post dari register.html yg bernama username
	$password      = $_POST['password']; 			//mengambil method post dari register.html yg bernama password
	$rubah		   = md5($password); //rubah ke md5 untuk passwordnya
	$nik           = $_POST['nik'];		 			//mengambil method post dari register.html yg bernama nik
	$nama          = $_POST['nama'];	 			//mengambil method post dari register.html yg bernama nama
	$ttl           = $_POST['ttl'];	     			//mengambil method post dari register.html yg bernama ttl
	$j_k           = $_POST['j_k'];					//mengambil method post dari register.html yg bernama j_k
	$nomor_telepon = $_POST['nomor_telepon'];		//mengambil method post dari register.html yg bernama nomor_telepon
	$alamat        = $_POST['alamat'];				//mengambil method post dari register.html yg bernama alamat
	$bagian        = $_POST['bagian'];				//mengambil method post dari register.html yg bernama bagian
	$foto		   = $_FILES['foto']['name'];		//mengambil method post dari register.html yg bernama foto dan name secara default
	$tmp 		   = $_FILES['foto']['tmp_name'];	//mengambil method post dari register.htmk yg bernama foto dan menyimpan foto sementara	
	$max_size	   = 1024000;						//maximum size = 1 MB dalam byte
	$valid_file	   = true;							//menentukan file yg valid untuk di masukkan ke database
	$image_path	   = pathinfo($_FILES['foto']['name'], PATHINFO_EXTENSION);		//membuat variabel untuk menentukan extensi format file foto
	$extension 	   = strtolower($image_path);	//memasukan variabel path ke variabel extension dan di convert ke lowercase
	$fotobaru 	   = date('dmYHis').$foto;	//merename namafile foto dengan yg baru
	$path		   = "images/".$fotobaru;	//memasukkan variabel fotobaru ke variabel path dan disimpan ke folder images di folder konveksion.

	// query sql untuk menampilkan dan memasukkannya ke variabel cek
	$cek = mysqli_query($connect, "SELECT user,username,password,nik,nama,foto,ttl,jenis_kelamin,nomor_telepon,alamat,bagian FROM tbl_data WHERE username = '$username'");
	$ketauan = mysqli_num_rows($cek);
	$x = mysqli_fetch_array($cek);

	//pengecekan username jika ada usernmae yg sama
	if($ketauan > 0){
		echo "<script>alert('Username sudah ada yg pakai, silahkan diganti dan ulangi pengisian data'); window.location = 'register.html';</script>";
	}else if(!$username || !$password){ 	//pengecekan username dan password jika kosong
		echo "<script>alert('username/password masih kosong, silahkan Ulangi pengisian data'); window.location = 'register.html';</script>";
	}else if(empty($nik)){					//pengecekan nik jika kosong
		echo "<script>alert('NIK masih kosong, silahkan Ulangi pengisian data'); window.location = 'register.html';</script>";
	}else if(empty($nama)){
		echo "<script>alert('nama masih kosong, silahkan Ulangi pengisian data'); window.location = 'register.html';</script>";
	}else if(empty($ttl)){
		echo "<script>alert('Tempat tanggal lahir masih kosong, silahkan Ulangi pengisian data'); window.location = 'register.html';</script>";
	}else if(empty($j_k)){
		echo "<script>alert('jenis kelamin masih kosong, silahkan Ulangi pengisian data'); window.location = 'register.html';</script>";
	}else if(empty($nomor_telepon)){
		echo "<script>alert('nomor telepon masih kosong, silahkan Ulangi'); window.location = 'register.html';</script>";
	}else if(empty($alamat)){
		echo "<script>alert('alamat masih kosong, silahkan Ulangi pengisian data'); window.location = 'register.html';</script>";
	}else if(empty($bagian)){
		echo "<script>alert('bagian masih kosong, silahkan Ulangi pengisian data'); window.location = 'register.html';</script>";
	}else if($_FILES['foto']['size'] > $max_size){		//kondisi jika files foto lebih besar dari 1 MB
		$valid_file = false;
		echo "<script>alert('foto anda melebihi maximum size, silahkan ulangi pengisian data'); window.location = 'register.html'; </script>";
	}else if($extension != "jpg" && $extension != "jpeg" && $extension != "png" && $extension != "JPG" && $extension != "JPEG" && $extension != "PNG"){		//kondisi jika format file tidak jpg, jpeg, atau png
		$valid_file = false;
		echo "<script>alert('Format File Foto anda tidak diizinkan format file harus jpg, jpeg, atau png dan silahkan ulangi pengisian data'); window.location = 'register.html'; </script>";
	}else{

		if(move_uploaded_file($tmp, $path)){	//kondisi jika file di move ke variable path dan tmp kemudian disimpan ke database
		$daftar = mysqli_query($connect, "INSERT INTO tbl_data (username,password,nik,nama,foto,ttl,jenis_kelamin,nomor_telepon,alamat,bagian) VALUES ('$username','$rubah','$nik','$nama','$fotobaru','$ttl','$j_k','$nomor_telepon','$alamat','$bagian')");

			if($daftar){ //jika semua telah diisi maka akan kembali ke index.html
				echo "<script>alert('Berhasil Daftar'); window.location = 'index.html'; </script>";
			}

		}

		else{ //jika gagal
			echo "<script>alert('Gagal Daftar'); window.location = 'register.html'; </script>";
		}
	}
?>