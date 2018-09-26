<?php 

include '../../koneksi.php';
$id_beli = $_GET['id'];
$tanggal = date("d/m/y");


$ambildata = mysql_query("SELECT * from tb_cash where id_beli='$id_beli' "); 
$datacash = mysql_fetch_array($ambildata);

$id_pembeli = $datacash['id_pembeli'];
$id_mobil = $datacash['id_mobil'];
$nama_pembeli = $datacash['nama_pembeli'];
$nama_mobil = $datacash['nama_mobil'];
$harga_mobil = $datacash['harga_mobil'];


$cek = mysql_query("SELECT * from tb_pembeli where id_beli = '$id_beli' ");


$row = mysql_num_rows($cek);


if($row < 1){
	$query = mysql_query('INSERT into tb_pembeli (id_beli,id_pembeli,nama_pembeli,tgl_beli,harga_mobil,id_mobil,nama_mobil) VALUES 
		 	 ("'.$id_beli.'","'.$id_pembeli.'","'.$nama_pembeli.'","'.$tanggal.'","'.$harga_mobil.'","'.$id_mobil.'","'.$nama_mobil.'") ');
	if($query){
		echo "<script> alert('Berhasil mengkonfirmasi !') ;
		document.location.href='transaksi.php' </script>";
	}else{
		echo "<script> alert('Gagal mengkonfirmasi !') ;
		document.location.href='transaksi.php' </script>";
	}
	

}else{
	echo "<script> alert('Data sudah tersedia !') ;
	document.location.href='transaksi.php' </script>";
}
?>