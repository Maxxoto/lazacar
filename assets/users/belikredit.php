<?php
	include '../../koneksi.php';
	session_start();
	if($_SESSION['roles'] == "user"){

		$id_show = $_SESSION['id_user'] ;
		$ambildata = mysql_query("SELECT * from tb_bio where id_user='$id_show' ") ;
		$row = mysql_fetch_array($ambildata);   
		

			
			//KODEBELIKREDIT
			$carikode2 = mysql_query('SELECT max(id_beli) from tb_cicilan') or die(mysql_error());
			$datakode2 = mysql_fetch_array($carikode2);
			if($datakode2){
				$nilaikode2 = substr($datakode2[0],5);
				$kode2 = (int) $nilaikode2;
				$kode2 = $kode2 + 1;
				$hasilkodekredit = "BKRED".str_pad($kode2, 5 , "0" ,STR_PAD_LEFT);
			}else{
				$hasilkodekredit = "BKRED00001";
			}
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
			 		<li> <a href="transaksi.php"> <i> Transaksi>>></i></a></li>
			 		<li style="background-color:#ff4343 ;border-radius: 5%;">
			 	</ul>

			 	</div> 

			 	<!-- Tutup Navbar -->
			 	<div class="clear"> </div>
			 </div>
		</div>

		<div class="center">

		<?php
			$id_mobil = $_GET['id_mobil'];
			// PENGAMBILAN DATA MOBIL 
			$querymobil = mysql_query("SELECT * from tb_mobil where id_mobil = '$id_mobil' ");
			$datamobil = mysql_fetch_array($querymobil);
			// PENGAMBILAN DATA Cash
			$querykredit = mysql_query("SELECT * from tb_cicilan where id_pembeli = '$id_show' and id_beli = '$hasilkodekredit' ");
			$datakredit = mysql_fetch_array($querykredit);
			$querykredit2 = mysql_query("SELECT * from tb_cicilan where id_pembeli = '$id_show' ");
			$datakredit2 = mysql_num_rows($querykredit2);
		?>
		
		<div id="menumobil">
			<div class="judulmenu"> Formulir Beli Kredit </div>	
		</div>
		<br>
		<div class="table-responsive" >
			<form method="post" action="belikredit_proses.php">
			<table class="table" align="center" width="100%">
				
				<tr>
					<th width="25%"> ID BELI </th>
					<td> <input class="input-responsive" type="text" name="id_beli" value="<?php echo $hasilkodekredit; ?>" readonly></td>
				</tr>
				<tr>
					<th> ID PEMBELI </th>
					<td><input class="input-responsive" type="text" name="id_pembeli" value="<?php echo $id_show; ?>" readonly></td>
				</tr>
				<tr>
					<th> NAMA PEMBELI </th>
					<td><input class="input-responsive" type="text" name="nama_pembeli" value="<?php echo $row['nama_user']; ?>" readonly></td>
				</tr>
				<tr>
					<th> PAKET KREDIT </th>
					<td>
					<label><input type="radio" name="paket_kredit" value="12" style="width:5%;" required> 12 Bulan</label>
					<label><input type="radio" name="paket_kredit" value="24" style="width:5%;" required> 24 Bulan</label>
					</td>
				</tr>
				<tr>
					<th> UANG MUKA </th>
					<td>
					<select name="uang_muka">
					<option value="25000000">Rp.25,000,000</option>
					<option value="50000000">Rp.50,000,000</option>
					<option value="75000000">Rp.75,000,000</option>
					<option value="150000000">Rp.150,000,000</option>
					</select>
					*Silahkan pilih uang muka sesuai yang anda inginkan
					</td>
				</tr>
				<tr>
					<th> ID MOBIL </th>
					<td><input class="input-responsive" type="text" name="id_mobil" value="<?php echo $id_mobil; ?>" readonly></td>
				</tr>
				<tr>
					<th> NAMA MOBIL </th>
					<td><input class="input-responsive" type="text" name="nama_mobil" value="<?php echo $datamobil['nm_mobil']; ?>" readonly></td>
				</tr>
				<tr>
					<th> HARGA MOBIL </th>
					<td><input class="input-responsive" type="text" name="harga_mobil" value="<?php echo $datamobil['harga_mobil']; ?>" readonly></td>
				</tr>
				<tr>
					<th> PEMBELIAN </th>
					<td> 
					<?php
					if($datakredit2 < 3){
					echo "<input type='submit' name='submitproses' class='proses' value='Proses'>"; 
					}else{
					echo "<label class='label-danger'>Anda hanya bisa mempunyai maksimal 3 mobil untuk dicicil </label>";
					}
					?>
					</td>
				</tr>

				
				
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