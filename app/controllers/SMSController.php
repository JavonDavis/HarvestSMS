<?php

use SMS\SMSGateway;

class SMSController extends \BaseController {

	const MAIN_MENU_MESSAGE_CODE = '400';
	const CROP_MENU_MESSAGE_CODE = '1';
	const WEATHER_MENU_MESSAGE_CODE = '2';

	protected $gateway;
	protected $message;

	function __construct(SMSGateway $gateway){
		$this->gateway = $gateway;
	}


	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// 
	}

	public function getText()
	{
		if (!isset($this->message)) {
			$this->message = $gateway->getTextMessage();
		}
	}

	public function showMainMenu()
	{

		if (strcmp($this->message, self::MAIN_MENU_MESSAGE_CODE) == 0){
			$this->gateway->reply("1.Crop Selection\n2.Weather Information\n");
		}
	}

	public function replyWithCropMenu()
	{
		if (strcmp($this->message, self::CROP_MENU_MESSAGE_CODE) == 0){
			$crops = Crop::all(); 

			$replyMessage = '';

			foreach ($crops as $crop) {
				$replyMessage .= $crop->crop_id . ' - ' . $crop->name;
			}

			$this->gateway->reply($replyMessage);
			return true;
		} else {
			return false;
		}		
	}

}

