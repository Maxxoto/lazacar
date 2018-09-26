<?php

include "../../koneksi.php";

extract($_POST);
extract($_FILES); 

$sumber = $_FILES['gambar']['tmp_name'];
$target = '../../img/mobil/' ;
$nama_gambar = $_FILES['gambar']['name'];

$query = mysql_query ('INSERT INTO tb_mobil (id_mobil,nm_mobil,spek_mobil,harga_mobil,gambar) VALUES
											("'.$id_mobil.'","'.$nm_mobil.'","'.$spek_mobil.'","'.$harga_mobil.'",
											 "'.$nama_gambar.'") ');
if ($query){
	$movefile = move_uploaded_file($sumber, $target.$nama_gambar);
	if($movefile){
	echo "<script> alert('Data berhasil disimpan dan Gambar berhasil diupload');
		  document.location.href='index.php' </script>" ;
	}else{
	echo "<script> alert('Gambar gagal diupload !');
		  document.location.href='tambah_datamobil.php' </script>";	
	}
}else{
	echo "<script> alert('Data gagal disimpan dan Gambar gagal diupload');
		  document.location.href='tambah_datamobil.php' </script>";
}

