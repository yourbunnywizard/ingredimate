<?php 

	$linkName='';
	if($_POST['linkName']) 
		{
			$linkName = $_POST['linkName'];
		} 
		else 
			{
				$linkName = null;
			}

	require_once 'connection.php'; 

    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));

    $query ="SELECT * FROM products WHERE linkName='".$linkName."'";
    $result = mysqli_query($link, $query) or die("Ошибка запроса" . mysqli_error($link)); 

	if($result)
	{
	    $row = mysqli_fetch_row($result);             
	   	if($row[3] == 1) {
	   		$classProd = 'Фрукт';
	   	}
	   		else {
	   			$classProd = 'Овощ';
	   		}
	}
?>

<script src="js/alljs.js"></script>

	<div class="switchInfo" id="switchInfo">
		<div class="container">
			<div class="row">
				<div class="col-lg-4 ml-auto mr-auto">
					<div class="prodval switchInfo-btns">						
						<button class="switchInfo-btn active" id="switchInfo__btn-100">100 грамм</button>
						<button class="switchInfo-btn" id="switchInfo__btn-full">Целиком</button>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="container">
		<div class="infoCard">
			<div class="row">
				<div class="col-lg-6">
					<div class="nameProd">

						<h2><?php echo $row[1]; ?></h2>
						<span><?php echo $classProd; ?></span>
					</div>

					<div class="valueProd">
						<div class="valueProd-stat kkal">
							<h3>Калорий</h3>
							<span><?php echo $row[11]; ?></span>
						</div>
						<div class="valueProd-stat carb">
							<h3>Углеводов</h3>
							<span><?php echo $row[5]; ?></span>
						</div>
						<div class="valueProd-stat prot">
							<h3>Белков</h3>
							<span><?php echo $row[7]; ?></span>
						</div>
						<div class="valueProd-stat fat">
							<h3>Жиров</h3>
							<span><?php echo $row[9]; ?></span>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<img src="img/<?php echo $row[14]; ?>" alt="<?php echo $row[14]; ?>" class="imgProd">
				</div>
				<div class="textInfo">
					<div class="col-lg-12">
						<h2>История</h2>
						<p><?php echo $row[12]; ?></p>
					</div>
					<div class="col-lg-12">
						<h2>Как выбрать</h2>
						<p><?php echo $row[13]; ?></p>
					</div>
				</div>
				
			</div>
		</div>
	</div>




<div class="recepts">
	<div class="switchInfo" id="switchInfo">
		<div class="container">
			<div class="row">	
				<div class="col-lg-12">
					<h1>Рецепты с <?php echo $row[1]; ?></h1>
				</div>		
				<div class="recepts switchInfo-btns">						
					<button class="switchInfo-btn active" id="switchInfo__btn-all">Все</button>
					<button class="switchInfo-btn" id="switchInfo__btn-first">Основное</button>
					<button class="switchInfo-btn" id="switchInfo__btn-salt">Салаты</button>
					<button class="switchInfo-btn" id="switchInfo__btn-zak">Закуски</button>
					<button class="switchInfo-btn" id="switchInfo__btn-des">Десерты</button>
				</div>				
			</div>
		</div>
	</div>
<?php 

	$prodID = $row[0];
	 // очищаем результат
	mysqli_free_result($result); 

    $query ="SELECT `dish`.`nameDish`, `dish`.`time`, `dish`.`portion`, `dish`.`image`, `dish`.`id` FROM `prod-dish` INNER JOIN `dish` ON `dish`.`id` = `prod-dish`.`dish_id` WHERE `prod-dish`.`product_id` =".$prodID;

    $result = mysqli_query($link, $query) or die("Ошибка запроса" . mysqli_error($link)); 

?>
	<div class="recepts-prev">
		<div class="container">
			<div class="row">
				
<?php 
	if($result)
	{
	    $rows = mysqli_num_rows($result); // количество полученных строк

	    for ($i = 0 ; $i < $rows ; ++$i)
	    {
	        $row = mysqli_fetch_row($result);	        
	        echo '<div class="col-lg-4 otstup">
					<a href="dish.php?linkDish='.$row[4].'">
						<div class="preview">
							<div class="preview-img">
								<img src="img/'.$row[3].'" alt="'.$row[3].'">
							</div>';
			echo '<div class="preview-info">
								<h4>'.$row[0].'</h4>
								<div class="info-det">
									<span class="time"><img src="clock.svg" alt="clock.svg"> '.$row[1].'минут</span>
									<span class="portion"><img src="portion2.svg" alt="portion2.svg"> '.$row[2].' порции</span>
								</div>
							</div>
						</div>
					</a>
				</div>';
	    }
	    
	    // очищаем результат
	    mysqli_free_result($result);
	}

 ?>
				

			</div>
		</div>
	</div>
</div>



<?php 

	    

	mysqli_close($link);

?>