<?php 

namespace SMS;

class NexmoGateway implements SMSGateway {
	
	protected $messageService;

	public function __construct()
	{
		$messageService = new NexmoMessage(Config::get('Nexmo.NexmoID'), Config::get('Nexmo.NexmoSecret'));
	}

	public function hasNewText()
	{
		return $messageService->inboundText();
	}

	public function getTextMessage()
	{
		return $messageService->text;
	}

	public function test()
	{
		return 'test';
	}

	public function reply($message)
	{
		$messageService->reply($message);
	}

	public function getRelevantResponse($sms)
	{
		# code...
	}

	public function isValidMessage($message)
	{
		if Config::get($message)
	}

}