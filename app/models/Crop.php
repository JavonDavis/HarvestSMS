<?php

class Crop extends Eloquent {
	
	public function pests(){
		return $this->belongsToMany('Pest');
	}

	public function fertilizers(){
		return $this->belongsToMany('Fertilizer');
	}
}