<?php

include ( "NexmoMessage.php" );
$sms = new NexmoMessage('a8ca5821', '3d21bce2');


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
	Route::get('/crops/{id}/tips', 'DashboardController@getCropTips');
	Route::get('/crops/{id}/tips/new', 'DashboardController@getCropTipForm');
	Route::post('/crops/{id}/tips', 'DashboardController@postCropTipForm');

	Route::get('/announcements/new', 'DashboardController@getAnnouncementForm');
	Route::post('/announcements', 'DashboardController@postAnnouncementForm');
	Route::get('/announcements', 'DashboardController@getAnnouncementTable');

	Route::get('/questions', 'DashboardController@getQuestionTable');
	Route::get('/answer{id}', 'DashboardController@getAnswerForm');
	Route::post('/questions/{id}', function(){
		$question = Question::find($id);
		$answer = Input::get('answer');
	});
});
Route::get('/msgreply', function(){
	//ini_set('display_errors', 'On');

	$crop_prefix = 100;
	$pest_prefix = 200;
	$fertilizer_prefix = 300;
	$livestock_prefix = 400;
	$help_msg = "In the crops/animals section is where you will find a list of crops/animals accompanied by their code. The accouncement section is where the latest updates provided by your extension officers are posted.Lastly, the questions section is where you send any question of concern and an api will try to get back tou as soon as possible. Thank you for using BALE SMS.";	

	
	
	// include ("crop.php");
	// Declare new NexmoMessage.

	//$crops = Crop::all();
	//$livestocks = Livestock::all();
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
			$sms->reply($help_msg);
		}
		elseif($text== 400)
			$sms->reply("Send\n0 for help\n1 for Crops Section\n2 for Livestock Section\n3 for announcements section\n4 for questions section"); // predial larceny
		elseif($text==1)
		{
			$reply ="";
			$crops = Crop::all();
			$reply .="Send\n";
			foreach($crops as $crop)
			{
				$code = $crop_prefix.$crop->id;
				$reply .= ($code." for ".$crop->name."\n");
			}
			$sms->reply($reply);
		}
		elseif($text ==2)
		{
			$reply ="";
			$livestocks = Livestock::all();
			$reply .="Send\n";
			foreach($livestocks as $livestock)
			{
				$code = $livestock_prefix.$livestock->id;
				$reply .=($code." for ".$livestock->name."\n");
			}
			$sms->reply($reply);
		}
		elseif($text ==3)
		{
			$reply = "The latest announcement is {generic announcement}";
			$sms->reply($reply);
		}
		elseif($text ==4)
		{
			$reply = "Please reply with any question you have and an extension officer will attempt to answer you as soon as possible as best as possible.";
			$sms->reply($reply);
		}
		elseif(substr($text,0, 3) == $crop_prefix)
		{ 
			$id = 1;
			if(strlen($text) >4)
				$id = substr($text,3,strlen($text)-4);
			else 
				$id = substr($text,3);
			
			try
			{
				$crop = Crop::find($id);
				
				$sms->reply($id."|".$crop->name);
				break;
				
				if(substr($text,3) == $crop->id)
				{
					$code = $text;
					$option1 = $code."1 - Getting started with ".$crop->name; 
					$option2 = $code."2 - latest tips for caring your ".$crop->name;
					$option3 = $code."3 - Recommended fertilizers for ".$crop->name;
					$option4 = $code."4 - Pests that normally affect ".$crop->name;
					$option5 = $code."5 - Suggested number of days before harvesting ".$crop->name;
					
					$sms->reply($option1."\n".$option2."\n".$option3."\n".$option4."\n".$option5);
				}
				elseif($id == $crop->id)
				{
					  $lastDigit = substr($text, strlen($text)-1);
					  
					  switch($lastDigit)
					  {
						  case 1:$sms->reply("Getting start with ".($crop->name)." is ".($crop->getting_started));
						  break;
					  
						  case 2:
						  $sms->reply("Under Construction");
						  break;
					  
						  case 3:
						  $fertilizers = $crop->fertilizers()->get();
						  $reply = "";
						  foreach($fertilizers as $fertilizer)
						  {
							  $code = $fertilizer_prefix.$fertilizer->id;
							  $reply.= ($fertilizer->type."\n");
						  }
						  $sms->reply("The recommended fertilizers for ".$crop->name." are \n".$reply);
						  break;
						  case 4:
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
						  case 5:$sms->reply("The recommended number of days to wait before harvesting ".$crop->name." are ".$crop->days_until_harvest);
						  break;
						  default: $sms->reply($lastDigit);
						  break;
					  }					    
				 }
			}	
			catch(Exception $e)
			{
				$sms->reply($e);
			}
		}
		elseif(substr($text,0, 3) == $livestock_prefix)
		{
			strlen($text) == 4 ? $id = substr($text,3,strlen($text)-3):substr($text,3,strlen($text)-4);
			foreach($livestocks as $livestock)
			{
				if(substr($text,3) == $livestock->id)
				{
					$code = $text;
					$option1 = $code."1 - Last recorded price"; 
					$option2 = $code."2 - Recommended feed for ".$livestock->name;
					$option3 = $code."3 - Tips for caring for ".$livestock->name;
					
					$sms->reply($option1."\n".$option2."\n".$option3);
				}
				elseif($id == $livestock->id)
				{
					  $lastDigit = substr($text, strlen($text)-1);
					  
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
	echo "string";
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

Route::post('/login',function() {
	
	$data = Input::all();
	
	$number= $data['number'];
	$password= $data['password'];
	
	$users = User::all();
	foreach($users as $user)
	{
		if(strcmp($user->phone,$number)==0 && strcmp($user->password,$password)==0)
		{
			Session::put('user',$user);
			return Redirect::to('/dashboard');
		}
	}
});
