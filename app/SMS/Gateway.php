<?php 

namespace SMS;

use Config;

class Gateway implements SMSGateway {
	
	protected $message;
	protected $senderNumber;

	public function getTextMessage($data)
	{
		if (isset($data['text']) && isset($data['msisdn'])) {
 			$this->message = $data['text'];
 			$this->senderNumber = $data['msisdn'];
		} else {
			$this->message = null;
			$this->senderNumber = null;
		}

		return $this->message;
	}

	public function hasMessage()
	{
		return isset($this->message);
	}

	public function sendText($number, $message)
	{
		$curl = curl_init();
		curl_setopt_array($curl, array(CURLOPT_URL => 'https://rest.nexmo.com/sms/json',
								CURLOPT_POST => 1,
								CURLOPT_POSTFIELDS => array(

									'api_key' => Config::get('Nexmo.NexmoID'),
									'api_secret' => Config::get('Nexmo.NexmoSecret'),
									'text' => $message,
									'from' => 'B.A.L.E',
									'to' => $number

									)
								)
					);
		$response = curl_exec($curl);
		$curl_close($curl);

		return $response;
	}

	public function reply($message)
	{
		return sendText($this->senderNumber, $message);
	}
}