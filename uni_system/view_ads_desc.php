<?php
require ("includes/start.php");

$ads_desc=new Ads();
$ads_desc=$ads_desc->select_by_pk($_POST['ads_id']);


echo $ads_desc->get("desc");
?>