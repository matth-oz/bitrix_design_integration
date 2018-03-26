<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<div class="hd_header_area">
			<div class="hd_header">
				<table>
					<tr>
						<td rowspan="2" class="hd_companyname">
							<h1>
								<?$APPLICATION->IncludeComponent(
									"bitrix:main.include",
									"",
									Array(
										"AREA_FILE_SHOW" => "file",
										"AREA_FILE_SUFFIX" => "inc",
										"EDIT_TEMPLATE" => "",
										"PATH" => "/include/logo.php"
									)
								);?>
							</h1>
						</td>
						<td rowspan="2" class="hd_txarea">
							<span class="tel">
							<?if(date('H') >= 9 && date('H') < 18):?>
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/include/phone.php"
								)
							);?>
							<?else:?>														
							<?$APPLICATION->IncludeComponent(
								"bitrix:main.include",
								"",
								Array(
									"AREA_FILE_SHOW" => "file",
									"AREA_FILE_SUFFIX" => "inc",
									"EDIT_TEMPLATE" => "",
									"PATH" => "/include/email.php"
								)
							);?>
							<?endif;?>
							</span>	<br/>	
							<?=GetMessage('WORKING_TIME');?>: <span class="workhours">ежедневно с 9-00 до 18-00</span>						
						</td>
						<td style="width:232px">
							<?$APPLICATION->IncludeComponent(
								"bitrix:search.form",
								"search_form",
								Array(
									"PAGE" => "#SITE_DIR#search/index.php",
									"USE_SUGGEST" => "N"
								)
							);?>
						</td>
					</tr>
					<tr>
						<td style="padding-top: 11px;">						
						<?$APPLICATION->IncludeComponent(
							"bitrix:system.auth.form", 
							"auth", 
							array(
								"FORGOT_PASSWORD_URL" => "/user/",
								"PROFILE_URL" => "/user/profile.php",
								"REGISTER_URL" => "/user/registration.php",
								"SHOW_ERRORS" => "N",
								"COMPONENT_TEMPLATE" => "auth"
							),
							false
						);?>
						</td>
					</tr>
				</table>
<?$APPLICATION->IncludeComponent(
	"bitrix:menu", 
	"top_multi", 
	array(
		"ALLOW_MULTI_SELECT" => "N",
		"CHILD_MENU_TYPE" => "left",
		"DELAY" => "N",
		"MAX_LEVEL" => "3",
		"MENU_CACHE_GET_VARS" => array(
		),
		"MENU_CACHE_TIME" => "3600",
		"MENU_CACHE_TYPE" => "A",
		"MENU_CACHE_USE_GROUPS" => "Y",
		"ROOT_MENU_TYPE" => "top",
		"USE_EXT" => "N",
		"COMPONENT_TEMPLATE" => "top_multi"
	),
	false
);?>
			</div>
		</div>