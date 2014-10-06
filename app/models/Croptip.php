<?php 

/**
* 
*/
class Croptip extends Eloquent
{

	public function crops()
	{
		return $this->belongsTo('Crop');
	}
	
}