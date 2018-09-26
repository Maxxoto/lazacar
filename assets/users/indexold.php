<?php
	include "../../koneksi.php";
	session_start();
	if($_SESSION['roles'] == 'user'){

?>
<html>
	<head>
		<title> Lazacar | Online shop for automobile </title>

		<link rel="stylesheet" href="css/bootstrap.min.css">

	</head>

		<body>
				<CENTER>

			<div class="container">
				<div class="jumbotron" style="background-color: grey;"	> <h1> Lazacar Online Shop </h1> </div>
				
				
				<h2> <label class="label label-primary">  <?php echo $_SESSION['username']; ?> </label> </h2><br> 
				login sebagai &nbsp <h3> <label class="label label-danger"> <?php echo $_SESSION['roles']; ?>   </label> </h3>	

				<br>
				<br>
				<br><br>
				<a class="btn btn-danger" href="logout.php"> LOGOUT </a>
			</div>

				</CENTER>
			
		</body>

</html>

<?php

}else {
	echo "<script> alert('Forbidden Access');
		  location.href='../../index.php';
		  </script>";
		
		exit();
}
?>