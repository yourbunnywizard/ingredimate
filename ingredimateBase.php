<?php require('headfile.php'); ?>     

        <div class="row">

            <div class="col-lg-12">
                <div class="headTitle">
                    <h1>База ингредиентов</h1>
                    <p>Выбери категорию или введи название в поле поиска</p>
                </div>                    
            </div>            

            <?php require('search-fragment.php'); ?>
        
        </div>
    </div>   
    
</header>

<div class="loadBox">
    <div class=" hideing" id="spinLoad">
        <p>Формируем пиксели на экране, секундочку</p>
        <div class="animatePict"></div>
    </div>
</div>   

<section class="dynamicPage" id="dynamicPage"> 
    
<?php   	

	require_once 'connection.php'; 

    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));

   	$query ="SELECT name, image, linkname FROM products ORDER BY name";
  	$result = mysqli_query($link, $query) or die("Ошибка запроса" . mysqli_error($link)); 

?>

	<div class="switchInfo" id="switchInfo">
		<div class="container">
			<div class="row">		
				<div class="switchInfo-btns">						
					<button class="switchInfo-btn active" id="switchInfo__btn-100">Все</button>
					<button class="switchInfo-btn" id="switchInfo__btn-full">Фрукты</button>
					<button class="switchInfo-btn" id="switchInfo__btn-full">Овощи</button>
					<button class="switchInfo-btn" id="switchInfo__btn-full">Крупы</button>					
				</div>				
			</div>
		</div>
	</div>


    <div class="ingredList">
    	<div class="container">
    		<div class="row">				
				<?php 
					$rows = mysqli_num_rows($result); // количество полученных строк

				    for ($i = 0 ; $i < $rows ; ++$i)
				    {
				        $row = mysqli_fetch_row($result);	
				        echo '<div class="col-lg-3">
								<div class="ingredItem" onclick="updateDataProd(';echo "'".$row[2]."'"; echo ')">
									<div class="ingredItem-img"><img src="img/'.$row[1].'" alt="'.$row[1].'">
									</div>
								<div class="ingredItem-title">'.$row[0].'</div>
								</div>
							</div>';      
					}
				 ?>												
    		</div>
    	</div>
    </div>


<?php 

	mysqli_close($link);

?>
</section>


<?php require('footer.php'); ?>