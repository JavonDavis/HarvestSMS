<?php

class Pest extends Eloquent {
	
	public function crops(){
		return $this->belongsToMany('Crop');
	}

}