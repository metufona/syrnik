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
<div class="news">
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?foreach($arResult["ITEMS"] as $arItem):?>
	<?
	$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
	$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
	?>
		<div class="news-item" id="<?=$this->GetEditAreaId($arItem['ID']);?>">
			<div class="news-date-time text-orange"><?if($arParams["DISPLAY_DATE"]!="N" && $arItem["DISPLAY_ACTIVE_FROM"]):?>
					<?echo $arItem["DISPLAY_ACTIVE_FROM"]?>
				<?endif?></div>
			
				<div class="news-title"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>"><b><?echo $arItem["NAME"]?></b></a></div>
				
				
			
			
				
				
						
					
				<div class="news-announce">
				
					<?echo $arItem["PREVIEW_TEXT"];?></div>
				
				
				<div class="text-right"><a href="<?echo $arItem["DETAIL_PAGE_URL"]?>" class="more">Подробнее<i class="fa fa-angle-right" aria-hidden="true"></i></a></div>
			
		</div>
<?endforeach;?>

<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><div class="news-navigation"><?=$arResult["NAV_STRING"]?></div><br />
<?endif;?>

</div>
