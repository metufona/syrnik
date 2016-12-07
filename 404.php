<?
if ($_SERVER['DOCUMENT_URI'] == "/404.php") {
 $_SERVER['REQUEST_URI'] = $_SERVER['DOCUMENT_URI'];
}
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');
CHTTP::SetStatus('404 Not Found');
@define('ERROR_404', 'Y');

include($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("Страница не найдена");
?><p>
	 Ошибка 404. Нет такой страницы
</p>
<?$APPLICATION->IncludeComponent(
	"bitrix:main.map", 
	".default", 
	array(
		"CACHE_TIME" => "36000000",
		"CACHE_TYPE" => "A",
		"COL_NUM" => "2",
		"COMPONENT_TEMPLATE" => ".default",
		"LEVEL" => "2",
		"SET_TITLE" => "N",
		"SHOW_DESCRIPTION" => "N"
	),
	false
);?><?include($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>