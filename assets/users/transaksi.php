<?php
	include '../../koneksi.php';
	session_start();
	if($_SESSION['roles'] == "user"){

		$id_show = $_SESSION['id_user'] ;
		$ambildata = mysql_query("SELECT * from tb_bio where id_user='$id_show' ") ;
		$row = mysql_fetch_array($ambildata);   
		
?>

<html>
	<head> 
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=0.1" />
		<title> Lazacar | Online shop for automobile </title>

	
	<link rel="stylesheet" href="../../css/custom.css">
	<link rel="stylesheet" href="../../css/custom2.css">
 	<link rel="stylesheet" href="../../css/font-awesome/css/font-awesome.min.css">
 	

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
		<div id="header-user">
			<div style="float: left;font-family:'Web-Segoe-Light';margin:15px 0px 0px 15px;"> 
			<a href="settingprofil.php" style="text-decoration: none;color: #fff;"> Setting Profile </a> </div>
			
			<div class="header-profile">	

				<?php
				if($row['nama_user'] != null){
				echo $row['nama_user'] ; 
				echo "<a href='logout.php'> [ Logout ]</a>" ;
				}else{
				echo "Untuk kenyamanan berbelanja silahkan lengkapi data terlebih dahulu <a href='settingprofil.php'> >Klik disini< </a> ";
				echo "<a href='logout.php'> [ Logout ]</a>" ;
				}
				?>
			</div>
		</div>

		

		<div id="header">
			 <div class="center">

			 <!-- Logo -->
			 	<div class="logo">
			 		<img src="../../img/lazacar.png">
			 	</div>
			 <!-- Logo -->

			 	<!-- Navbar -->
			 	<div class="navbar">
			 	<ul>
			 		<li> <a href="index.php"> Home </a></li>
			 		<li>  <a href="#layanan" > Layanan </a>	</li> 
			 		<li> <a href="#ourteam"> About Us </a></li>
			 		<li> <a href="#"> <i> Transaksi>>></i></a></li>
			 		<li style="background-color:#ff4343 ;border-radius: 5%;">
			 	</ul>

			 	</div> 

			 	<!-- Tutup Navbar -->
			 	<div class="clear"> </div>
			 </div>
		</div>

		<div class="center">

		<?php

			
			
			
		?>
		
		<div id="menumobil">
			<div class="judulmenu"> Formulir beli cash </div>	
		</div>
		<br>
		<div class="table-responsive" >
			<form method="post" action="transaksi_proses.php">
			<table class="table" align="center" width="100%">
				<tr>
					<th> ID BELI </th>
					<th> NAMA MOBIL </th>
					<th> TGL TRANSAKSI </th>
					<th> HARGA MOBIL </th>
					<th width="30%"> STATUS VERIFIKASI </th>
				</tr>

				<?php 
				$querycash = mysql_query("SELECT * from tb_cash where id_pembeli = '$id_show' ");

				// $datacash = mysql_fetch_array($querycash);
				// $querybiodata = mysql_query("SELECT * from tb_bio where id_user = '$id_show' ");
				// $databiodata = mysql_fetch_array($querybiodata);
				

				while($data1 = mysql_fetch_array($querycash)){
				$mobil = $data1['id_mobil'];
				
				
				$querymobil = mysql_query("SELECT * from tb_mobil where id_mobil = '$mobil' ");
				$data2 = mysql_fetch_array($querymobil);

				$tanggal = date("d/m/y");
				?>
				<tr>
					<td><input type="text" class="input-responsive" name="id_beli" value="<?php echo $data1['id_beli'];?>" 
					readonly="true"</td>	
					<td><input type="text" class="input-responsive" name="nama_mobil" value="<?php echo $data2['nm_mobil'];?>" readonly="true"</td>
					<td><input type="text" class="input-responsive" name="tgl_beli" value="<?php echo $tanggal ; ?>" readonly="true"> </td>
					<td><input type="text" class="input-responsive" name="harga_mobil" value="Rp.<?php echo number_format($data2['harga_mobil']);?>" 
					readonly="true"> 
					</td>
					<td>
						<?php
						if($data1['status_verifikasi'] == "1"){
								echo "<label class='label-success'> SUDAH DIVERIFIKASI </label> <br> <br>
									<a href='transaksi_proses.php?id=$data1[id_beli] ' class='konfirmasi'> KONFIRMASI</a>
									<a href='../laporan/laporan_belicash.php?id=$data1[id_beli]' target='_blank'class='PROSES'><i class='fa fa-print'> </i> CETAK </a>

									" ;
							}else{
								echo "<label class='label-danger'> BELUM DIVERIFIKASI <label>";
							}
							
						?>

					</td>

				</tr>
				<?php } ?>
				
				
			</table>
			</form>
		</div>

		*Ketentuan & Cara Pembelian Cash :	
			<ul type="disc">
			<li>Setelah transaksi silahkan mentransfer ke Rekening <b> 0136940328102(BRI) atau 849201856923(MANDIRI)</b>.</li>
			<li>Jika sudah transfer maka admin mengkonfirmasi pembelian anda.</li>
			<li>Setelah itu cetak bukti untuk pengambilan mobil anda.</li>
			<li>Berikan bukti cetak tersebut pada petugas kami yang mengirim mobil anda ditempat.</li>
			</ul>

		<div id="menumobil">
			<div class="judulmenu"> Formulir beli kredit </div>	
		</div>
		<br>
		<div class="table-responsive" >
			<form method="post" action="transaksi_proses.php">
			<table class="table" align="center" width="100%">
				<tr>
					<th> ID BELI </th>
					<th> NAMA MOBIL </th>
					<th> TGL TRANSAKSI </th>
					<th> HARGA MOBIL </th>
					<th width="30%"> STATUS VERIFIKASI </th>
				</tr>
				<?php
				$querykredit = mysql_query("SELECT * from tb_kredit where id_pembeli = '$id_show' ");

				// $datacash = mysql_fetch_array($querycash);
				// $querybiodata = mysql_query("SELECT * from tb_bio where id_user = '$id_show' ");
				// $databiodata = mysql_fetch_array($querybiodata);
				

				while($data3 = mysql_fetch_array($querykredit)){
				$mobil = $data3['id_mobil'];
				$idbeli3 = $data3['id_beli'];
				
				$querymobil = mysql_query("SELECT * from tb_mobil where id_mobil = '$mobil' ");
				$data4 = mysql_fetch_array($querymobil);

				$tanggal = date("d/m/y");
				?>
				<tr>
					<td><input type="text" class="input-responsive" name="id_beli" value="<?php echo $data3['id_beli'];?>" 
					readonly="true"</td>	
					<td><input type="text" class="input-responsive" name="nama_mobil" value="<?php echo $data3['nama_mobil'];?>" readonly="true"</td>
					<td><input type="text" class="input-responsive" name="tgl_beli" value="<?php echo $tanggal ; ?>" readonly="true"> </td>
					<td><input type="text" class="input-responsive" name="harga_mobil" value="Rp.<?php echo number_format($data3['harga_mobil']);?>" 
					readonly="true"> 
					</td>
					<td>
						<?php
						$querykreditmax = mysql_query("SELECT max(bulan) from tb_cicilan where id_beli = '$idbeli3' ");
						if($data1['status_verifikasi'] == "1"){
								echo "<label class='label-success'> LUNAS </label> <br> <br>
									<a href='#' class='konfirmasi'> KONFIRMASI</a>
									<a href='../laporan/laporan_belikredit.php?id=$data3[id_beli]' target='_blank'class='PROSES'><i class='fa fa-print'> </i> CETAK </a>

									" ;
							}else{
								echo "<label class='label-danger'> BELUM LUNAS </label> <br> <br>
									<a href='belikredit_view.php?idbeli=$data3[id_beli]' class='cicilan'> FORM CICILAN </a> ";
							}
							
						?>

					</td>

				</tr>

				<?php } ?>
				
				
			</table>
			</form>
		</div>

		*Ketentuan & Cara Pembelian Kredit :	
			<ul type="disc">
			<li>Setelah transaksi silahkan bayar angsuran sesuai waktu yang anda minta ke Rekening <b> 0136940328102(BRI) atau 849201856923(MANDIRI)</b>.</li>
			<li>Jika sudah bayar angsuran dan lunas maka admin mengkonfirmasi pembelian anda.</li>
			<li>Setelah itu cetak bukti untuk pengambilan mobil anda.</li>
			<li>Berikan bukti cetak tersebut pada petugas kami yang mengirim mobil anda ditempat.</li>
			</ul>

		<div class="clear"> </div>
		</div>

		<!-- CONTENT -->
		<div id="layanan">
			<div class="center">
				<h1 class="konten-judul"> <i class="fa fa-wrench"> </i> Our Services   </h1> 

				<div class="konten">

						<a href="jb_mobil.php" class="layanan-kami">
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

			<h1> Sponsored :</h1> <img src="../../img/cyberpolice.png">
			<div class="dmca"> <img src="../../img/dmca.png"> </div>
			
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
		echo "<script> alert('Forbidden Access') ;
		document.location.href='../../index.php' </script> " ;
		exit();
	}

?>