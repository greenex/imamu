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
$test = $dom -> getElementById("WebPartWPQ6");

$allnews = $test -> getElementsByTagName("table") -> item(0);
$allnews = $allnews -> getElementsByTagName("table");
for ($i = 0; $i < $allnews -> length; $i++) {
	$news1 = $allnews -> item($i) -> getElementsByTagName("td");

	$data = $dom -> saveHTML($news1 -> item(0));

	//get title
	$start = strpos($data, "title\">");
	$end = strpos($data, "</div>");
	$title = substr($data, $start + 10, $end - $start - 10);
	//echo $title . "<br/>";
	//end geting title
	//-------get description
	$start = strpos($data, "href=");
	$end = strpos($data, ".aspx\"");
	$desc_url = substr($data, $start + 6, $end - $start - 1);
	$domSrc = file_get_contents($desc_url);
	$desc_dom = new DomDocument();
	$desc_dom -> loadHTML($domSrc);
	$desc_text = $desc_dom -> getElementById("ctl00_ctl00_PlaceHolderMain_PlaceHolderMain_content__ControlWrapper_RichHtmlField");
	$desc = $desc_dom -> saveHTML($desc_text);
	//-------end geting description
	//echo $desc_url."<br/>";
	//print_r($desc);

	//get the date
	$start = strpos($data, "h1\">");
	$end = strpos($data, "<br>");
	$date = substr($data, $start + 4, $end - $start - 11);
	//echo $date . "<br/>";
	
	if(!in_array($title, $news_title)){
		$save_news=new News();
		$save_news->set("title",$title);
		$save_news->set("desc",$desc);
		$save_news->set("date",$date);
		$save_news->add();
	}

}
?>