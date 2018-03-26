<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?if (!empty($arResult)):?>
<div class="nv_topnav">
<ul>

<?
$previousLevel = 0;
foreach($arResult as $arItem):?>

	<?if ($previousLevel && $arItem["DEPTH_LEVEL"] < $previousLevel):?>
		<?=str_repeat("</ul></li>", ($previousLevel - $arItem["DEPTH_LEVEL"]));?>
	<?endif?>

	<?if ($arItem["IS_PARENT"]):?>

		<?if ($arItem["DEPTH_LEVEL"] == 1):?>
			<li><a href="<?=$arItem["LINK"]?>"<?if(isset($arItem['PARAMS']['CSS_CLASS'])):?> class="<?=$arItem['PARAMS']['CSS_CLASS']?>"<?endif?><?if(isset($arItem['PARAMS']['IMG'])):?> class="menu-img-fon" style="background-image: url(<?=$arItem['PARAMS']['IMG']?>);"<?endif?>><span><?=$arItem["TEXT"]?></span></a>
				<ul>
				<?if(!empty($arItem["PARAMS"]["MENU_ITM_TEXT"])):?>
					<div class="menu-text"><?=$arItem["PARAMS"]["MENU_ITM_TEXT"]?></div>
				<?endif?>
		<?else:?>
			<li><a href="<?=$arItem["LINK"]?>"<?if(isset($arItem['PARAMS']['CSS_CLASS'])):?> class="<?=$arItem['PARAMS']['CSS_CLASS']?>"<?endif?>><?=$arItem["TEXT"]?></a>
				<ul>
				<?if(!empty($arItem["PARAMS"]["MENU_ITM_TEXT"])):?>
					<div class="menu-text"><?=$arItem["PARAMS"]["MENU_ITM_TEXT"]?></div>
				<?endif?>
		<?endif?>

	<?else:?>

		<?if ($arItem["PERMISSION"] > "D"):?>

			<?if ($arItem["DEPTH_LEVEL"] == 1):?>
				<li><a href="<?=$arItem["LINK"]?>"<?if(isset($arItem['PARAMS']['CSS_CLASS'])):?> class="<?=$arItem['PARAMS']['CSS_CLASS']?>"<?endif?><?if(isset($arItem['PARAMS']['IMG'])):?> class="menu-img-fon" style="background-image: url(<?=$arItem['PARAMS']['IMG']?>);"<?endif?>><span><?=$arItem["TEXT"]?></span></a></li>
			<?else:?>
				<li><a href="<?=$arItem["LINK"]?>"<?if(isset($arItem['PARAMS']['CSS_CLASS'])):?> class="<?=$arItem['PARAMS']['CSS_CLASS']?>"<?endif?>><?=$arItem["TEXT"]?></a></li>
			<?endif?>

		<?endif?>

	<?endif?>

	<?$previousLevel = $arItem["DEPTH_LEVEL"];?>

<?endforeach?>

<?if ($previousLevel > 1)://close last item tags?>
	<?=str_repeat("</ul></li>", ($previousLevel-1) );?>
<?endif?>
<div class="clearboth"></div>
</ul>
</div>
<?endif?>