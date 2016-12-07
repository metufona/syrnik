<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>

<ul class="topnav_list">
<li><a href="/"   class="menu-img-fon"  style="background-image: url(/bitrix/images/nv_home.png);" ><span></span></a></li>
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
<?endif?>

<?if ($arItem["IS_PARENT"]):?>

<?if ($arItem["DEPTH_LEVEL"] == 1):?>
	<li class="dropdown"><a href="<?=$arItem['LINK']?>" class="<?if ($arItem["SELECTED"]):?>active<?else:?>dropdown-toggle<?endif?>" data-toggle="dropdown" role="button" aria-expanded="false"><span><?=$arItem["TEXT"]?></span><!--<span class="caret"></span>--></a>
<ul class="dropdown-menu" role="menu">
<?else:?>
	<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>" class="parent">
		<span>
			<?echo $arItem["TEXT"];?>
		</span></a>
<ul>
<?endif?>

<?else:?>

<?if ($arItem["PERMISSION"] > "D"):?>

<?if ($arItem["DEPTH_LEVEL"] == 1):?>
	<li class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><a href="<?=$arItem["LINK"]?>"><span><?=$arItem["TEXT"]?></span></a></li>
<?else:?>
<li<?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><a href="<?=$arItem["LINK"]?>">
	<?echo $arItem["TEXT"];?>
</a></li>
<?endif?>

<?else:?>

<?if ($arItem["DEPTH_LEVEL"] == 1):?>
<li class="<?if ($arItem["SELECTED"]):?>root-item-selected<?else:?>root-item<?endif?>"><a href="" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
<?else:?>
	<li style="padding: 5px 0 5px 0px;"><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><span><?=$arItem["TEXT"]?></span></a></li>
<?endif?>

<?endif?>

<?endif?>

<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>

</ul>



<?endif?>

 <script type="text/javascript">
        $(document).ready(function () {
			
			$('li.dropdown').each(function(){
					var list = $(this).find('li.item-selected');
					if(list.length > 0) {
						$(this).addClass("root-item-selected");
						
					}
			});
			
			
			
	
    });
    </script>