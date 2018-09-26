<?php

include '../../koneksi.php';

$id_beli = $_GET['id'];

$query = mysql_query("DELETE FROM tb_cash where id_beli = '$id_beli'") ;

if ($query) {
	echo "<script> alert('Data berhasil dihapus !'); 
		  document.location.href = 'datapaket.php' </script>" ;
}else{
	echo "<script> alert('Data gagal dihapus !'); 
		  document.location.href = 'datapaket.php' </script>" ;
}


?>