<?php
	include ("koneksi/connection.php"); //koneksi ke database
	require ('C:/xampp/htdocs/KONVEKSION/fpdf16/fpdf.php'); //mengextends file fpdf.php
	date_default_timezone_set('Asia/Jakarta'); //mensetting waktu berdasarkan waktu indonesia jakarta

	$id = $_GET['id']; //mengambil url id di data-gaji-karyawan.php

	//query
	$sql = "SELECT id_karyawan,nama,bagian,gaji_total,jumlah_total FROM tbl_data WHERE id_karyawan = '$id'";
	$query = mysqli_query($connect, $sql);
	$data = mysqli_fetch_array($query);

	$pdf = new FPDF("L","cm","A4"); //menset ukuran kertas

	$pdf->SetMargins(2,1,1); //set margins
	$pdf->AliasNbPages();
	$pdf->AddPage(); //set new page

	//Header
	$pdf->SetFont('Times','B',16);
	$pdf->SetX(1);
	$pdf->MultiCell(5.5,0.4,'CV. KONVEKSION');
	
	$pdf->SetFont('Times','B',20);
	$pdf->SetX(10);
	$pdf->MultiCell(9.5,0.1,'Slip Gaji Karyawan',0,'C');

	$pdf->SetFont('Times','',10);
	$pdf->SetX(24.4);
	$pdf->Cell(5,-0.8,"Tanggal : ".date("D-d/M/Y"));

	$pdf->SetFont('Times','',10);
	$pdf->SetX(1);
	$pdf->MultiCell(8.5,0.7,'Jln Cibuntu Timur Rt 06 Rw 05 No.5 Bandung',0);
	$pdf->SetX(1);
	$pdf->MultiCell(8.5,0.7,'No.Telp : +6281200933421');
	//End Header

	//Content
	$pdf->Line(1,3.1,28.5,3.1);
	$pdf->SetLineWidth(0.1);      
	$pdf->Line(1,3.2,28.5,3.2);   
	$pdf->SetLineWidth(0);
	$pdf->ln(0.5);

	$pdf->SetX(3);
	$pdf->SetFont('Times','',14);
	$pdf->Cell(0,1.7, 'Nama : ');
	$pdf->SetX(5);
	$pdf->Cell(0,1.7, $data['nama']);
	
	$pdf->SetX(3);
	$pdf->SetFont('Times','',14);
	$pdf->Cell(0,3.1, 'Bagian :');
	$pdf->SetX(5);
	$pdf->Cell(0,3.1, $data['bagian']);
	$pdf->ln(3);
	

	$pdf->SetX(3);
	$pdf->SetFont('Times','',12);
	$pdf->Cell(5,0.8,'Banyaknya',1,0,'C');
	$pdf->Cell(8,0.8,'Nama Barang',1,0,'C');
	$pdf->Cell(5,0.8,'Harga',1,0,'C');
	$pdf->Cell(5,0.8,'Jumlah',1,0,'C');
	$pdf->ln(0.8);

	$haha = mysqli_query($connect, "SELECT id_karyawan,nama,bagian,gaji_total,banyak_1,banyak_2,banyak_3,nama_barang_1,nama_barang_2,nama_barang_3,harga_1,harga_2,harga_3,jumlah_1,jumlah_2,jumlah_3,jumlah_total FROM tbl_data WHERE id_karyawan = '$id'");

	while($var = mysqli_fetch_assoc($haha)){
		$pdf->SetX(3);
		$pdf->Cell(5,0.8,$var['banyak_1'],1,0,'C');
		$pdf->Cell(8,0.8,$var['nama_barang_1'],1,0,'C');
		$pdf->Cell(5,0.8,$var['harga_1'],1,0,'C');
		$pdf->Cell(5,0.8,$var['jumlah_1'],1,0,'C');
		$pdf->ln(0.81);

		$pdf->SetX(3);
		$pdf->Cell(5,0.8,$var['banyak_2'],1,0,'C');
		$pdf->Cell(8,0.8,$var['nama_barang_2'],1,0,'C');
		$pdf->Cell(5,0.8,$var['harga_2'],1,0,'C');
		$pdf->Cell(5,0.8,$var['jumlah_2'],1,0,'C');
		$pdf->ln(0.8);

		$pdf->SetX(3);
		$pdf->Cell(5,0.8,$var['banyak_3'],1,0,'C');
		$pdf->Cell(8,0.8,$var['nama_barang_3'],1,0,'C');
		$pdf->Cell(5,0.8,$var['harga_3'],1,0,'C');
		$pdf->Cell(5,0.8,$var['jumlah_3'],1,0,'C');
		$pdf->ln(0.8);
	}

	$pdf->SetX(16);
	$pdf->Cell(5,0.8,'Jumlah Total',1,0,'C');
	$pdf->Cell(5,0.8,$data['jumlah_total'],1,0,'C');
	$pdf->ln(0.8);
	$pdf->SetX(16);
	$pdf->Cell(5,0.8,'Gaji Total',1,0,'C');
	$pdf->Cell(5,0.8,$data['gaji_total'],1,0,'C');
	//end Content

	//Footer
	$pdf->ln(2);
	$pdf->SetX(21);
	$pdf->Cell(0,1.5,'CEO CV. KONVEKSION');
	$pdf->SetX(21.4);
	$pdf->Cell(0,6.5,'Septya Eghu Pratama');
	//end Footer

	$pdf->Output();

?>