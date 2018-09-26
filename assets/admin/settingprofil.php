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
		th,td {
			font-family: "Web-Segoe-Light";
		}
		input{
			font-family: "Web-Segoe";
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
							<li> <a href="cetak.php"> Laporan </a> </li><br>
							<li> <a class="active" href="#"> Setting </a> </li>
						
					</div>


					
			</div>

			<!-- ISI CONTENT  -->
			<div id="content" name="content" >
				<div class="contentheader"> Setting Profil</div>

				<div class="contentbody" align="center"> 
				<form name="setting" method="post" action="../settingprofil_proses.php">
				<table class="table">
					<tr>
						<th> ID User </th>
						<td>  : </td>
						<td style="width: 250px;"> 
							 <input type="text" name="id_user" value="<?php echo $row['id_user'] ?>" readonly>  </td>	
					</tr>	
					<tr>
						<th> Nama Lengkap</th>
						<td>  : </td>
						<td> <input type="text" name="nama_user" value="<?php echo $row['nama_user'] ?> " required>  </td>	
					</tr>
					<tr>
						<th> Jenis Kelamin </th>
						<td>  : </td>
						<td> <?php
								if($row['jk_user'] == "L"){
									echo "
									<label> 
									<input type='radio' name='jk_user' value='L' style='width: auto;' checked='true' required>Laki-laki
							   		</label>
							   		<label>
							 		<input type='radio' name='jk_user' value='P' style='width: auto;' required> Perempuan 
							 		</label>";
								}else{
									echo "<label> 
									<input type='radio' name='jk_user' value='L' style='width: auto;' required>Laki-laki
							   		</label>
							   		<label>
							 		<input type='radio' name='jk_user' value='P' style='width: auto;' checked='true' required> Perempuan 
							 		</label>";
								}
							?>
							 
						</td>	
					</tr>
					<tr>
						<th> Alamat </th>
						<td>  : </td>
						<td> <textarea type="text" style="width: 100%;height: 75px;" name="alamat_user" required> 
							 <?php echo $row['alamat_user'] ?>  </textarea>
						</td>	
					</tr>
					<tr>
						<th> No Telp </th>
						<td>  : </td>
						<td> <input type="text" maxlenght="12" name="notelp_user" value="<?php echo $row['notelp_user'] ?> " required>  </td>	
					</tr>
					<tr>
						<td> </td>
						<td> </td>
						<td> <button class="btn-danger btn-sm" type="submit"> Submit </button></td>
					</tr>
				</table>
				</form>
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