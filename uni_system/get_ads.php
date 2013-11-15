<?php
require ("includes/start.php");

$taken = News::view_All();
$news_title = array();
foreach ($taken as $value) {
	$news_title[] = $value -> get("title");
}

error_reporting(0);
$url = "http://imamu.edu.sa/colleg_instt/colleg/it/Pages/default_.aspx";

$domSrc = file_get_contents($url);
$dom = new DomDocument();
$dom -> loadHTML($domSrc);
$test = $dom -> getElementById("WebPartWPQ8");
//print_r($dom -> saveHTML($test));
$allnews = $test -> getElementsByTagName("p");

for ($i = 0; $i < $allnews -> length; $i++) {
	$ads = $allnews -> item($i) -> getElementsByTagName("a");
	for ($j = 0; $j < $ads -> length; $j++) {
		$linkobj = $ads -> item($j);
		$link = $dom -> saveHTML($linkobj);

		$healthy = array("<a", "</a>");
		$yummy = array("<div", "</div>");

		$title = str_replace($healthy, $yummy, $link);
		if (strpos($link, "img") === false)
			continue;
		//echo $title;
		///$title=$dom -> saveHTML($linkobj -> getElementsByTagName("img")-> item(0));
		//echo $title;
		$start = strpos($link, "href=");
		$end = strpos($link, "target");
		$desc_url = substr($link, $start + 6, $end - $start - 8);
		//	echo $desc_url . "<br/>";

		$descSrc = file_get_contents(trim($desc_url));
		$domdesc = new DomDocument();
		$domdesc -> loadHTML($descSrc);
		$alldesc = $domdesc -> getElementById("ctl00_ctl00_PlaceHolderMain_PlaceHolderMain_content__ControlWrapper_RichHtmlField");
		if (!empty($alldesc)) {
			$allnewsone = $alldesc -> getElementsByTagName("p");
			$cleardesc = $domdesc -> saveHTML($alldesc);
			$cleardesc = str_replace($healthy, $yummy, $cleardesc);

		} else {
			$alldesc = $domdesc -> getElementById("ctl00_ctl00_PlaceHolderMain_PlaceHolderMain_PageContent__ControlWrapper_RichHtmlField");
			if (!empty($alldesc)) {
				$cleardesc = $domdesc -> saveHTML($alldesc);
				$cleardesc = str_replace($healthy, $yummy, $cleardesc);
			} else {
				$cleardesc = "<a href='" . $desc_url . "' >External Link</a>";
			}
		}
		
		$checkad = new Ads();
		
		$checkad = $checkad -> select_by_field("title", mysql_real_escape_string($title));
		$checkad = array_shift($checkad);
		if (empty($checkad)) {
			//echo $cleardesc;
			$newads = new Ads();
			$newads -> set("title", $title);
			$newads -> set("desc", $cleardesc);
			$newads->add();
			//echo "go<br/>";
		}

	}

}
?>