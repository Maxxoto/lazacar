<?php
	include 'koneksi.php';
	session_start();
	if(isset($_SESSION['roles']) == null){

	
?>

<html>
	<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=0.1" />
		<title> Lazacar | Online shop for automobile </title>

	
	<link rel="stylesheet" href="css/custom.css">
	<link rel="stylesheet" href="css/custom2.css">
 	<link rel="stylesheet" href="css/font-awesome/css/font-awesome.min.css">
	</head>

	<body>
		
		<div id="header">
			 <div class="center">

			 <!-- Logo -->
			 	<div class="logo">
			 		<img src="img/lazacar.png">
			 	</div>
			 <!-- Logo -->

			 	<!-- Navbar -->
			 	<div class="navbar">
			 	<ul>
			 		<li> <a href="#"> Home </a></li>
			 		<li> <a href="#layanan"> Layanan </a></li>
			 		<li> <a href="#ourteam"> About Us </a></li>
			 		<li> <a href="login.php"> Login </a></li>
			 	</ul>

			 	</div> 

			 	<!-- Tutup Navbar -->
			 	<div class="clear"> </div>
			 </div>
		</div>

		<!-- SLIDER -->

		<div id="slider">
			<div class="center">
				<h1> Selamat Datang di Lazacar </h1>
				<h2> Jual Beli Mobil Terbaik Secara Online</h2>
				<br>
				<h3> Untuk Memulai Silahkan Mendaftar Terlebih Dahulu </h3>
				<a href="signup.php" class="btn-primary"> DAFTAR </a>

			</div>

		</div>

		<!-- SLIDER -->		

		<!-- CONTENT -->
		<div id="layanan">
			<div class="center">
				<h1 class="konten-judul"> <i class="fa fa-wrench"> </i> Our Services   </h1> 

				<div class="konten">

					<div class="daftar-konten">


						<a href="index_mobil.php" class="layanan-kami">
							<div class="isi">	
								<i class="fa fa-car fa-5x"> </i>	
								<div class="text-content"> 
									Beli Mobil	
								</div>
							</div>						
						</a>

						<a href="#" class="layanan-kami">
							<div class="isi">	
								<i class="fa fa-gear fa-5x"> </i>	
								<div class="text-content"> 
									Sparepart	
								</div>
							</div>						
						</a>

						<a href="#" class="layanan-kami">
							<div class="isi">	
								<i class="fa fa-wrench fa-5x"> </i>	
								<div class="text-content"> 
									Servis Kendaraan
								</div>
							</div>						
						</a>


				</div>
				</div>


				<div class="clear"> </div>
			</div>
		</div>
		<!-- CONTENT -->

		<!-- TIM KITA  -->
		<div id="ourteam">
			<div class="center">

			<h1 class="judul-ourteam"> <i class="fa fa-users"> </i> OUR TEAM </h1> 

			<div class="content-ourteam">

				<div class="isi-ourteam">

				<img src="img/ourteam1.jpg" class="foto-ourteam">
				<div class="nama-team"> Ahmat Dani Setiawan 	</div>
				<div class="jabatan-team"> FOUNDER OF LAZACAR </div>

				</div>


				<div class="isi-ourteam" style="background-color: #6600ff;">

				<img src="img/ourteam1.jpg" class="foto-ourteam">
				<div class="nama-team"> Andrean Prayoga	</div>
				<div class="jabatan-team"> CTO LAZACAR </div>

				</div>

				<div class="isi-ourteam" style="background-color: #ffff00;">

				<img src="img/ourteam1.jpg" class="foto-ourteam">
				<div class="nama-team"> Heva Angga	</div>
				<div class="jabatan-team"> ENGINEER LAZACAR </div>

				</div>




			</div> <!-- TUTUP OURTEAM -->

			<div class="clear"> </div> <!-- CLEAR -->

			<div class="content-ourteam">

				<div class="isi-ourteam" style="background-color: #40ff00;">

				<img src="img/ourteam1.jpg" class="foto-ourteam">
				<div class="nama-team"> Stefanus Dwi	</div>
				<div class="jabatan-team"> Content Writer </div>

				</div>

				<div class="isi-ourteam" style="background-color: #1a75ff;">

				<img src="img/ourteam1.jpg" class="foto-ourteam">
				<div class="nama-team"> Riyantono	</div>
				<div class="jabatan-team"> Debugger </div>

				</div>

				<div class="isi-ourteam" style="background-color: #e67300;">

				<img src="img/ourteam1.jpg" class="foto-ourteam">
				<div class="nama-team"> Yovan Apris	</div>
				<div class="jabatan-team"> Programmer </div>

				</div>

			</div>




			<div class="clear"> </div>
			</div>
		</div>
		<!-- TIM KITA  -->

		<!-- FOOTER -->
		<div id="footer">
			<div class="isi">

			<h1> Sponsored :</h1> <img src="img/cyberpolice.png">
			<div class="dmca"> <img src="img/dmca.png"> </div>
			
			<div class="copyright">
					Copyright &copy; 2017 Design by Lazacar.Inc 
			</div>

			</div> <!-- PENUTUP ISI-->
		</div>
		<!-- FOOTER -->

	</body>

	<!-- <script type="text/javascript" src="js/jquery.min.js"> </script>
	<script type="text/javascript" src="js/customjs.js"> </script> -->

</html>

<?php
	}else{
		if($_SESSION['roles'] == "admin"){
		header("location:assets/admin/index.php");
		}elseif($_SESSION['roles'] == "user"){	
		header("location:assets/users/index.php");
		}else{
		echo "User tidak ditemukan";
		session_destroy();
		}
	}

?>