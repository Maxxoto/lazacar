<?php
include '../../koneksi.php';
require ('fpdf/fpdf.php');

$hasil = mysql_query("SELECT * from tb_pembeli order by id_beli asc") or die (mysql_error());
$kolom_idbeli = "";
$kolom_idpembeli = "";
$kolom_namapembeli = "";
$kolom_tglbeli = "";
$kolom_hargamobil = "";
$kolom_idmobil = "";
$kolom_namamobil = "";


while($row = mysql_fetch_array($hasil)){

$idbeli = $row['id_beli'];
$idpembeli = $row['id_pembeli'];
$namapembeli = $row['nama_pembeli'];
$tglbeli = $row['tgl_beli'];
$hargamobil = $row['harga_mobil'];
$idmobil = $row['id_mobil'];
$namamobil = $row['nama_mobil'];




$kolom_idbeli = $kolom_idbeli.$idbeli."\n";
$kolom_idpembeli = $kolom_idpembeli.$idpembeli."\n";
$kolom_namapembeli = $kolom_namapembeli.$namapembeli."\n";
$kolom_tglbeli = $kolom_tglbeli.$tglbeli."\n";
$kolom_hargamobil = $kolom_hargamobil."Rp.".number_format($hargamobil)."\n";
$kolom_idmobil = $kolom_idmobil.$idmobil."\n";
$kolom_namamobil = $kolom_namamobil.$namamobil."\n";




//MEMBUAT PDF
$pdf = new FPDF('L','mm','A4');
$pdf->AddPage();

$pdf->SetFont('Times','B',18);
$pdf->Cell(130);
$pdf->Cell(30,5,'CV. Lazacar Car Shop',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','B',13);
$pdf->Cell(130);
$pdf->Cell(30,10,'Ahlinya Jual Mobil , Sparepart , dan Servis kendaraan ',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->Cell(130);
$pdf->Cell(30,5,'Jl.Sawojajar Barat,Malang',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Times','',11);
$pdf->Cell(130);
$pdf->Cell(30,5,'No Telp : 085-113-532-123 Fax : 1123-4123 email: lazacarid@yahoo.com',0,0,'C');
$pdf->Ln();
$pdf->Line(350,40,0,40);
$pdf->Ln();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(130);
$pdf->Cell(30,10,'TANDA BUKTI PEMBELIAN CASH',0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial','',12);
$pdf->Cell(130);
$pdf->Cell(30,10,'Kode Pengambilan Mobil',0,0,'C');
$pdf->Ln();
}
//POSISI FIELD
$Y_Fields_Name_position = 70;


$PosisiIDBeli = 10 ;
$PosisiIDPembeli = 45;
$PosisiIDNamaPembeli = 90;
$PosisiTglBeli = 125;
$PosisiHargaMobil = 155;
$PosisiIDMobil = 200;
$PosisiNamaMobil =  245;

//Membuat setiap Field
$pdf->SetFillColor(110,180,230);

//Huruf Tebal setiap fieldname
$pdf->SetFont('Arial','B',10);
$pdf->SetY($Y_Fields_Name_position);

$pdf->SetX($PosisiIDBeli);
$pdf->Cell(35,8,'ID BELI',1,0,'C',1);
$pdf->SetX($PosisiIDPembeli);
$pdf->Cell(45,8,'ID PEMBELI',1,0,'C',1);
$pdf->SetX($PosisiIDNamaPembeli);
$pdf->Cell(35,8,'NAMA PEMBELI',1,0,'C',1);
$pdf->SetX($PosisiTglBeli);
$pdf->Cell(30,8,'TGL BELI',1,0,'C',1);
$pdf->SetX($PosisiHargaMobil);
$pdf->Cell(45,8,'HARGA MOBIL',1,0,'C',1);
$pdf->SetX($PosisiIDMobil);
$pdf->Cell(45,8,'ID MOBIL',1,0,'C',1);
$pdf->SetX($PosisiNamaMobil);
$pdf->Cell(45,8,'NAMA MOBIL',1,0,'C',1);

$pdf->Ln();

//POSISI TABEL
$Y_Table_Position=78;

//SHOW KOLOM
$pdf->SetFont('Arial','',10);

$pdf->SetY($Y_Table_Position);
$pdf->SetX($PosisiIDBeli);
$pdf->MultiCell(35,6,$kolom_idbeli,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX($PosisiIDPembeli);
$pdf->MultiCell(45,6,$kolom_idpembeli,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX($PosisiIDNamaPembeli);
$pdf->MultiCell(35,6,$kolom_namapembeli,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX($PosisiTglBeli);
$pdf->MultiCell(30,6,$kolom_tglbeli,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX($PosisiHargaMobil);
$pdf->MultiCell(45,6,$kolom_hargamobil,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX($PosisiIDMobil);
$pdf->MultiCell(45,6,$kolom_idmobil,1,'C');
$pdf->SetY($Y_Table_Position);
$pdf->SetX($PosisiNamaMobil);
$pdf->MultiCell(45,6,$kolom_namamobil,1,'C');



$pdf->Output('','cetak_buktipembelian.pdf');
?>