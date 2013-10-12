<?php
require ("includes/start.php");

$taken=News::view_All();



foreach ($taken as  $value) {
	
		echo "<li>
		<a href=\"#newsdesc\" onclick=\"view_news_desc(".$value->get("id").");\">
		<h1>".$value->get("title")."</h1>
		<h3 style='font-size:10px;'>".$value->get("date")."</h3>
		</a>
		</li>";
		
	
}

?>