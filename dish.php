<?php require('headfile.php'); ?>

    
</header>

<?php 
    $linkDish = $_GET['linkDish'];

    require_once 'connection.php'; 

    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));

    $query ="SELECT * FROM dish WHERE id=".$linkDish;
    $result = mysqli_query($link, $query) or die("Ошибка запроса" . mysqli_error($link)); 

    if($result)
    {
        $row = mysqli_fetch_row($result);  
    }
?>



<section class="dishBlock" id="dishBlock"> 
    <div class="container">
        <div class="row">
            <div class="dishInfo">
                <h1><?php echo $row[1]; ?></h1>
                <img src="img/<?php echo $row[11]; ?>" alt="<?php echo $row[11]; ?>">
                <div class="shortInfo">
                    <h3>Энергетическая ценность на порцию</h3>
                    <div class="valueProd">
                        <div class="valueProd-stat kkal">
                            <span>Калорийность</span>
                            <h4><?php echo $row[2]; ?></h4>
                            <span>Ккал</span>
                        </div>
                        <div class="valueProd-stat prot">
                            <span>Белки</span>
                            <h4><?php echo $row[4]; ?></h4>
                            <span>Грамм</span>         
                        </div>
                        <div class="valueProd-stat fat">
                            <span>Жиры</span>
                            <h4><?php echo $row[5]; ?></h4>
                            <span>Грамм</span> 
                        </div>
                        <div class="valueProd-stat carb">
                            <span>Углеводы</span>
                            <h4><?php echo $row[3]; ?></h4>
                            <span>Грамм</span> 
                        </div>
                    </div>
                </div>

                <div class="ingredimateInfo">
                    <h3>Ингредиенты</h3>
                    <?php echo $row[9]; ?>
                </div>

                <div class="instructionDish">
                    <h2>Инструкция прготовления</h2>
                    <span>Время <?php echo $row[6]; ?> - минут</span>
                    <?php echo $row[10]; ?>
                </div>
            </div>
        </div>
    </div>

</section>

 
<?php require('footer.php'); ?>