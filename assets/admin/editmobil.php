<?php
	include "../../koneksi.php";
?>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial scale = 0,1 ">
		<title> Lazacar | Online shop for automobile </title>

		<link rel="stylesheet" href="../../css/custom.css">
		<link rel="stylesheet" href="../../css/custom2.css">
		<style type="text/css">
			body{
				background-color: #ff544c;
			}
			td,th{
				color: #fff;
				font-family: "Web-Segoe-SemiBold";
			}
		</style>
	</head>

	<body>
	<h1 align="center" style="margin-top: 50px;margin-bottom: 50px;font-family: Web-Segoe-SemiBold ;color:#fff;"> FORM EDIT MOBIL </h1>
		<div class="table-responsive">
		<?php
			$id_mobil = $_GET['id'];
			$query = mysql_query("SELECT * from tb_mobil where id_mobil = '$id_mobil' ") ;
			$data = mysql_fetch_array($query);
		?>
			<form action="edit_datamobil_proses.php" method="post" enctype="multipart/form-data">
			<table class="table" align="center">
				<tr>
						<th> ID Mobil </th>
						<td>  : </td>
						<td> <input type="text" name="id_mobil" value="<?php echo $data['id_mobil']; ?>" readonly  > 
						</td>
				</tr>
				<tr>
						<th> Nama Mobil </th>
						<td>  : </td>
						<td> <input type="text" name="nm_mobil" value="<?php echo $data['nm_mobil']; ?>" > </td>	
				</tr>	
				<tr>
						<th> Spesifikasi Mobil </th>
						<td>  : </td>
						<td> <TEXTAREA type="text" name="spek_mobil" style="width: 100% ;height: auto;" > <?php echo $data['spek_mobil']; ?> </TEXTAREA>  </td>	
				</tr>	
				<tr>
						<th> Harga </th>
						<td>  : </td>
						<td> <input type="text" name="harga_mobil" value="<?php echo $data['harga_mobil']; ?>" >  </td>	
				</tr>	
				<tr>
						<th> Gambar </th>
						<td>  : </td>
						<td>  <input type="file" name="gambar" >  <?php echo $data['gambar']; ?></td>	
				</tr>		
				<tr>
						<td> </td>
						<td> </td>
						<td> <button class="btn-danger btn-sm" type="submit"> Submit </button> </td>	
				</tr>		
			</table>
			</form>
		</div>

	</body>


</html>