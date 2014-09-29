<?php

use SMS\SMSGateway;
use SMS\NexmoMessage;

class SMSController extends \BaseController {

	const MAIN_MENU_MESSAGE_CODE = '400';
	const CROP_MENU_MESSAGE_CODE = '1';
	const WEATHER_MENU_MESSAGE_CODE = '2';

	protected $gateway;

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
		// // Step 1: Declare new NexmoMessage.
		// $nexmo_sms = new NexmoMessage('d1923006', 'f3252994');

		// // Step 2: Use sendText( $to, $from, $message ) method to send a message. 
		// $info = $nexmo_sms->sendText( '+18768540368', 'Bale', 'Hello!' );

		// // Step 3: Display an overview of the message
		// return $nexmo_sms->displayOverview($info);

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
		// $message = $this->gateway->getTextMessage(Input::all());

		$this->gateway->sendText('18765095176', 'BALE', 'MESSAGETEST');

		// 'https://rest.nexmo.com/sms/json';
		// return $this->message;
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

