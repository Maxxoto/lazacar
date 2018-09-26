<?php

include "../koneksi.php";
extract($_POST);


$query = mysql_query("UPDATE tb_bio SET nama_user = '$nama_user',
						 jk_user = '$jk_user',
						 alamat_user = '$alamat_user',
						 notelp_user = '$notelp_user' 
						 WHERE id_user = '$id_user'") ;


if($query){
	echo "<script> alert('Data berhasil disimpan'); 
	document.location.href='../login.php' </script>" ;
	
}else{
	echo "<script> alert('Data gagal disimpan'); 
	document.location.href='../login.php' </script>" ;
}

?>