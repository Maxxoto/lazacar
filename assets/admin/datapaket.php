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
						
							<li> <a href="datamobil.php" > Data Mobil </a> </li> <br>
							<li> <a href="datapembeli.php"> Data Pembeli </a> </li><br>
							<li> <a class="active" href="#"> Data Paket </a> </li><br>
							<li> <a href="cetak.php"> Laporan </a> </li><br>
							<li> <a href="settingprofil.php"> Setting </a> </li>
						
					</div>


					
			</div>

			<!-- ISI CONTENT  -->
			<div id="content" name="content" >
				<div class="contentheader"> Dashboard Admin</div>

				<div class="contentbody" align="center"> 
				<div class="table-responsive">
				<table class="table">
					<br>
					DATA PAKET CASH
					<tr>
						<th> No </th>
						<th> ID Beli </th>
						<th> Nama Pembeli</th>
						<th> ID Mobil </th>
						<th> Nama Mobil </th>
						<th> Nama Admin</th>
						<th> Status Verifikasi </th>
						<th> Aksi </th>
					</tr>
				
				<!-- SCRIPT PHP -->
				
				<?php
					// PAGINATION
					$no = 1;
					$batas = 5;
					$hal = @$_GET['hal'];
					if(empty($hal)){
						$posisi = 0;
						$hal = 1;
					}else{
						$posisi = ($hal - 1) * $batas;
					}

					$ambildatacash = mysql_query("SELECT * from tb_cash order by id_beli LIMIT $posisi,$batas") ;
					$no = $posisi + 1;
					$cek = mysql_num_rows($ambildatacash);	
					if($cek < 1){
						echo "DATA TIDAK DITEMUKAN";
					}else{
					while($data = mysql_fetch_array($ambildatacash)){   	
					$id_user = $data['id_pembeli'];
					$ambildatabio = mysql_query("SELECT * from tb_bio where id_user = '$id_user' ");
					$data2 = mysql_fetch_array($ambildatabio);
					$id_mobil = $data['id_mobil'];
					$ambildatamobil = mysql_query("SELECT * from tb_mobil where id_mobil = '$id_mobil' ");
					$data3 = mysql_fetch_array($ambildatamobil);
				?>	
				<!-- SCRIPT PHP -->
					<tr>
						<td> <?php echo $no; ?> </td>
						<td> <?php echo $data['id_beli'];    ?> </td>	
						<td> <?php echo $data2['nama_user'];    ?> </td>
						<td> <?php echo $data['id_mobil'];  ?> </td>	
						<td> <?php echo $data3['nm_mobil']; ?> </td>
						<td> <?php echo $row['nama_user'];?></td>
						<td> 
							<?php
							if($data['status_verifikasi'] == "1"){
								echo "<label class='label-success' style='font-size:12px;'> SUDAH </label> " ;
							}else{
								echo "<label class='label-danger' style='font-size:12px;'> BELUM </label> " ;
							}

							?>



						</td>
						<td> <a class="btn-1 btn-sm" href="verifikasi.php?id=<?php echo $data['id_beli'];?> "> Verifikasi</a>
							 <br><br>
							 <a class="btn-2 btn-sm" href="deletepembeli.php?id=<?php echo $data['id_beli']; ?>" onClick="return confirm('Apakah anda ingin menghapus pembeli berkode <?php echo $data['id_mobil']; ?>? ')"> Hapus </a> </td>
					</tr>
				<?php $no++;} } ?> <!-- PHP TUTUP -->

				
				</table>
				</div>


				<!-- PAGINATION -->
				<div style="margin:5px 0px 0px 0px; float:left;"> 
				<?php
				$jml = mysql_num_rows(mysql_query("SELECT * from tb_cash"));
				echo "Jumlah Data : <b>".$jml."</b>";
				?>
				</div>
				<div style="margin:5px 25px 50px 0px; float:right;"> 
				<?php
				$jml_hal = ceil($jml / $batas);
				for($i=1; $i<=$jml_hal;$i++){
					if($i != $hal){
						echo "<a href='datapaket.php?hal=$i'><button class='btn-pagination1'>$i</button> </a>";
					}else{
						echo "<button class='btn-pagination2'><b> $i</b> </button>";
					}
				}
				?>

				</div>
				<!-- TABEL KREDIT -->
				<br>

				<div class="table-responsive">
				<table class="table">
					<br>
					DATA PAKET KREDIT
					<tr>
						<th> No </th>
						<th> ID Beli </th>
						<th> ID Pembeli </th>
						<th> ID Mobil </th>
						<th> ID Admin </th>
						<th> Aksi </th>
					</tr>
				
				<!-- SCRIPT PHP -->
				
				<?php 
					$ambildatacash = mysql_query("SELECT * from tb_cash order by id_beli LIMIT 5") ;
					$no = 1;
					while($data = mysql_fetch_array($ambildatacash)){   	
				?>	
				<!-- SCRIPT PHP -->
					<tr>
						<td> <?php echo $no; ?> </td>
						<td>  </td>	
						<td>  </td>
						<td>  </td>	
						<td>  </td>
						<td> <a class="btn-1 btn-sm" href="editmobil.php?id=<?php echo $data['id_mobil'];?> "> Edit</a>
							 
							 <a class="btn-2 btn-sm" href="deletemobil.php?id=<?php echo $data['id_mobil']; ?>" onClick="return confirm('Apakah anda ingin menghapus mobil bernama <?php echo $data['nm_mobil']; ?>? ')"> Hapus </a> </td>
					</tr>
				<?php $no++; } ?> <!-- PHP TUTUP -->

				
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