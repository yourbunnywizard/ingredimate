<?php require('headfile.php'); ?>

        <div class="row">

            <div class="col-lg-12">
                <div class="headTitle">
                    <h1>Справочник по ингредиентам планеты Земля</h1>
                    <p>Просто введи название и нажми “Enter”</p>
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

</section>

 
<?php require('footer.php'); ?>