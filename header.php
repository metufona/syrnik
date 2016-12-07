<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile($_SERVER["DOCUMENT_ROOT"]."/bitrix/templates/".SITE_TEMPLATE_ID."/header.php");
?>
<!DOCTYPE html>
<html xml:lang="<?=LANGUAGE_ID?>" lang="<?=LANGUAGE_ID?>">

<head>
<title><?$APPLICATION->ShowTitle()?></title>
<link rel="shortcut icon" type="image/x-icon" href="<?=SITE_TEMPLATE_PATH?>/favicon.ico">
	
<!-- Fonts -->
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

	
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="user-scalable=no, initial-scale=1.0, maximum-scale=1.0, width=device-width">

<?	
	//CJSCore::Init(array("jquery")); //1.8.3
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.js"); //1.12.0
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/jquery.mobile.custom.js");
	$APPLICATION->SetAdditionalCSS("/bitrix/css/main/font-awesome.css");
	
	//Bootstrap
	
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/bootstrap.js");
	
	//Fancybox
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH.'/fb/jquery.fancybox.css?v=2.1.5');
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/fb/jquery.fancybox.pack.js?v=2.1.5");	

	//Slick
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/slick/slick.js");
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/slick/slick.css");	
	//Site script
	$APPLICATION->AddHeadScript(SITE_TEMPLATE_PATH."/js/main.js");
	
	$APPLICATION->SetAdditionalCSS(SITE_TEMPLATE_PATH."/css/style.css");	
	
	$APPLICATION->ShowHead();
	
	if (!$USER->IsAuthorized()) { CJSCore::Init(array('ajax', 'json')); }  
?>

<!--[if lt IE 9]>
	<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
	<script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
<![endif]-->

</head>

<body>

<?
$curPage = $APPLICATION->GetCurPage();
$fpage = false;
if ($curPage=='/') {$fpage=true;}

$no_left_col = false;
if ($APPLICATION->GetProperty('no_left_col')=='Y') {$no_left_col = true;}
if ($fpage) {$no_left_col=true;}

?>

<?$APPLICATION->ShowPanel();?>
<div class="wrapper">
	<header>
	<div class="container">
			<div class="topline clear">
				<div class="topline_logobox pull-left">
					<a href="index.html"><img src="<?=SITE_TEMPLATE_PATH?>/images/top-logo.png" alt="Рауденталл"></a>
				</div>

				
				<div class="topline_right clear">
					<div class="topline_phonebox pull-left">
						<i class="phone-ico"></i>
						<span class="topline_phonebox-n">+7 (812) 710-88-51, +7 (495) 792-39-67</span>
						<div class="topline_phonebox-wt">10:00 – 18:00 пн-пт</div>
					</div>
					
					<div class="topline_userbox pull-left">
					
						<!-- 
							####### БЛОК АВТОРИЗОВАННОГО ПОЛЬЗОВАТЕЛЯ ########
						-->
						<!-- <div class="topline_userbox-logged">
							<i class="user-ico"></i>
							<a href="#" class="topline_user">Александр</a>
							<a href="#" class="topline_logout">Выход</a>
						</div> -->
					
						<div class="topline_userbox-login">
						<!--Поставить вход-->
							<i class="login-ico"></i>
							<a href="#login-popup" class="open-popup">Вход</a>
							/
							<a href="#register-popup" class="open-popup">Регистрация</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<nav class="topnav">
			<div class="container">
				<div class="topnav_w pull-left">
				<?$APPLICATION->IncludeComponent(
							"bitrix:menu", 
							"main", 
							array(
								"ROOT_MENU_TYPE" => "top",
								"MENU_CACHE_TYPE" => "A",
								"MENU_CACHE_TIME" => "3600",
								"MENU_CACHE_USE_GROUPS" => "Y",
								"MENU_CACHE_GET_VARS" => array(
								),
								"MAX_LEVEL" => "2",
								"CHILD_MENU_TYPE" => "left",
								"USE_EXT" => "N",
								"DELAY" => "N",
								"ALLOW_MULTI_SELECT" => "N",
								"COMPONENT_TEMPLATE" => "main-mst"
							),
							false
						);?>	
				</div>

				<div class="topnav_ctrls pull-left">
				<!--Поставить корзину-->
					<button class="topnav_srch-btn"><i class="search-ico"></i></button>
					<a href="cart.html" class="topnav_ctrls-cart">
						<i class="cart-ico"></i>
						<span class="topnav_ctrls-cart-count">99</span>
					</a>
				</div>
			</div>
		</nav>
	</header>
	
	<div class="page">
	<?if (!$fpage):?>
		<div class="crumbs">
			<div class="container">
				<div class="row">
					<div class="col12">
						<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb", 
	"breadcrumbs", 
	array(
		"COMPONENT_TEMPLATE" => "breadcrumbs2",
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "s1"
	),
	false
);?>
					</div>
				</div>
			</div>
		</div>	
		<?endif;?>
	
	



		<div class="container clear">
		
			<?if (!$fpage): ?><h1><?$APPLICATION->ShowTitle(false)?></h1> 	<?endif;?>