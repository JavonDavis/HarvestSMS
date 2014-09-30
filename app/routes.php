<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'api/v1'), function() {

	Route::resource('crops', 'ApiController');
	
});

Route::get('/msgreply', function(){
	ini_set('display_errors', 'On');

	echo "string";
	include ( "NexmoMessage.php" );
	// include ("crop.php");
	// Declare new NexmoMessage.
	$sms = new NexmoMessage('d1923006', 'f3252994');

	$info = $sms->sendText( '18768540368', 'MyApp', 'Hello!' );
	echo $sms->displayOverview($info);
});

Route::get('/test', array('uses' => 'SMSController@test'));

Route::get('/sms', array('uses' => 'SMSController@smsHandler'));
