<?php 

namespace SMS;

interface SMSGateway {

	/**
	* Gets the latest text message as a String
	* @return String
	*/
	public function getTextMessage();

	/**
	* Checks if the gateway has a text
	* @return boolean 
	*/
	public function hasMessage();

	/**
	* Replies to the text message
	* @return boolean
	*/
	public function sendText($number, $message);
}