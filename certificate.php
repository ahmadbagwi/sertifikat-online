<?php
	$nama = $_POST['nama'];
	if (empty($nama)) {
		$gambar = "./1.jpg";
	}
		else {
		$gambar = "./xyz123.jpg";
	}
	$image = imagecreatefromjpeg($gambar);
	$white = imageColorAllocate($image, 255, 255, 255);
	$black = imageColorAllocate($image, 0, 0, 0);
	$font = "./QuinchoScript_PersonalUse.ttf";
	$size = 42;
	//definisikan panjang dan lebar gambar
	$image_width = imagesx($image);  
	$image_height = imagesy($image);
	//membuat textbox agar text centered
	$text_box = imagettfbbox($size,0,$font,$nama);
	$text_width = $text_box[2]-$text_box[0]; // lower right corner - lower left corner
	$text_height = $text_box[3]-$text_box[1];

	$x = ($image_width/2) - ($text_width/2);
	$y = ($image_height/2) - ($text_height/2);

	imagettftext($image, $size, 0, $x, $y, $black, $font, $nama);
	//tampilkan di browser
	header("Content-type:  image/jpeg");
	imagejpeg($image);
	imagedestroy($image);
?>


