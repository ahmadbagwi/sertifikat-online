<?php
	$getid = $_POST["id"];
	$host = "localhost";
	$user = "root";
	$pass = "b3Survivor";
	$db   = "sertifikat";
	//buat koneksi dan ambil database		
	$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi error");
	$db = mysql_select_db($db) or die("database tidak ditemukan");

	//ambil POST dan sesuaikan dengan database
	$ambildb = mysql_query("SELECT nama FROM peserta WHERE id=$getid");
	
	while ($row = mysql_fetch_assoc($ambildb)){
		$hasil = $row['nama'];
		echo "$hasil";
	}
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form action="certificate.php">
	
</form>
</body>
</html>