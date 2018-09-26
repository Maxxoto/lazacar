<?php 
	include '../koneksi.php';

	extract($_POST);

	$roles = "user" ;
	$query = mysql_query('INSERT into tb_admin (id_user,username,password,roles) VALUES ("'.$ktp.'","'.$username.'","'.$password.'","'.$roles.'") ') ;

	if($query) {
		echo "<script>alert('Data tersimpan');
		document.location.href='../login.php'</script>";

	}else{
		echo "<script>alert('Data yang anda masukkan gagal !');
		document.location.href='../signup.php' </script>";
	}

 ?>