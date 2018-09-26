<?php

include "../../koneksi.php";

extract($_POST);
extract($_FILES); 

$sumber = $_FILES['gambar']['tmp_name'];
$target = '../../img/mobil/' ;
$nama_gambar = $_FILES['gambar']['name'];

$query = mysql_query ("UPDATE tb_mobil SET id_mobil = '$id_mobil',
											nm_mobil = '$nm_mobil',
											spek_mobil = '$spek_mobil',
											harga_mobil = '$harga_mobil',
											gambar = '$nama_gambar'
											where id_mobil = '$id_mobil'
											") ;
if ($query){
	$movefile = move_uploaded_file($sumber, $target.$nama_gambar);
	if($movefile){
	echo "<script> alert('Data berhasil disimpan dan Gambar berhasil diupload');
		  document.location.href='datamobil.php' </script>" ;
	}else{
	echo "<script> alert('Gambar gagal diupload !');
		  document.location.href='datamobil.php' </script>";	
	}
}else{
	echo "<script> alert('Data gagal disimpan dan Gambar gagal diupload');
		  document.location.href='datamobil.php' </script>";
}

