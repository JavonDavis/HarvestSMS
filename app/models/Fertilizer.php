<?php 

/**
* 
*/
class Fertilizer extends Eloquent
{
	
	public function crops()
	{
		return $this->belongsToMany('Crop');
	}
}