<?
foreach($arResult['ITEMS'] as $key=>&$arItem){
	if(is_array($arItem['PREVIEW_PICTURE'])){
		$tmpFile = CFile::ResizeImageGet($arItem['PREVIEW_PICTURE']['ID'], Array('width'=>'40', 'height'=>'40'), BX_RESIZE_IMAGE_PROPORTIONAL, true);
		
		$arItem['PREVIEW_PICTURE']['SRC'] = $tmpFile['src'];
	}
}
?>