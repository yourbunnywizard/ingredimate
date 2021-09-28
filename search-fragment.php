<?php require_once 'connection.php'; ?>   

            <div class="col-lg-12">
                <div class="searchBox">
                    <div id="content"></div>
                    <input type="text" list="ingredientsList" class="searchBox-inp" placeholder="Ну допустим, ананас">
                
<?php

    $link = mysqli_connect($host, $user, $password, $database) 
        or die("Ошибка " . mysqli_error($link));

    $query ="SELECT name, linkName FROM products";
    $result = mysqli_query($link, $query) or die("Ошибка " . mysqli_error($link)); 
if($result)
{
    $rows = mysqli_num_rows($result); // количество полученных строк

    echo '<datalist id="ingredientsList">';
   
    for ($i = 0 ; $i < $rows ; ++$i)
    {
        $row = mysqli_fetch_row($result);        
        echo '<option value="'.$row[0].'" id="'.$row[1].'"></option>';          
    }
    echo '</datalist> ';
    // очищаем результат
    mysqli_free_result($result);
}
  
mysqli_close($link);

?>
                           
                    
                    <button class="searchBox-btn" id="searchBox-btn">Поехали</button>
                </div>
            </div>