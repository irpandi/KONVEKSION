<?php
	class UnitTesting{
		public function gaji($bonus, $uang_makan, $kasbon){
			$gaji = $bonus + $uang_makan - $kasbon;
			return $gaji;
		}

		public function gaji_total($uang_makan,$bonus,$kasbon,$banyak1,$banyak2,$banyak3,$harga1,$harga2,$harga3){
			$gaji = $uang_makan + $bonus - $kasbon;
			
			$jumlah1 = $banyak1 * $harga1;
			$jumlah2 = $banyak2 * $harga2;
			$jumlah3 = $banyak3 * $harga3;
			$jumlah_total = $jumlah1 + $jumlah2 + $jumlah3;

			$gaji_total = $gaji + $jumlah_total;
			return $gaji_total;
		}
	}
?>