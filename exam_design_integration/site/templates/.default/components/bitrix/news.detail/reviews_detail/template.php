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
<?//test_dump($arResult);?>
<div class="review-block">
	<div class="review-text">
		<div class="review-text-cont">
			<?=$arResult["DETAIL_TEXT"]?>			
		</div>
		<div class="review-autor">
			<?=$arResult["NAME"]?>, <?=$arResult["DISPLAY_PROPERTIES"]["AUTHORS_TITLE"]["DISPLAY_VALUE"]?>, <?=$arResult["DISPLAY_PROPERTIES"]["COMPANY_NAME"]["DISPLAY_VALUE"]?>.
		</div>
	</div>
	<div style="clear: both;" class="review-img-wrap">
			<?if(!empty($arResult["DETAIL_PICTURE"]["SRC"])):?>	
			<img			
			border="0"
			src="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>"
			width="<?=$arResult["DETAIL_PICTURE"]["WIDTH"]?>"
			height="<?=$arResult["DETAIL_PICTURE"]["HEIGHT"]?>"
			alt="<?=$arResult["DETAIL_PICTURE"]["ALT"]?>"
			title="<?=$arResult["DETAIL_PICTURE"]["TITLE"]?>"
			/>
			<?else:?>
			<img			
			border="0"
			src="<?=$templateFolder?>/img/no-photo.jpg"			
			/>
			<?endif;?>
	</div>
</div>

<?if(isset($arResult["DISPLAY_PROPERTIES"]["DOCS"])):?>
<div class="exam-review-doc">
<p><?=GetMessage("DOCS_PROP_TITLE");?></p>
<?foreach($arResult["DISPLAY_PROPERTIES"]["DOCS"]["DISPLAY_VALUE"] as $doc_link):?>
<div  class="exam-review-item-doc"><img class="rew-doc-ico" src="<?=$templateFolder?>/img/pdf_ico_40.png"><?=$doc_link?></div>
<?endforeach?>
</div>
<?endif;?>
<hr>
<a href="<?=$arResult["LIST_PAGE_URL"]?>" class="review-block_back_link"><?=GetMessage("BACK_TO_REVIEWS_LIST");?></a>