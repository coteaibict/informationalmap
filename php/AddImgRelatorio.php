<?php

	define('UPLOAD_DIR', getcwd().'/../RelatorioIMGs');
	//Get the base-64 string from data
	$img = str_replace('data:image/png;base64,', '', $_POST["img"]);

	$img = str_replace(' ', '+', $img); 

	$data = base64_decode($img);

	$file = UPLOAD_DIR ."/". uniqid() . '.png';
	
	$success = file_put_contents($file, $data);

	print $success ? $file : 'Unable to save the file.';
?>