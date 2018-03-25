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
<?foreach($arResult["ITEMS"] as $arItem):?>
<?
$this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
?>
<div class="sb_action">
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" alt="<?echo $arItem["NAME"]?>"/></a>
        <h4><?=GetMessage('PROMO')?></h4>
        <h5><a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a></h5>
        <?if(!empty($arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"])):?>
        <p style="text-align: right; margin:5px 0;font-size: 14px; font-weight: bold;"><?=GetMessage('PROMO_PRICE')?>:<?=$arItem["DISPLAY_PROPERTIES"]["PRICE"]["VALUE"]?></p>
        <?endif;?>        
        <a href="<?=$arItem["DETAIL_PAGE_URL"]?>" class="sb_action_more"><?=GetMessage('PROMO_DETAIL')?></a>
</div>
<?endforeach;?>
