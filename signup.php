<html>
	<head>
		<title> Lazacar | Online shop for automobile </title>

		<link rel="stylesheet" href="css/bootstrap.min.css">
		<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/custom.css">
	<style type="text/css">
		body{
			background-color: #00ffcc;
		}
	</style>
	</head>

	<body>
		<div class="container">
		<center>
			<div class="well well-lg" style="margin-top: 50px;width: 500px;background-color:#ffffff;-webkit-box-shadow:#00ffcc 3px 0px 3px;border-color:#00ffcc;">
				<h1 align="center" style="color: #000;"> Form Pendaftaran User </h1>
					<span class="glyphicon glyphicon-user fa-3x " style="background-color:#cccccc; padding: 35px 40px 40px 40px;border-radius: 50%;"> 
					</span>
				<br>
				<br>
				<form method="post" name="signup" action="assets/signup_proses.php" align="left">



					<div class="input-group" >
							<span class="input-group-addon"><i class="fa fa-address-card fa-fw"> </i> </span>
							 
							 <input  class="form-control" pattern="[0-9]{16}" type="text" title="Gunakan nomor untuk KTP" name="ktp" placeholder="No.KTP" maxlength="16" required>
					</div>	

					<br>
					
					<div class="input-group" >
							<span class="input-group-addon"> <i class="fa fa-user fa-fw"> </i> </span>
							 
							 <input  class="form-control" type="text" name="username" placeholder="Username" maxlength="10" required>
					</div>	

					<br>

					<div class="input-group" >
							<span class="input-group-addon"><i class="fa fa-key fa-fw"> </i> </span>
							 
							 <input  class="form-control" type="password" name="password" placeholder="Password" required>
					</div>	


					<br>
						<button class="btn-primary btn-sm" type="submit"> Daftar </button>
						<button class="btn-danger btn-sm" type="reset"> Reset </button>

					</div>
				</form> 

			</div>
			</center>
		</div>

	</body>


</html>