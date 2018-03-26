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
<img src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"/>
<br />
<?if(strlen($arResult["DETAIL_TEXT"])>0):?>
	<?echo $arResult["DETAIL_TEXT"];?>
<?else:?>
	<?echo $arResult["PREVIEW_TEXT"];?>
<?endif?>
<p><?=GetMessage('PROMO_PERIOD')?>: <span class="ps_date">СЃ <?=$arResult["FIELDS"]["DATE_ACTIVE_FROM"]?> РґРѕ <?=$arResult["FIELDS"]["DATE_ACTIVE_TO"]?></span></p>







