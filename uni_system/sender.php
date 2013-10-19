<?php
// Replace with real BROWSER API key from Google APIs
$apiKey = "AIzaSyAvjzBq3ii8RyRKAlEvqYMpIMLAN8HZCXI";
 
// Here a DeviceToken from android Device.
//$registrationIDs = $_REQUEST['token'];//array( "APA91bEKA5rffuoTGtwDrH6OjuhLeKkzFbcdSOkI1dImW68tx2kdl__JnNRtutr1U18HhiakRkCtQEsgjFbjJDb4ELP_q9fVZ0a8DSPYCAl2rRC90rVXksoTX4jFwM-FONhJ_zub2qii" );
//$registrationIDs =  array("APA91bGQKo3bX4EKHXEJ8DaaauepZvZ9o6D1qnPhGvzPn-UJMQnlV_L9G80_-q7vFnOKA5tRqaF0xIty6tsLAr6MLn3w4g_coodiYyXiCyctJMLddcMC2Gqs7HhWiY6X2sJLEXNphlki");
require ("includes/start.php");
$registrationIDs = array();
$users = new GCM();
$users = $users->select_all();
foreach($users as $user){
 $registrationIDs[]=$user->get('gcm_regid');
}


$news = new News();
$news = $news->select_by_field("seen",0);
foreach($news as $article){
	
	// Message to be sent
	$message = $article->get('title');
	//$message = "RFX created successfully";
	 
	// Set POST variables
	$url = 'https://android.googleapis.com/gcm/send';
	 
	$fields = array(
		        'registration_ids'  => $registrationIDs,
		        'data'              => array( "message" => $message ),
		        );
	 
	$headers = array( 
		            'Authorization: key=' . $apiKey,
		            'Content-Type: application/json'
		        );
	 
	// Open connection
	$ch = curl_init();
	 
	// Set the url, number of POST vars, POST data
	curl_setopt( $ch, CURLOPT_URL, $url );
	 
	curl_setopt( $ch, CURLOPT_POST, true );
	curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers);
	curl_setopt( $ch, CURLOPT_RETURNTRANSFER, true );
	 
	curl_setopt( $ch, CURLOPT_POSTFIELDS, json_encode( $fields ) );
	 
	// Execute post
	$result = curl_exec($ch);
	 
	// Close connection
	curl_close($ch);
	 
	echo $result;


}












