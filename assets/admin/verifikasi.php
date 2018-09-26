<?php
include '../../koneksi.php';
session_start();

$id_beli = $_GET['id'];
$status_verifikasi = 1;
$id_admin = $_SESSION['id_user'];


$cek = mysql_query("SELECT * from tb_cash where id_beli = '$id_beli' ");
$sql = mysql_fetch_array($cek);


if($sql['status_verifikasi'] != "1"){
	$query = mysql_query("UPDATE tb_cash set status_verifikasi = '$status_verifikasi',
											 id_admin = '$id_admin' 
											 where id_beli = '$id_beli'
											 ");
	if($query){
		echo "<script> alert('Data berhasil diverifikasi') ;
		document.location.href='datapaket.php' </script>";	
	}else
		echo "<script> alert('Data gagal diverifikasi') ;
		document.location.href='datapaket.php' </script>";
}else{
	echo "<script> alert('Data sudah diverifikasi') ;
	document.location.href='datapaket.php' </script>";
}

?>