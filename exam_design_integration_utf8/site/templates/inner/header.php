<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
IncludeTemplateLangFile(__FILE__);
?>
<!DOCTYPE HTML>
<html lang="<?=LANGUAGE_ID?>">
<head>
	<meta charset="<?=LANG_CHARSET?>">
	<?$APPLICATION->ShowHead();?>
	<title><?$APPLICATION->ShowTitle()?></title>	
	<?
	$APPLICATION->SetAdditionalCSS('/bitrix/templates/.default/template_styles.css');
	$APPLICATION->AddHeadScript('/bitrix/templates/.default/js/jquery-1.8.2.min.js');
	$APPLICATION->AddHeadScript('/bitrix/templates/.default/js/slides.min.jquery.js');
	$APPLICATION->AddHeadScript('/bitrix/templates/.default/js/jquery.carouFredSel-6.1.0-packed.js');
	$APPLICATION->AddHeadScript('/bitrix/templates/.default/js/functions.js');	
	?>
	
	<link rel="shortcut icon" href="/bitrix/templates/.default/favicon.ico">
	
	<!--[if gte IE 9]><style type="text/css">.gradient {filter: none;}</style><![endif]-->
</head>
<body>
	<?$APPLICATION->ShowPanel();?>
	<div class="wrap">
		<?include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/templates/.default/include/header.php');?>
		
		<!--- // end header area --->
		
		<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", "breadcrumbs", Array(
	"PATH" => "",	// Путь, для которого будет построена навигационная цепочка (по умолчанию, текущий путь)
		"SITE_ID" => "s1",	// Cайт (устанавливается в случае многосайтовой версии, когда DOCUMENT_ROOT у сайтов разный)
		"START_FROM" => "0",	// Номер пункта, начиная с которого будет построена навигационная цепочка
	),
	false
);?>
		<div class="main_container page">
			<div class="mn_container">
				<div class="mn_content">
					<div class="main_post">
						<div class="main_title">
							<p class="title"><?$APPLICATION->ShowTitle(false);?> <?$APPLICATION->ShowViewContent('rating')?></p>
						</div>