<?
if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)
	die();

COption::SetOptionString("fileman", "propstypes", serialize(array("description"=>GetMessage("MAIN_OPT_DESCRIPTION"), "keywords"=>GetMessage("MAIN_OPT_KEYWORDS"), "title"=>GetMessage("MAIN_OPT_TITLE"), "keywords_inner"=>GetMessage("MAIN_OPT_KEYWORDS_INNER"))), false, $siteID);
COption::SetOptionString("fileman", "menutypes", serialize(array("about_shop"=>GetMessage("MENU_ABOUT_SHOP"))), false, $siteID);
COption::SetOptionInt("search", "suggest_save_days", 250);
COption::SetOptionString("search", "use_tf_cache", "Y");
COption::SetOptionString("search", "use_word_distance", "Y");
COption::SetOptionString("search", "use_social_rating", "Y");
COption::SetOptionString("iblock", "use_htmledit", "Y");
COption::SetOptionString("main", "translate_key_yandex", "trnsl.1.1.20180109T093223Z.346fae205d54f022.479153b996b753b05e5d68430cea890d589ba4fa");

//socialservices
if (COption::GetOptionString("socialservices", "auth_services") == "")
{
	$bRu = (LANGUAGE_ID == 'ru');
	$arServices = array(
		"VKontakte" => "N",  
		"MyMailRu" => "N",
		"Twitter" => "N",
		"Facebook" => "N",
		"Livejournal" => "Y",
		"YandexOpenID" => ($bRu? "Y":"N"),
		"Rambler" => ($bRu? "Y":"N"),
		"MailRuOpenID" => ($bRu? "Y":"N"),
		"Liveinternet" => ($bRu? "Y":"N"),
		"Blogger" => "Y",
		"OpenID" => "Y",
		"LiveID" => "N",
	);
	COption::SetOptionString("socialservices", "auth_services", serialize($arServices));
}
?>