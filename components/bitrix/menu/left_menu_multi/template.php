<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult)) return;

if($section_php = $APPLICATION->GetFileRecursive(".section.php")) 
{ 
   @include($_SERVER['DOCUMENT_ROOT'].$section_php);
}
$title_str=$sSectionName;

$arMenu = array();
$first = true;

foreach($arResult as $itemIndex => $arItem)
{
	if ($arItem["PERMISSION"] > "D" && $arItem["DEPTH_LEVEL"] < 3)
	{
		$className = 'level'.$arItem["DEPTH_LEVEL"];
		if ($first) {$className .= ' first-item'; $first = false; if ($arItem['PARAMS']['TITLE']!='') {$title_str=$arItem['PARAMS']['TITLE'];}}
		if ($arItem['SELECTED']) {$className .= ' selected';}
		
		$arItem['CLASS'] = $className;
		$arMenu[] = $arItem;
	}
}

if (empty($arMenu)) return;

$arMenu[count($arMenu)-1]['CLASS'] .= ' last-item';
?>
				<div class="aside-module multi">
					<div class="inner">		
						<?if ($title_str!=''):?> <div class="header">Каталог</div><?endif;?>
						<ul id="left-menu" class="left-menu">
<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li class="<?if ($arItem["SELECTED"]):?>selected open<?endif;?>"><span><i class="fa fa-caret-left" aria-hidden="true"></i></span><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="root-item level2">
		<?elseif ($arItem["DEPTH_LEVEL"] == 2):?>
			<li class="<?if ($arItem["SELECTED"]):?>selected open<?endif;?>"><span><i class="fa fa-caret-left" aria-hidden="true"></i></span><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="level3">
		<?else:?>
			<li class="<?if ($arItem["SELECTED"]):?>selected open<?endif;?>"><span><i class="fa fa-caret-left" aria-hidden="true"></i></span><a href="<?=$arItem["LINK"]?>" class="parent<?if ($arItem["SELECTED"]):?> item-selected<?endif?>"><?=$arItem["TEXT"]?></a>
				<ul class="level4">		
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if ($arItem["SELECTED"]):?>open<?endif;?>"><a href="<?=$arItem["LINK"]?>" class="<?if ($arItem["SELECTED"]):?>selected<?else:?>root-item<?endif?>"><?=$arItem["TEXT"]?></a></li>
			<?elseif ($arItem["DEPTH_LEVEL"] == 2):?>
				<li class="<?if ($arItem["SELECTED"]):?>open<?endif;?>"><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><?=$arItem["TEXT"]?></a></li>
			<?elseif ($arItem["DEPTH_LEVEL"] == 3):?>
				<li class="<?if ($arItem["SELECTED"]):?>open<?endif;?>"><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><?=$arItem["TEXT"]?></a></li>
				<?else:?>
				<li class="<?if ($arItem["SELECTED"]):?>open<?endif;?>"><a href="<?=$arItem["LINK"]?>" <?if ($arItem["SELECTED"]):?> class="item-selected"<?endif?>><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?else:?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li class="<?if ($arItem["SELECTED"]):?>open<?endif;?>"><a href="" class="<?if ($arItem["SELECTED"]):?>selected<?else:?>root-item<?endif?>" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?elseif ($arItem["DEPTH_LEVEL"] == 2):?>
				<li class="<?if ($arItem["SELECTED"]):?>open<?endif;?>"><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?else:?>
			<li class="<?if ($arItem["SELECTED"]):?>open<?endif;?>"><a href="" class="denied" title="<?=GetMessage("MENU_ITEM_ACCESS_DENIED")?>"><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>
						</ul>
					</div>
				</div>
				 <script type="text/javascript">
        $(document).ready(function () {
			
			$('ul.left-menu > li').each(function(){
					var list = $(this).find('li > a.item-selected');
					if(list.length > 0) {
						$(this).addClass("selected");
						$(this).addClass("open");
					}
			});
			$('ul.left-menu ul.level2 > li').each(function(){
					var list = $(this).find('li > a.item-selected');
					if(list.length > 0) {
						$(this).addClass("selected");
						$(this).addClass("open");
					}
			});
			$('ul.left-menu ul.level3 > li').each(function(){
					var list = $(this).find('li > a.item-selected');
					if(list.length > 0) {
						$(this).addClass("selected");
						$(this).addClass("open");
					}
			});
			$('#left-menu span').on('click', function(){
		var element = $(this).parent('li');
		if (element.hasClass('open')) {
			element.removeClass('open');
			element.find('li').removeClass('open');
			element.find('ul').slideUp();
		}
		else {
			element.addClass('open');
			element.children('ul').slideDown();
			element.siblings('li').children('ul').slideUp();
			element.siblings('li').removeClass('open');
			element.siblings('li').find('li').removeClass('open');
			element.siblings('li').find('ul').slideUp();
		}
	});
	
    });
    </script>