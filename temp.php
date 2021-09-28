<?php 
	require_once 'connection.php'; 

	$link = mysqli_connect($host, $user, $password, $database) or die("Ошибка " . mysqli_error($link));
    
    $query="SELECT ".$_POST['val_kkal'].", ".$_POST['val_carb'].", ".$_POST['val_prot'].", ".$_POST['val_fat']." FROM products WHERE name='".$_POST['nameProd']."'";
	$result = mysqli_query($link, $query) or die("Ошибка запроса" . mysqli_error($link));

	if($result)
	{
	    $row = mysqli_fetch_row($result); 
	    for ($i=0; $i<4; ++$i) $arr[$i] = $row[$i]; 
	}

	mysqli_close($link);
	
	echo json_encode($arr);

 ?>
