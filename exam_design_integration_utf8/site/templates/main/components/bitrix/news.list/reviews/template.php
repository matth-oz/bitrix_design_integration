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

<script type="text/javascript" >
    $(document).ready(function(){

        $("#foo").carouFredSel({
            items:2,
            prev:'#rwprev',
            next:'#rwnext',
            scroll:{
                items:1,
                duration:2000
            }
        });
    });
</script>
<div class="rw_reviewed">
    <div class="rw_slider">
        <h4><?=GetMessage('REVIEWS')?></h4>
        <ul id="foo">
	        <?foreach($arResult["ITEMS"] as $arItem):?>
		        <?
		        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
		        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'], CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
		        ?>
                <li id="<?=$this->GetEditAreaId($arItem['ID']);?>">
                    <div class="rw_message">
						<?if(!empty($arItem["PREVIEW_PICTURE"]["SRC"])):?>
                        <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" class="rw_avatar" alt="<?=$arItem["PREVIEW_PICTURE"]["ALT"]?>"/>
						<?else:?>
						<img src="<?=$templateFolder.'/img/no-photo.jpg'?>" class="rw_avatar" />
						<?endif;?>
                        <span class="rw_name"><a href="<?=$arItem['DETAIL_PAGE_URL']?>"><?=$arItem["NAME"]?></a></span>
                        <span class="rw_job"><?=$arItem["DISPLAY_PROPERTIES"]['AUTHORS_TITLE']['VALUE']?> &laquo;<?=$arItem["DISPLAY_PROPERTIES"]['COMPANY_NAME']['VALUE']?>&raquo;</span>
                        <p>&laquo;<?=$arItem["PREVIEW_TEXT"]?>&raquo;</p>
                        <div class="clearboth"></div>
                        <div class="rw_arrow"></div>
                    </div>
                </li>
            <?endforeach?>
        </ul>
        <div id="rwprev"></div>
        <div id="rwnext"></div>
        <a href="/company/reviews/" class="rw_allreviewed"><?=GetMessage('ALL_REVIEWS')?></a>
    </div>
</div>