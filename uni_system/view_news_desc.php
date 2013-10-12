<?php
require ("includes/start.php");

$news_desc=new News();
$news_desc=$news_desc->select_by_pk($_POST['news_id']);


echo $news_desc->get("desc");
?>