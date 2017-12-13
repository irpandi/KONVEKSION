<?php
	class UnitTesting{
		public function select(){
			include "../koneksi/connection.php";
			$sql = "SELECT * FROM tbl_data";
			$query = mysqli_query($connect,$sql);

			if($query)
				return true;
			else
				return false;
		}

		public function delete_data($id){

		include ("../koneksi/connection.php");

		$query = mysqli_query($connect, "DELETE FROM tbl_riwayat WHERE id_karyawan = '$id'");

			if($query){ //jika query berhasil
				return true;
				//echo "<script>alert('Data sudah dihapus'); window.location = 'riwayat-penggajian(admin).php'; </script>";
			}else{ //jika query gagal
				return false;
				//echo "<script>alert('Data gagal dihapus'); window.location = 'riwayat-penggajian(admin).php'; </script>";
			}
		}
	}
?>