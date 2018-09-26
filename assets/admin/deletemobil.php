<?php

include '../../koneksi.php';

$id_mobil = $_GET['id'];

$query = mysql_query("DELETE FROM tb_mobil where id_mobil = '$id_mobil'") ;

if ($query) {
	echo "<script> alert('Data berhasil dihapus !'); 
		  document.location.href = 'datamobil.php' </script>" ;
}else{
	echo "<script> alert('Data gagal dihapus !'); 
		  document.location.href = 'datamobil.php' </script>" ;
}


?>