<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

//echo "WIZARD_SITE_ID=".WIZARD_SITE_ID." | ";
//echo "WIZARD_SITE_PATH=".WIZARD_SITE_PATH." | ";
//echo "WIZARD_RELATIVE_PATH=".WIZARD_RELATIVE_PATH." | ";
//echo "WIZARD_ABSOLUTE_PATH=".WIZARD_ABSOLUTE_PATH." | ";
//echo "WIZARD_TEMPLATE_ID=".WIZARD_TEMPLATE_ID." | ";
//echo "WIZARD_TEMPLATE_RELATIVE_PATH=".WIZARD_TEMPLATE_RELATIVE_PATH." | ";
//echo "WIZARD_TEMPLATE_ABSOLUTE_PATH=".WIZARD_TEMPLATE_ABSOLUTE_PATH." | ";
//echo "WIZARD_THEME_ID=".WIZARD_THEME_ID." | ";
//echo "WIZARD_THEME_RELATIVE_PATH=".WIZARD_THEME_RELATIVE_PATH." | ";
//echo "WIZARD_THEME_ABSOLUTE_PATH=".WIZARD_THEME_ABSOLUTE_PATH." | ";
//echo "WIZARD_SERVICE_RELATIVE_PATH=".WIZARD_SERVICE_RELATIVE_PATH." | ";
//echo "WIZARD_SERVICE_ABSOLUTE_PATH=".WIZARD_SERVICE_ABSOLUTE_PATH." | ";
//echo "WIZARD_IS_RERUN=".WIZARD_IS_RERUN." | ";
//die();

if (!defined("WIZARD_TEMPLATE_ID"))
	return;

$bitrixTemplateDir = $_SERVER["DOCUMENT_ROOT"].BX_PERSONAL_ROOT."/templates/";

$templatesPath = WizardServices::GetTemplatesPath($wizard->GetPath()."/site");
$arTemplates = WizardServices::GetTemplates($templatesPath);
$arTemplatesID = array_keys($arTemplates);

foreach($arTemplatesID as $templateID){
	CopyDirFiles(
		$_SERVER["DOCUMENT_ROOT"].WizardServices::GetTemplatesPath(WIZARD_RELATIVE_PATH."/site")."/".$templateID,
		$bitrixTemplateDir.$templateID,
		$rewrite = true,
		$recursive = true,
		$delete_after_copy = false,
		$exclude = "themes"
	);
}

//Attach template to default site
$obSite = CSite::GetList($by = "def", $order = "desc", Array("LID" => WIZARD_SITE_ID));

if ($arSite = $obSite->Fetch())
{
	$arTemplates = Array();
	$found = false;
	$foundEmpty = false;

	// РџРѕР»СѓС‡Р°РµРј С‚РµРєСѓС‰РёР№ С€Р°Р±Р»РѕРЅ СЃР°Р№С‚Р° (Сѓ РЅРѕРІРѕРіРѕ СЃР°Р№С‚Р° РѕРЅ "РїСѓСЃС‚РѕР№" (empty))
	$obTemplate = CSite::GetTemplateList($arSite["LID"]);
	while($arTemplate = $obTemplate->Fetch())
	{
		if(!$found && strlen(trim($arTemplate["CONDITION"]))<=0)
		{
			$arTemplate["TEMPLATE"] = WIZARD_TEMPLATE_ID;
			$arTemplate["CONDITION"] = "CSite::InDir('/index.php')";
			$found = true;
		}
		if($arTemplate["TEMPLATE"] == "empty")
		{
			$foundEmpty = true;
			continue;
		}
		$arTemplates[]= $arTemplate;
	}

	if (!$found)
		$arTemplates[]= Array("CONDITION" => "CSite::InDir('/index.php')", "SORT" => 1, "TEMPLATE" => WIZARD_TEMPLATE_ID);

	if($arTemplates[0]['TEMPLATE'] == WIZARD_TEMPLATE_ID){
		$arTemplate2 = Array(
			"ID"=>"",
			"SITE_ID" => WIZARD_SITE_ID,
			"CONDITION" => "",
			"SORT" => "2",
			"TEMPLATE" => "inner",
		);

		$arTemplates[1] = $arTemplate2;
	}

	$arFields = Array(
		"TEMPLATE" => $arTemplates,
		"NAME" => $arSite["NAME"],
	);

	$obSite = new CSite();
	$obSite->Update($arSite["LID"], $arFields);
}
COption::SetOptionString("main", "wizard_template_id", WIZARD_TEMPLATE_ID, false, WIZARD_SITE_ID);
?>
