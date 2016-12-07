<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>

<div class="col-xs-12">


	
	<div id="slider-main" class="carousel slide" data-ride="carousel">
		
		<div class="carousel-inner" role="listbox">
		<?php $fc=' active'?>
		<?php foreach($arResult["ITEMS"] as $arItem): ?>	
	
		<?
		$bg='';
		if($arParams["DISPLAY_PICTURE"]!="N" && is_array($arItem["PREVIEW_PICTURE"])){
			$bg=' style="background:url('.$arItem["PREVIEW_PICTURE"]["SRC"].') no-repeat; background-size: cover;"';
			}
		?>
		
		<div class="item<?php echo $fc; $fc='';?>"<?=$bg?>> 	
	

		<?echo htmlspecialcharsBack($arItem["PREVIEW_TEXT"]);?>
		
		</div>	
		
		<?php endforeach; ?>
		
		
		
		<ol class="carousel-indicators">
		<?php $fc=' class="active"'; $n=0;?>
		<?php foreach($arResult["ITEMS"] as $arItem): ?>
		<li data-target="#slider-main" data-slide-to="<?php echo $n; $n=$n+1;?>"<?php echo $fc; $fc='';?>></li>
		<?php endforeach; ?>
		</ol>
		</div>
	  <script>
			var total = $('.item').length;
			var width = 100 / total;
			width = width + "%";
			$('.carousel-indicators li').css( "width", width );
			
			
		</script>
	  
	  <a class="left carousel-control" href="#slider-main" role="button" data-slide="prev">
		<span class="sr-only">Назад</span>
	  </a>
	  <a class="right carousel-control" href="#slider-main" role="button" data-slide="next">
		<span class="sr-only">Вперед</span>
	  </a>	
		
	</div>
   
 </div>
 <script>
  $(document).ready(function() {  
  		 $("#slider-main").swiperight(function() {  
    		  $(this).carousel('prev');  
	    		});  
		   $("#slider-main").swipeleft(function() {  
		      $(this).carousel('next');  
	   });  
	});  
</script>
			

					


	