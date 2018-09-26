<?php
	
	include "../koneksi.php";

	session_start();
	extract($_POST);

	$query = "SELECT * from tb_admin where username = '$username' and password = '$password' " ;

	$proses = mysql_query($query);

	if (mysql_num_rows($proses)){
		while($row = mysql_fetch_array($proses)) {

		$_SESSION['username'] = $row ['username'];
		$_SESSION['id_user'] = $row ['id_user'];
		$_SESSION['roles'] = $row ['roles'];

		if($row['roles'] == "admin") {
			header("location:admin/index.php");
		}elseif($row['roles'] == "user") {
			header("location:users/index.php");
		}else{
			echo "<script>href.location</script>" ;
			session_destroy();
		}

	}

	}else{
		echo "<script> location.href='../login.php?error=1' </script> " ;
	}
?>