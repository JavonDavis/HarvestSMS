<?php 

/**
* 
*/
class Tip extends Eloquent
{
	
	public function users()
	{
		return $this->belongsTo('User');
	}
}