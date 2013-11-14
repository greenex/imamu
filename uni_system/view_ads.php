<?php
require ("includes/start.php");

$taken=Ads::view_All();



foreach ($taken as  $value) {
	
		echo "<li>
		<a href=\"#adsdesc\" onclick=\"view_ads_desc(".$value->get("id").");\">
		".$value->get("title")."
		
		</a>
		</li>";
		
	
}

?>