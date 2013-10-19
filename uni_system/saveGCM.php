<?php 
require ("includes/start.php");
	if(isset($_POST['rid'])){
		$save_user = new GCM();
		$save_user = $save_user->select_by_field("gcm_regid",$_POST['rid']);
		$save_user = array_shift($save_user);
		if(empty($save_user)){
			$save_user = new GCM();
			$save_user -> set("gcm_regid", $_POST['rid']);
			$save_user->Add();
		}else{
			
		}
	}
?>
