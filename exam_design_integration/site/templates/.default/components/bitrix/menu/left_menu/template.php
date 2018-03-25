<?if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();

if (empty($arResult["ALL_ITEMS"]))
	return;

if (file_exists($_SERVER["DOCUMENT_ROOT"].$this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css'))
	$APPLICATION->SetAdditionalCSS($this->GetFolder().'/themes/'.$arParams["MENU_THEME"].'/colors.css');

CJSCore::Init();

$menuBlockId = "catalog_menu_".$this->randString();
?>

<div class="sb_nav">
    <ul>
	    <?foreach($arResult["MENU_STRUCTURE"] as $itemID => $arColumns):?>     <!-- first level-->
        <li class="<?if($arResult["ALL_ITEMS"][$itemID]["SELECTED"]):?>open current<?else:?>closed<?endif?>">
	        <?if (is_array($arColumns) && count($arColumns) > 0):?>
                <span class="sb_showchild"></span>
            <?endif;?>
            <a href="<?=$arResult["ALL_ITEMS"][$itemID]["LINK"]?>">
                <span><?=$arResult["ALL_ITEMS"][$itemID]["TEXT"]?></span>
            </a>
	        <?if (is_array($arColumns) && count($arColumns) > 0):?>
                <ul>
		        <?foreach($arColumns as $key=>$arRow):?>
			        <?foreach($arRow as $itemIdLevel_2=>$arLevel_3):?>  <!-- second level-->
                    <li>
				        <?if (is_array($arLevel_3) && count($arLevel_3) > 0):?>
                            <span class="sb_showchild"></span>
                        <?endif;?>
                        <a href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["LINK"]?>"><?=$arResult["ALL_ITEMS"][$itemIdLevel_2]["TEXT"]?></a>
	                    <?if (is_array($arLevel_3) && count($arLevel_3) > 0):?>
                            <ul>
		                    <?foreach($arLevel_3 as $itemIdLevel_3):?>	<!-- third level-->
                                <li>
                                    <a href="<?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["LINK"]?>"><?=$arResult["ALL_ITEMS"][$itemIdLevel_3]["TEXT"]?></a>
                                </li>
                            <?endforeach;?>
                            </ul>
	                    <?endif;?>
                    </li>
                    <?endforeach;?>
                <?endforeach;?>
                </ul>
            <?endif;?>
        </li>
        <?endforeach;?>
    </ul>
</div>