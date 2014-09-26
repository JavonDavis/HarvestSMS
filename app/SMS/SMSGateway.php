<?php 

namespace SMS;

interface SMSGateway {

	/**
	* Checks whether or not a new text is present
	* @return boolean
	*/
	public function hasNewText();

	/**
	* Gets the latest text message as a String
	* @return String
	*/
	public function getTextMessage();

	/**
	* Replies to the text message
	* @return boolean
	*/
	public function reply($relevantMessage);

	/**
	* Gets relevant response based on sms
	* @return String
	*/
	public function getRelevantResponse($sms);

	/**
	* Checks whether or not the sms received contains a valid message
	* @return boolean
	*/
	public function isValidMessage($message);
}