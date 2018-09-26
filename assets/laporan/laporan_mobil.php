<?php
include '../../koneksi.php';
require ('fpdf/fpdf.php');

$hasil = mysql_query("SELECT * from tb_mobil order by id_mobil asc") or die (mysql_error());

$kolom_idmobil = "";
$kolom_namamobil = "";
$kolom_hargamobil = "";


while($row = mysql_fetch_array($hasil)){

$idmobil = $row['id_mobil'];
$namamobil = $row['nm_mobil'];
$hargamobil = $row['harga_mobil'];


$kolom_idmobil = $kolom_idmobil.$idmobil."\n";
$kolom_namamobil = $kolom_namamobil.$namamobil."\n";
$kolom_hargamobil = $kolom_hargamobil.'Rp.'.number_format($hargamobil)."\n";


//MEMBUAT PDF
$pdf = new FPDF('P','mm',array(210,297));
$pdf->AddPage();

$pdf->SetFont('Times','B',18);
$pdf->Cell(80);
$pdf->Cell(30,10,'CV. Lazacar Car Shop',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','B',13);
$pdf->Cell(80);
$pdf->Cell(30,10,'Ahlinya Jual Mobil , Sparepart , dan Servis kendaraan ',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->Cell(80);
$pdf->Cell(30,5,'Jl.Sawojajar Barat,Malang',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->Cell(80);
$pdf->Cell(30,5,'No Telp : 085-113-532-123 Fax : 1123-4123 email: lazacarid@yahoo.com',0,0,'C');
$pdf->Ln();
$pdf->Line(250,40,0,40);
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(80);
$pdf->Cell(30,10,'Data Mobil',0,0,'C');
$pdf->Ln();


$pdf->Ln();
}
//POSISI FIELD
$Y_Fields_Name_position = 60;

//Membuat setiap Field
$pdf->SetFillColor(110,180,230);

//Huruf Tebal setiap fieldname
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);
$pdf->SetX(60);
$pdf->Cell(25,8,'ID Mobil',1,0,'C',1);
$pdf->SetX(85);
$pdf->Cell(40,8,'Nama Mobil',1,0,'C',1);
$pdf->SetX(125);
$pdf->Cell(35,8,'Harga Mobil',1,0,'C',1);


$pdf->Ln();

//POSISI TABEL
$Y_Table_Position=68;

//SHOW KOLOM
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX(60);
$pdf->MultiCell(25,6,$kolom_idmobil,1,'C');


$pdf->SetY($Y_Table_Position);
$pdf->SetX(85);
$pdf->MultiCell(40,6,$kolom_namamobil,1,'L');

$pdf->SetY($Y_Table_Position);
$pdf->SetX(125);
$pdf->MultiCell(35,6,$kolom_hargamobil,1,'L');


$pdf->Output('','laporan_pelanggan.pdf');
?>