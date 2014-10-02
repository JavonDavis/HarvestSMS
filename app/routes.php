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
	Route::get('/fertilizers/{id}/crops/{cropID}', 'FertilizerApiController@getCrop');

	Route::resource('pests', 'PestApiController');

	Route::resource('animals', 'AnimalApiController');
	Route::get('/animals/{id}/tips', 'AnimalApiController@getTips');
	Route::get('/animals/{id}/tips/{tipid}', 'AnimalApiController@getTip');
	
});

Route::get('/msgreply', function(){
	ini_set('display_errors', 'On');

	echo "string";
	include ( "NexmoMessage.php" );
	// include ("crop.php");
	// Declare new NexmoMessage.
	$sms = new NexmoMessage('d1923006', 'f3252994');


	$crops = Crop::all();
	//$info = $sms->sendText( '18768540368', 'MyApp', 'Hello!' );
	//echo $sms->displayOverview($info);
	
	if($sms->inboundText())
	{
		$text = $sms->text;
		$int_version = (int) $text;
		
		switch($int_version)
         {
			case 400: $sms->reply("Send 0 for help\nSend 1 for Crops Section\nSend 2 for Crops Section\nSend 3 for weather information\n") ;
			break;
			case 1:
				$reply ="";
				foreach($crops as $crop)
				{
					$reply .= ("Send ".$crop->crop_id." for ".$crop->name."\n");
				}
				$sms->reply($reply);
				break;
			default:
				foreach($crops as $crop)
				{
					if($int_version == $crop->crop_id)
					{
						$option1 = $int_version."1 - Last recorded price"; 
						$option2 = $int_version."2 - Methods of pest management";
						$option3 = $int_version."3 - Suggested methods of fertilization";
						$option4 = $int_version."4 - Recorded amount of ".$crop->name." sold last month"; 
						$option5 = $int_version."5. Suggested number of days before harvesting";
						
						$sms->reply($option1."\n".$option2."\n".$option3."\n".$option4."\n".$option5);
						break;
					}
					elseif(substr($int_version,0, strlen($int_version-2)) == $crop->crop_id)
					{
						
						$lastDigit = $int_version[substr($int_version,0, strlen($int_version-3))];
						
						switch($lastDigit)
						{
							case 1:$sms->reply("The price is ".($crop->price));
							break;
						
							case 2:$sms->reply("The pests are ".$crop->pests()->get());
							break;
						
							case 3:$sms->reply("The fertilizers are".$crop->fertilizers()->get());
							break;
							case 4:$sms->reply("The last recorded amount produced is ".$crop->amount_produced);
							break;
							case 5:$sms->reply("The number of days until harvest are ".$crop->days_until_harvest);
							break;
							default: $sms->reply($lastDigit);
							break;
						}					
                       break;                  
					}
				}	
				$sms->reply("Not a valid option, Send 400 for home menu ".substr($int_version,0, strlen($int_version-1)));
			break;
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
		echo $user->password."js".(strcmp($user->phone,$number))."kk".(strcmp($user->phone,$number)==0 && strcmp($user->password,$password)==0);
		if(strcmp($user->phone,$number)==0 && strcmp($user->password,$password)==0)
		{
			Session::put('user',$user);
			return Redirect::intended('home');
		}
	}
});
