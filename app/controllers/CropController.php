<?php 

class CropController extends \BaseController {

	public function getCropForm()
	{
		$fertilizers = Fertilizer::all();
		$pests = Pest::all();

		dd(compact('fertilizers', 'pests'));
		return View::make('crop.form', compact('fertilizers', 'pests'));
	}

	public function postCropForm()
	{
		dd (Input::all());
	}

}