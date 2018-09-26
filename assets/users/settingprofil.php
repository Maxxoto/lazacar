<?php
	include "../../koneksi.php";
	session_start();
	if($_SESSION['roles'] == 'user'){

?>
<html>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial scale=0.1" />
	<head>
		<title> Lazacar | Online shop for automobile </title>

		<link rel="stylesheet" href="../../css/custom.css">
	</head>

		<body>
								
				<?php 
				$id_show = $_SESSION['id_user'] ;
				$ambildata = mysql_query("SELECT * from tb_bio where id_user='$id_show' ") ;
				$row = mysql_fetch_array($ambildata);   
				?>
				<!-- PEMANGGILAN DATA -->
				

				
				
			<div class="center" align="center">
				
			<div id="content" name="content"  style="float: none;">
				<div class="contentheader"> Setting Profil</div>

				<div class="contentbody" align="center"> 
				<form name="setting" method="post" action="../settingprofil_proses.php">
				<div class="table-responsive">
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
						<td> 
							<?php
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
						<td> <textarea rows="10" cols="30" name="alamat_user" required> 
							 <?php echo $row['alamat_user'] ?> </textarea>
						</td>	
					</tr>
					<tr>
						<th> No Telp </th>
						<td>  : </td>
						<td> <input type="text" maxlength="12" name="notelp_user" value="<?php echo $row['notelp_user'] ?> " required>  </td>	
					</tr>
					<tr>
						<td> </td>
						<td> </td>
						<td> <button class="btn-primary btn-sm" type="submit"> Submit </button></td>
					</tr>
				</table>
				</div>
				</form>
				</div>

			</div>
			</div>
		
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