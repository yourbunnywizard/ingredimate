<?php 
	$client  = @$_SERVER['HTTP_CLIENT_IP'];
	$forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
	$remote  = @$_SERVER['REMOTE_ADDR'];


	echo '$client:'.$client.'<br>$forward:'.$forward.'<br>$remote:'.$remote;
?>

