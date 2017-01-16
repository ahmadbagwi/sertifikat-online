<!DOCTYPE html>
<html>
<head>
	<title>Certificate World Culture Forum 2016</title>
	<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="col-md-6 col-md-offset-3">
			<div class="panel panel-primary">
	  			<div class="panel-heading"><h2>Certificate World Culture Forum 2016</h2></div>
	 				<div class="panel-body">
						<div class="konten">

							<form action="index.php" method="post">
								<strong>Please enter your name</strong><br>
								<input type="text" class="form-control" name="id" placeholder="first name or last name" ></input>
								<input type="submit" class="btn btn-primary" value="Check" name="certificate"></input><br><br><br>
							</form>

<?php
	$getid = $_POST["id"];
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db   = "dbsertifikat";
	//buat koneksi dan ambil database		
	$koneksi = mysql_connect($host, $user, $pass) or die("Koneksi error");
	$db = mysql_select_db($db) or die("database tidak ditemukan");

	//ambil POST dan sesuaikan dengan database
	$ambildb = mysql_query("SELECT nama FROM peserta WHERE no_registrasi LIKE '%$getid%' OR nama LIKE '%$getid%'");
	
	while ($row = mysql_fetch_assoc($ambildb)){
		$hasil = $row['nama'];
		
	}

?>
							<form action="certificate.php" method="post">
								<strong>It's your name?</strong><br>
								<input type="text" class="form-control" name="namadisable" disabled="yes" value="<?php
								if (!empty($getid)) { //berfungsi verifikasi, menampilkan nama hasil input saja tapi tidak dikirim ke untuk dicetak (certificate.php) karena status input tersebut disable
								 	echo "$hasil";
								 	}
								 	else {
								 	echo "your name will shown automatic";	
								 	} 
								   ?>" ></input>
								<input type="hidden" name="namacetak" value="<?php
								if (!empty($getid)) { //berfungsi mengirim nama yang telah diinput dan sesuai untuk di cetak ke (certificate.php)
								 	echo "$hasil";
								 	}
								 	else {
								 	echo "";	
								 	} 
								   ?>"></input>
								<input id="get" type="submit" class="btn btn-primary" value="Get Certificate Now" name="certificate"></input>
							</form>
							<br><h4><strong>Notes:</strong> After certificate generated please save as file.jpg</h4>
						</div>
					</div>
			</div>
		</div>
	</div>

</body>

</html>
