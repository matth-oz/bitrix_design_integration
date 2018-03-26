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
$this->setFrameMode(true);?>

<form action="<?=$arResult["FORM_ACTION"]?>">
    <div class="hd_search_form" style="float:right;">
        <input placeholder="Поиск" type="text" name="q" value="" size="15" maxlength="50" />
        <input type="submit" name="s" value=""/>
    </div>
</form>