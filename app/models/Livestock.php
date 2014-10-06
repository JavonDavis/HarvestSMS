<?php 

/**
* 
*/
class Livestock extends Eloquent
{
	public function livestocktips()
		{
			return $this->hasMany('Livestocktip');
		}	
}