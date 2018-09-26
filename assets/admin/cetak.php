	<?php
	include "../../koneksi.php";
	session_start();
	if($_SESSION['roles'] == 'admin'){

?>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=0.1" />
	<head>
		<title> Lazacar | Online shop for automobile </title>

		<link rel="stylesheet" href="../../css/custom.css">
		<link rel="stylesheet" href="../../css/custom2.css">
	<style type="text/css">
		body{
			background-color: #f2f2f2;
		}

	</style>
	</head>

		<body>
				
			<div id="headeradmin">				
				<div class="centeradmin">
				
				<div class="judul">
					<a href="#"> Admin <span> CPanel </span> </a>
				</div>


				<!-- ADMINBAR -->
				<div class="adminbar">

				<!-- PENGAMBILAN DATA -->
				
				<?php 
				$id_show = $_SESSION['id_user'] ;
				$ambildata = mysql_query("SELECT * from tb_bio where id_user='$id_show' ") ;
				$row = mysql_fetch_array($ambildata);   
				?>
				<!-- PEMANGGILAN DATA -->
				<span> <?php echo $row['nama_user']; ?> </span>

				&nbsp;<a href="logout.php"> [LOGOUT] </a>
				

				<div class="clear"> </div>
				</div>
				<!-- ADMINBAR -->
				
				</div> <!-- END CLASS centeradmin -->
			</div>


			<div id="menuadmin">
			
				<div class="menutitle">
					 <a href="#"> CPANEL </a> 
				</div>
					<div class="menubody">
						
							<li> <a href="datamobil.php" target="_self"> Data Mobil </a> </li> <br>
							<li> <a href="datapembeli.php"> Data Pembeli </a> </li><br>
							<li> <a href="datapaket.php"> Data Paket </a> </li><br>
							<li> <a class="active"  href="#"> Laporan </a> </li><br>
							<li> <a href="settingprofil.php"> Setting </a> </li>
						
					</div>


					
			</div>

			<!-- ISI CONTENT  -->
			<div id="content" name="content" >
				<div class="contentheader"> Dashboard Admin</div>

				<div class="contentbody" align="center"> 
				<div class="table-responsive">
				<table>
				<tr>
					<td> <a class="btn-1" href="../laporan/laporan_pelanggan.php" target="_blank"> CETAK DATA PELANGGAN
					</a></td>
					<td> <a class="btn-2" href="../laporan/laporan_mobil.php" target="_blank"> CETAK DATA MOBIL
					</a> </td>
				</tr>
				<tr>
				</tr>
				</table>	
				</div>
				

				</div>
			</div>

			<!-- ISI CONTENT  -->
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