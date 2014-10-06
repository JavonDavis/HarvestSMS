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
	Route::get('/crops/{id}/fertilizers', 'CropApiController@getFertilizers');
	Route::get('/crops/{id}/fertilizers/{fertilizerid}', 'CropApiController@getFertilizer');
	Route::get('/crops/{id}/pests', 'CropApiController@getPests');
	Route::get('/crops/{id}/pests/{pestid}', 'CropApiController@getPest');

	Route::resource('fertilizers', 'FertilizerApiController');
	Route::get('/fertilizers/{id}/crops', 'FertilizerApiController@getCrops');
	Route::get('/fertilizers/{id}/crops/{cropid}', 'FertilizerApiController@getCrop');


	Route::resource('pests', 'PestApiController');
	Route::get('/pests/{id}/crops', 'PestApiController@getCrops');
	Route::get('/pests/{id}/crops/{cropid}', 'PestApiController@getCrop');

	Route::resource('animals', 'AnimalApiController');
	Route::get('/animals/{id}/tips', 'AnimalApiController@getTips');
	Route::get('/animals/{id}/tips/{tipid}', 'AnimalApiController@getTip');
	
});

Route::group(array('prefix' => 'dashboard', 'before' => 'login'),function ()
{
	Route::get('/crops/new', 'DashboardController@getCropForm');
	Route::post('/crops', 'DashboardController@postCropForm');
	Route::get('/crops', 'DashboardController@getCropTable');

	Route::get('/announcements/new', 'DashboardController@getAnnouncementForm');
	Route::post('/announcements', 'DashboardController@postAnnouncementForm');
	Route::get('/announcements', 'DashboardController@getAnnouncementTable');
});

Route::get('/msgreply', function(){
	ini_set('display_errors', 'On');

	$crop_prefix = 100;
	$pest_prefix = 200;
	$fertilizer_prefix = 300;
	$livestock_prefix = 400;

	echo "string";
	include ( "NexmoMessage.php" );
	// include ("crop.php");
	// Declare new NexmoMessage.
	$sms = new NexmoMessage('a8ca5821', '3d21bce2');
	

	$crops = Crop::all();
	$livestocks = Livestock::all();
	//$info = $sms->sendText( '18768540368', 'MyApp', 'Hello!' );
	//echo $sms->displayOverview($info);
	
	// question = new Question;
			//question->content = whateve rcontent
			//question->save();
	
	if($sms->inboundText())
	{
		$text = $sms->text;
		if($text== 0)
		{
			$help_msg = "In the crops/animals section is where you will find a list of crops/animals accompanied by their code. The accouncement section is where the latest updates provided by your extension officers are posted.Lastly, the questions section is where you send any question of concern and an api will try to get back tou as soon as possible. Thank you for using BALE SMS.";	
			$sms->reply($help_msg);
		}
		elseif($int_version== 400)
			$sms->reply("Send\n0 for help\n1 for Crops Section\n2 for Livestock Section\n3 for announcements section\n4 for questions section"); // predial larceny
		else
		{
			$sms->reply("Unknown code");
		}
	}
});

Route::get('/createJohn', function(){
	$user = new User;
	$user->name = "John Brown";
	$user->username = "JohnB";
	$user->password = "Password";
	$user->phone = '111111111';
	$user->email = 'jb@jb.com';
	$user->save();

	return 'saved';
});

Route::get('/createChicken', function(){
	$livestock = new Livestock;

	$livestock->name = "Chicken";
	$livestock->price = "1000.00";
	$livestock->care_methods = "Keep out of cold areas";
	$livestock->feed = "Chicken Feed";

	$livestock->save();
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
	Session::flush();
	return View::make('login');
	});
	
Route::get('/logout',function(){
	Session::flush();
	});

Route::get('/showAll', function() {
	return User::all()->toJson();
});

Route::get('/home', function() {
	if(Session::has('user'))
	{
		$user = Session::get('user');
		return $user->name ." is logged in";
	}
	else
		return "nah";
});

Route::post('/auth',function() {
	
	$data = Input::all();
	
	$number= $data['number'];
	$password= $data['password'];
	
	$users = User::all();
	foreach($users as $user)
	{
		if(strcmp($user->phone,$number)==0 && strcmp($user->password,$password)==0)
		{
			Session::put('user',$user);
			return Redirect::intended('home');
		}
	}
});
