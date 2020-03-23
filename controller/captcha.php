<?php  

	session_start();
	function acakCaptcha(){
		$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
		$pass = array(); 

		$panjangAlpha = strlen($alphabet) - 2; 
   		for ($i = 0; $i < 5; $i++) {
	        $n = rand(0, $panjangAlpha);
	        $pass[] = $alphabet[$n];
    	}
    	 return implode($pass); 

	}

	$code = acakCaptcha();
	$_SESSION["code"] = $code;
 
	//lebar dan tinggi captcha
	$wh = imagecreatetruecolor(173, 50);
	 
	//background color biru
	$bgc = imagecolorallocate($wh, 22, 86, 165);
	 
	//text color abu-abu
	$fc = imagecolorallocate($wh, 223, 230, 233);
	imagefill($wh, 0, 0, $bgc);
	 
	//( $image , $fontsize , $string , $fontcolor )
	imagestring($wh, 10, 50, 15,  $code, $fc);
	 
	//buat gambar
	header('content-type: image/jpg');
	imagejpeg($wh);
	imagedestroy($wh);

?>