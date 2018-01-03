<?php
	class UnitTesting{
		public function select(){
			include ("koneksi/connection.php");
			$sql = "SELECT * FROM tbl_data";
			$query = mysqli_query($connect,$sql);

			if($query){
				return false;
			}else{
				return true;
			}
		}

		public function delete_data($id){
			include ("koneksi/connection.php");
			$sql = "DELETE FROM tbl_riwayat WHERE id_karyawan = '$id'";
			$query = mysqli_query($connect, $sql);

			if($query){
				return false;
			}else{ 
				return true;
			}
		}
	}
?>