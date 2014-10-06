<?php 

/**
* 
*/
class Livestocktip extends Eloquent
{
	public function livestocks()
	{
		return $this->belongsTo('Livestock');
	}
}