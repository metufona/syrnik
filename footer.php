<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
IncludeTemplateLangFile(__FILE__);
?>	

</div>
</div>

	<footer>
		<div class="f-respond">
			<div class="container">
				<div class="row">
					<form action="">
						<div class="col5">
							<div class="f-respond_txt">Узнавайте первыми о выгодных предложениях и получайте личные рекомендации!</div>
						</div>

						<div class="col4 text-right">
							<input type="text">
						</div>

						<div class="col3">
							<button class="f-respond_btn">Подписаться</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		<div class="footer">
			<div class="container">
				<div class="row">
					<div class="col4">
						<div class="footer_i">
							<a href="/"><img src="<?=SITE_TEMPLATE_PATH?>/images/bottom-logo.png" alt=""></a>
						</div>

						<div class="footer_i">
							+7 (812) 710-88-51 <br>
							+7 (495) 792-39-67
						</div>
						<div class="footer_i">
							Санкт-Петербург: info@raudentall.ru <br>
							Москва: msk@raudentall.ru
						</div>
						<div class="footer_i">
							<a href="#" class="footer_social">
								<i class="vk-ico"></i>
							</a>
							<a href="#" class="footer_social">
								<i class="fb-ico"></i>
							</a>
							<a href="#" class="footer_social">
								<i class="insta-ico"></i>
							</a>
						</div>
					</div>

					<div class="col4">
						<?$APPLICATION->IncludeComponent("bitrix:menu", "menubottom",
						Array(
							"ROOT_MENU_TYPE" => "bottom",
							"MENU_CACHE_TYPE" => "A",	// Тип кеширования
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							"MAX_LEVEL" => "2",	// Уровень вложенности меню
							"CHILD_MENU_TYPE" => "Нижнее меню",	// Тип меню для остальных уровней
							"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"COMPONENT_TEMPLATE" => "main"
						),
						false
					);?>
					</div>
<?$APPLICATION->IncludeComponent("bitrix:menu", "menubottom",
						Array(
							"ROOT_MENU_TYPE" => "top",
							"MENU_CACHE_TYPE" => "A",	// Тип кеширования
							"MENU_CACHE_TIME" => "3600",	// Время кеширования (сек.)
							"MENU_CACHE_USE_GROUPS" => "Y",	// Учитывать права доступа
							"MENU_CACHE_GET_VARS" => "",	// Значимые переменные запроса
							"MAX_LEVEL" => "2",	// Уровень вложенности меню
							"CHILD_MENU_TYPE" => "Нижнее меню",	// Тип меню для остальных уровней
							"USE_EXT" => "N",	// Подключать файлы с именами вида .тип_меню.menu_ext.php
							"DELAY" => "N",	// Откладывать выполнение шаблона меню
							"ALLOW_MULTI_SELECT" => "N",	// Разрешить несколько активных пунктов одновременно
							"COMPONENT_TEMPLATE" => "main"
						),
						false
					);?>
					<div class="col4">
						
					</div>
				</div>
			</div>
		</div>
	</footer>

</div>

				
</body>
</html>					
					
					