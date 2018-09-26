<?php
	include "koneksi.php";

	session_start();

	if(isset($_SESSION['roles']) == null ) {

?>

<html>
	<head>
		<title> Lazacar | Online shop for automobile </title>

	<link rel="stylesheet" href="css/bootstrap.min.css"> 
	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	<style type="text/css">
		body{
			background-image: url('img/olshop.jpg') ;
			background-size: 50%;
			background-position: top right;
			background-repeat: repeat;	
		}
	</style>
	</head>

		<body>
		<center>
			<div class="container" style="width: 500px;margin-top: 10px;">
			
				<h1 style="font-family: Roboto;border-radius: 10px 10px 10px 10px;color: #fff;-webkit-box-shadow:#000 5px 0px 5px ;">
					
					Selamat datang di <br> Lazacar 
					
				</h1>
				<br><br>
				<h4 style="color:#fff;font-family: Roboto-condensed"> Silahkan login dibawah ini </h4>

				<!-- -->
				<br>
				<!-- -->
				<!-- NOTIFIKASI JIKA SALAH -->

					<?php

						if(isset($_GET['error'] )){
							echo '<div class="alert alert-warning alert-dismissible fade in" role="alert">
								<button type="button" class="close" data-dismiss="alert"> 
								<span aria-hidden="true">x</span> <span class="sr-only"> Close </span> </button>
								Username atau Password salah ! </div> ' ;
						}


					?>


				

				<!-- END NOTIF -->

				<form name="login" action="assets/login_proses.php" method="post" class="well well-lg" style="background-color:#3cbc3f;border-width: 0px;border-radius: 10%;">
					<!-- Logo -->
					<i class="fa fa-shopping-cart fa-5x " style="background-color:#fff;padding: 20px 28px 20px 20px;border-radius: 50%;"> </i>

					<!-- Logo -->
					<br><br>

					<!-- Inputan -->

					<div class="input-group">
						<span class="input-group-addon"> <i class="fa fa-envelope-o fa-fw"> </i></span>
							<input class="form-control" type="text" name="username" placeholder="Username" required>
					</div>

					<br>

					<div class="input-group">
						<span class="input-group-addon"> <i class="fa fa-key fa-fw"> </i> </span>
							<input class="form-control" type="password" name="password" placeholder="Password" required>
					</div>
					<br>
					<div align="right" class="input-group">
						<button class="btn btn-primary btn-lg" name="submit" type="submit"> Login</button>
					</div>	
					<br>

					<div style="color: #fff;">
					Tidak punya akun ? Daftar <a style="text-decoration: none;" href="signup.php"> disini  </a> !
					</div>
					<!-- END Inputan -->	


				</form>
			
			</div>			
	</center>
	<!-- JSCRIPT -->
			<script type="text/javascript" src="js/jquery.min.js" > </script>
			<script type="text/javascript" src="js/bootstrap.min.js"> </script>


	<!-- JSCRIPT -->
		</body>

</html>

<?php

	}else {
		if($_SESSION['roles'] == "admin" ) {
			header("location:assets/admin/index.php");
		}elseif($_SESSION['roles'] == "user") {	
			header("location:assets/users/index.php");
		}else{
			echo 'user tidak ditemukan' ;
			session_destroy();
		}
		}	
?>		