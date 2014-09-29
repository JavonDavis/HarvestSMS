<?php 

namespace SMS;

use Illuminate\Support\ServiceProvider;

class SMSServiceProvider extends ServiceProvider {
	/**
	* Registers Service Provider for switching SMS implementations easily
	* @return void
	*/

	public function register()
	{
		$this->app->bind(
			'SMS\SMSGateway',
			'SMS\Gateway'
		);
	}
}