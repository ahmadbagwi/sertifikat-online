<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
require 'db.php';
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Certificate Online</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.min.css">
	</head>
	<body>
		<div class="container">
			<div class="col-md-6 col-md-offset-3">
				<div class="panel panel-primary">
		  			<div class="panel-heading"><h2>Simple Certificate Online</h2></div>
		 				<div class="panel-body">
							<div class="konten">
								<form action="index.php" method="post">
									<strong>Please enter your name</strong><br>
									<input type="text" class="form-control" id="keyword" name="keyword" placeholder="first name or last name" ></input>
									<input type="submit" class="btn btn-primary" value="Check" name="certificate"></input><br><br><br>
								</form>
								<?php
									if ($_SERVER['REQUEST_METHOD'] === 'POST') {
										$keyword = $_POST["keyword"];

										$sql = "SELECT * FROM peserta WHERE nama LIKE '%".$keyword."%'";
										$result = $conn->query($sql);
										if ($result->num_rows > 0) {
											while ($row = $result->fetch_assoc()){
												$hasil = $row['nama'];
											}
										} else {
											echo 'no result';
										}
									}
									$conn->close();
								?>
								<form action="certificate.php" method="post">
									<strong>It's your name?</strong><br>
									<input type="text" class="form-control" name="namadisable" disabled="yes" value="<?php echo (isset($keyword))?$hasil:'your name will shown automatic';?>" >
									<input type="hidden" name="namacetak" value="<?php echo (isset($keyword))?$hasil:'your name will shown automatic';?>">
									<input id="get" type="submit" class="btn btn-primary" value="Get Certificate Now" name="certificate"></input>
								</form>
								<br><h4><strong>Notes:</strong> After certificate generated please save as file.jpg</h4>
								<span>https://github.com/ahmadbagwi/sertifikat-online</span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
