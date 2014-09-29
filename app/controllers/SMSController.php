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
	public function test()
	{
		return 'test';
	}

	public function getText()
	{
		if (!isset($this->message)) {
			$this->message = $gateway->getTextMessage();
		}
	}

	public function replyWithCropMenu()
	{
		$crops = Crop::all(); 

		$replyMessage = "Send the code beside each crop to receive information specific to that crop.\n";

		foreach ($crops as $crop) {
			$replyMessage .= $crop->crop_id . ' - ' . $crop->name . "\n";
		}

		$this->gateway->reply($replyMessage);
		return true;
	}

	public function replyWithErrorMessage()
	{
		$this->gateway->reply("Sorry! That's an invalid message. Text 0 to get help.");
	}

	public function smsHandler()
	{
		$this->gateway->reply("gaza");
		if ($this->gateway->hasNewText(Input::all())) {
			$this->message = $this->gateway->getTextMessage();
		}
		//return $this->message;
		// switch($this->message) {
		// 	case self::MAIN_MENU_MESSAGE_CODE:
		// 		replyWithMainMenu();
		// 		break;
		// 	case self::CROP_MENU_MESSAGE_CODE:
		// 		replyWithCropMenu();
		// 		break;
		// 	default: 
		// 		replyWithErrorMessage();
		// }

	}

}

