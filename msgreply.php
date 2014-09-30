<?php
         
/**
* Callback function for when a text received
*/
		 
ini_set('display_errors', 'On');

echo "string";
include ( "NexmoMessage.php" );
// include ("crop.php");
// Declare new NexmoMessage.
$sms = new NexmoMessage('d1923006', 'f3252994');

$info = $nexmo_sms->sendText( '18768540368', 'MyApp', 'Hello!' );
echo $sms->displayOverview($info);

?>