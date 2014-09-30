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

	Route::resource('crops', 'CropApiController');
	Route::get('/crops/{id}/fertilizers', 'CropApiController@getFertilizer');
	Route::get('/crops/{id}/fertilizers/{fertilizerid}', 'CropApiController@getFertilizer');

	Route::resource('fertilizers', 'FertilizerApiController');
	Route::get('/fertilizers/{id}/crops', 'FertilizerApiController@getCrops');
	Route::get('/fertilizers/{id}/crops/{cropID}', 'FertilizerApiController@getCrop');

	Route::resource('animals', 'AnimalApiController');
	Route::get('/animals/{id}/tips', 'AnimalApiController@getTips');
	Route::get('/animals/{id}/tips/{tipid}', 'AnimalApiController@getTip');

	Route::resource('tips', 'TipApiController');
	Route::get('/tips/{id}/crops','TipApiController@getCrops');
	Route::get('/tips/{id}/crops/{cropID}', 'TipApiController@getCrop');
	
});

Route::get('/msgreply', function(){
	ini_set('display_errors', 'On');

	echo "string";
	include ( "NexmoMessage.php" );
	// include ("crop.php");
	// Declare new NexmoMessage.
	$sms = new NexmoMessage('d1923006', 'f3252994');

	//$info = $sms->sendText( '18768540368', 'MyApp', 'Hello!' );
	//echo $sms->displayOverview($info);
	
	if($sms->inboundText())
	{
		$text = $sms->text;
		$int_version = (int) $text;
		
		switch($int_version)
         {
			case 0: $sms->reply('Not a valid entry') ;
			break;
			case 400: $sms->reply("Send 1 for Crops Section\nSend 2 for Crops Section\nSend 3 for weather information\n") ;
			break;
		 }
	}
});

Route::get('/createJill', function(){
	$user = new User;
	$user->name = "Jill Brown";
	$user->username = "JillB";
	$user->password = "Password";
	$user->phone = '2222222';
	$user->email = 'jlb@jlb.com';
	$user->save();

	return 'saved';
});

/*

$user->name = "John Brown";
	$user->username = "JohnB";
	$user->password = "Password";
	$user->phone = '111111111';
	$user->email = 'jb@jb.com';

$user = new User;
	$user->name = "Jill Brown";
	$user->username = "JillB";
	$user->password = "Password";
	$user->phone = '2222222';
	$user->email = 'jlb@jlb.com';
	$user->save();
*/


Route::get('/login',function(){
	return View::make('login');
	});

Route::get('/showAll', function() {
	return User::all()->toJson();
});

Rout::get('/auth',function() {
	
	$data = Input::all();
	
	$number= $data['number'];
	$password= $data['password'];
	
	if (Auth::attempt(array('phone' => $number, 'password' => $password)))
	{
		return Redirect::intended('home');
	}
});
