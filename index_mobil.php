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
 	

 	<style type="text/css">
 		#header-user{
 			background-color: #262626;
 			height: 50px;
 			color: #fff;
 			box-shadow: 0px 5px 5px #cccccc;
 		}
 		.header-profile{
 			float: right;
 			margin-right: 25px;
 			margin-top: 15px;
 			font-family: "Web-Segoe-Light";
 		}
 		.header-profile a{
 			color: #1a1aff;
 			text-decoration: none;
 		}

 	</style>
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
			 		<li> <a href="index.php"> Home </a></li>
			 		<li> <a href="#layanan" > Layanan </a>	</li> 
			 		<li> <a href="index.php#ourteam"> About Us </a></li>
			 		<li> <a href="login.php"> Login </a></li>
			 		
			 		<li style="background-color:#ff4343 ;border-radius: 5%;">
			 	</ul>

			 	</div> 

			 	<!-- Tutup Navbar -->
			 	<div class="clear"> </div>
			 </div>
		</div>

		<div class="center">

		
		
		<div id="menumobil">
		<form action="" method="post">
			<input type="submit" name="submit" class="search btn-cari" value="Cari"> 
			<input type="search" name="search" class="search" placeholder="Masukkan nama mobil">
		</form>
			<div class="judulmenu"> Menu Mobil </div>	
		</div>

		<br>

		<?php 
		$submit = @$_POST['submit']; /* BUTTON CARI */
		$search = @$_POST['search'];


		// PAGINATION

			$no = 1;
			$batas = 6;
			$hal = @$_GET['hal'];
				if(empty($hal)){
					$posisi = 0;
					$hal = 1;
				}else{
					$posisi = ($hal - 1) * $batas;
				}


		if($submit){
			if($search != ""){
				$query = mysql_query("SELECT * from tb_mobil where nm_mobil like '%$search%' ORDER by id_mobil asc");				
			}else{
				$query = mysql_query("SELECT * from tb_mobil ORDER by id_mobil asc LIMIT $posisi,$batas ");
			}	
		}else{
			$query = mysql_query("SELECT * from tb_mobil ORDER by id_mobil asc LIMIT $posisi,$batas ");
		}	


		$cek = mysql_num_rows($query);
		if($cek < 1){
			echo "Data yang anda cari tidak ditemukan !";
		}

		while($data = mysql_fetch_array($query)){
		?>
			
			
			<div class="kontenspan">
				<div class="table-responsive">
			
			<table class="tableisi">

				<tr> <th> <?php echo $data['nm_mobil']; ?> </th> </tr>	
				<tr> <td> <img class="spangambar" src="img/mobil/<?php echo $data['gambar'] ; ?> " alt="Foto" > 
				</td> </tr>
				<tr> <td class="tdspek"> <?php echo $data['spek_mobil']; ?> </td> </tr>
				<tr> <td class="tdharga"> RP.<?php echo number_format($data['harga_mobil'],0,",",".") ;?>  </td> </tr>
				

			</table>

				</div>

			</div>

				
		
		<?php } ?>
		
			
		



		<div class="clear"> </div>

		<!-- PAGINATION -->
		<div style="margin:5px 0px 10px 25px; float:left;"> 
				<?php
				$jml = mysql_num_rows(mysql_query("SELECT * from tb_mobil"));
				echo "Jumlah Data : <b>".$jml."</b>";
				?>
		</div>
		<div style="margin:5px 25px 50px 0px; float:right;"> 
				<?php
				$jml_hal = ceil($jml / $batas);
				for($i=1; $i<=$jml_hal;$i++){
					if($i != $hal){
						echo "<a href='index_mobil.php?hal=$i'><button class='btn-pagination1'>$i</button> </a>";
					}else{
						echo "<button class='btn-pagination2'><b> $i</b> </button>";
					}
				}
				?>

		</div> 




		</div>

		<!-- CONTENT -->
		<div id="layanan">
			<div class="center">
				<h1 class="konten-judul"> <i class="fa fa-wrench"> </i> Our Services   </h1> 

				<div class="konten">

						<a href="#" class="layanan-kami">
							<div class="isi">	
								<i class="fa fa-car fa-5x"> </i>	
								<div class="text-content"> 
									Beli Mobil	
								</div>
							</div>						
						</a>

						<a href="sparepart.php" class="layanan-kami">
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


				<div class="clear"> </div>
			</div>
		</div>
		

		<!-- CONTENT -->

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
	<!-- <script type="text/javascript" src="../../js/jquery.min.js"> </script>
	<script type="text/javascript" src="../../js/customjs.js"> </script> -->
	

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