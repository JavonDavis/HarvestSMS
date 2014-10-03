<?php 

class CropController extends \BaseController {

	public function getCropForm()
	{
		$fertilizers = Fertilizer::all();
		$pests = Pest::all();

		return View::make('crop.form')->with('fertilizers', $fertilizers)->with('pests', $pests);
	}

	public function postCropForm()
	{
		$crop = new Crop;

		$crop->name = Input::get('name');
		$crop->price = Input::get('price');
		$crop->days_until_harvest = Input::get('days');
		$crop->amount_produced = Input::get('amount');
		$crop->crop_id = strval(rand(0, 100));

		$crop->save();

		$fertilizerids = Input::get('fertilizers');
		foreach ($fertilizerids as $fertilizerid) {
			$toAttach = Fertilizer::find($fertilizerid);
			$crop->fertilizers()->associate($toAttach);
		}

	}

}