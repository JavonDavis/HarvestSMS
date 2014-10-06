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

Route::get('/dashboard/crops/new', 'CropController@getCropForm');
Route::post('/dashboard/crops', 'CropController@postCropForm');
Route::get('/dashboard/crops', 'CropController@getCropTable');


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
	$sms = new NexmoMessage('d1923006', 'f3252994');


	$crops = Crop::all();
	$livestocks = Livestock::all();
	//$info = $sms->sendText( '18768540368', 'MyApp', 'Hello!' );
	//echo $sms->displayOverview($info);
	
	if($sms->inboundText())
	{
		$text = $sms->text;
		$int_version = (int) $text;
		
		if($int_version== 0)
		{
			$help_msg = "In the crops/animals section is where you will find a list of crops/animals accompanied by their code.The weather section provides the weather forecast for the next 4 upcoming days. The accouncement section is where the latest updates provided by your extension officers are posted.Lastly, the tips section is where you will find the latest topics regarding best practices in the agricultural field. Thank you for using BALE SMS.";
			
			$sms->reply($help_msg);
		}
		elseif($int_version== 400)
			$sms->reply("Send\n0 for help\n1 for Crops Section\n2 for Livestock Section\n3 for weather information\n4 for announcements section\n5 for the tips section"); // predial larceny
		elseif($int_version ==1)
		{
			$reply ="";
			foreach($crops as $crop)
			{
				$code = $crop_prefix.$crop->crop_id;
				$reply .= ("Send ".$code." for ".$crop->name."\n");
			}
			$sms->reply($reply);
		}
		elseif($int_version ==2)
		{
			$reply ="";
			foreach($livestocks as $livestock)
			{
				$code = $livestock_prefix.$livestock->id;
				$reply .=("Send ".$code." for ".$livestock->name."\n");
			}
			$sms->reply($reply);
		}
		elseif($int_version ==4)
		{
			$reply = "The latest announcement is {generic announcement}";
			$sms->reply($reply);
		}
		elseif($int_version ==5)
		{
			$reply = "The current topics are {generic topic code}-{generic topic title}";
			$sms->reply($reply);
		}
		elseif(substr($int_version,0, 3) == $crop_prefix)
		{
			$id = substr($int_version,3,strlen($int_version)-4);
			foreach($crops as $crop)
			{
				if(substr($int_version,3) == $crop->crop_id)
				{
					$code = $int_version;
					$option1 = $code."1 - Last recorded price for ".$crop->name; 
					$option2 = $code."2 - Recommended methods of pest management for ".$crop->name;
					$option3 = $code."3 - Suggested methods of fertilization for ".$crop->name;
					$option4 = $code."4 - Recorded amount of ".$crop->name." sold last month"; 
					$option5 = $code."5 - Suggested number of days before harvesting ".$crop->name;
					
					$sms->reply($option1."\n".$option2."\n".$option3."\n".$option4."\n".$option5);
				}
				elseif($id == $crop->crop_id)
				{
					  $lastDigit = substr($int_version, strlen($int_version)-1);
					  
					  switch($lastDigit)
					  {
						  case 1:$sms->reply("The latest price for ".($crop->name)." is ".($crop->price));
						  break;
					  
						  case 2:
						  $pests = $crop->pests()->get();
						  $reply = "";
						  foreach($pests as $pest)
						  {
							  $code = $pest_prefix.$pest->id;
							  $reply.= ($code." - ".$pest->type."\n");
						  }
						  $reply.="Send in the codes beside the pests to get direct link for information about the pest";
						  $sms->reply("The pests that normally affect ".$crop->name." are \n".$reply);
						  break;
					  
						  case 3:
						  $fertilizers = $crop->fertilizers()->get();
						  $reply = "";
						  foreach($fertilizers as $fertilizer)
						  {
							  $code = $fertilizer_prefix.$fertilizer->id;
							  $reply.= ($code." - ".$fertilizer->type."\n");
						  }
						  $reply.="Send in the codes beside the fertilizers to get direct link for information about the fertilizer";
						  $sms->reply("The recommended fertilizers for ".$crop->name." are \n".$reply);
						  break;
						  case 4:$sms->reply("The last recorded amount produced for ".$crop->name." is ".$crop->amount_produced);
						  break;
						  case 5:$sms->reply("The recommended number of days to wait before harvesting ".$crop->name." are ".$crop->days_until_harvest);
						  break;
						  default: $sms->reply($lastDigit);
						  break;
					  }					    
				 }
			}	
		}
		elseif(substr($int_version,0, 3) == $livestock_prefix)
		{
			$id = substr($int_version,3,strlen($int_version)-4);
			foreach($livestocks as $livestock)
			{
				if(substr($int_version,3) == $livestock->id)
				{
					$code = $int_version;
					$option1 = $code."1 - Last recorded price"; 
					$option2 = $code."2 - Recommended feed for ".$livestock->name;
					$option3 = $code."3 - Tips for caring for ".$livestock->name;
					
					$sms->reply($option1."\n".$option2."\n".$option3);
				}
				elseif($id == $livestock->id)
				{
					  $lastDigit = substr($int_version, strlen($int_version)-1);
					  
					  switch($lastDigit)
					  {
						  case 1:$sms->reply("The last recorded price for ".$livestock->name." is ".($livestock->price));
						  break;
					  
						  case 2:$sms->reply("The recommended feed for ".$livestock->name." is ".($livestock->feed));
						  break;
					  
						  case 3:$sms->reply("Some recommended tips for ".$livestock->name." are\n".($livestock->care_methods));
						  break;
						  default: $sms->reply($lastDigit);
						  break;
					  }					    
				 }
			}
		}
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
