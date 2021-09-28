$(document).ready(function(){
	$(function(){
		$('#searchBox-btn').click(function (e) {
			e.preventDefault();	
			updateData();				
		});

		$('.searchBox-inp').keydown(function(e) {
   			if(e.keyCode == 13) {
      			updateData();
    		}
  		});



  		$('#switchInfo__btn-100').addClass('active');
  		$('#switchInfo__btn-all').addClass('active');

		$('.prodval button').click(function(){
			if($(this).hasClass('active') != true ) {

				$(this).addClass('active');

				if ($(this).attr('id')=='switchInfo__btn-100') { 
					$('#switchInfo__btn-full').removeClass('active');
					prodValFunc('kkal100','carb100','prot100','fat100'); 					
				}
					else if ($(this).attr('id')=='switchInfo__btn-full') { 
						$('#switchInfo__btn-100').removeClass('active');
						prodValFunc('kkal','carb','prot','fat'); 
					}
			}	
		});

	});
});


function updateData () {

	$('#spinLoad').addClass('loading');	
	$('#dynamicPage').html('');

	var nameProd = $('#ingredientsList option[value="' + $('.searchBox-inp').val() + '"]').attr('id');
	console.log('id = ' + nameProd);

	$.ajax({

		type: 'POST',
		url: 'dynamic-page.php',
		data: 'linkName='nameProd,
		success: function(data) {
			$('#spinLoad').removeClass('loading');
			$('#dynamicPage').html(data);			
		}
	});				
}


function updateDataProd(linkN) {
	$('#spinLoad').addClass('loading');	
	$('#dynamicPage').html('');
	
	$.ajax({
		type: 'POST',
		url: 'dynamic-page.php',
		data: 'linkName=' + linkN,
		success: function(data) {
			$('#spinLoad').removeClass('loading');
			$('#dynamicPage').html(data);			
		}
	});	
}

function prodValFunc(val_kkal, val_carb, val_prot, val_fat) {

	var nameProd = $('.infoCard .nameProd>h2').text();
	$.ajax({
		type: 'POST',
		url: 'temp.php',
		data: 'val_kkal=' + val_kkal + '&val_carb=' + val_carb + '&val_prot=' + val_prot + '&val_fat=' + val_fat + '&nameProd=' + nameProd,
		dataType: 'json',
		success: function(data) {
			for(var i = 0; i < 4; i++){
				$('#dynamicPage .infoCard .valueProd .valueProd-stat:nth-child(' + (i+1) + ') span').html(data[i]);
			}
		}
	});	
}


