<?php

include '../../koneksi.php' ;
extract($_POST);

// VARIABEL TETAP 
if($paket_kredit = 12){
	$bunga = 5/100;
}else{
	$bunga = 10/100;
}


$harga_sebelumbunga = ($harga_mobil - $uang_muka) / $paket_kredit;
$harga_setelahbunga = $harga_sebelumbunga * $bunga;

$harga_cicilan = $harga_sebelumbunga + $harga_setelahbunga ;
$bulan = 0 ;



$query = mysql_query('INSERT into tb_cicilan 
		 (id_beli,id_pembeli,nama_pembeli,paket_kredit,bulan,harga_cicilan,id_mobil,nama_mobil,harga_mobil) VALUES 
		 ("'.$id_beli.'","'.$id_pembeli.'","'.$nama_pembeli.'","'.$paket_kredit.'","'.$bulan.'","'.$harga_cicilan.'","'.$id_mobil.'","'.$nama_mobil.'","'.$harga_mobil.'") ');
$data = mysql_fetch_array($query);

if($query){
	echo "<script> alert('Pembelian berhasil !') ;
	document.location.href='transaksi.php'</script>";

}else{
	echo "<script> alert('Pembelian gagal !') ;
	document.location.href='jb_mobil.php'</script>";

}
?>