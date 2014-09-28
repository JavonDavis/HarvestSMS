<?php 

namespace SMS;

class NexmoGateway implements SMSGateway {
	
	protected $messageService;

	public function __construct()
	{
		$this->messageService = new NexmoMessage(Config::get('Nexmo.NexmoID'), Config::get('Nexmo.NexmoSecret'));
	}

	public function hasNewText()
	{
		return $this->messageService->inboundText();
	}

	public function getTextMessage()
	{
		if (hasNewText())
			return $this->messageService->text;
		else 
			return null;
	}

	public function reply($message)
	{
		$this->messageService->reply($message);
	}
}