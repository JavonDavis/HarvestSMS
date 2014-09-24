<?php

class Crop extends Eloquent {
	
	public function pests(){
		return $this->belongsToMany('Pest');
	}

}