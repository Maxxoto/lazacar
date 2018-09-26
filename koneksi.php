<?php

	$user = "root" ;
	$pass = "";	
	$db = "lazacar";
	$server = "localhost" ;


	$konekdb = mysql_connect($server,$user,$pass)
		or die ("Gagal terkoneksi ke database".mysql_error()) ;

	$pilihdb = mysql_select_db($db)
		or die ("Gagal memilih database".mysql_error()) ;



?>