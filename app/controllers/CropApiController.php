<?php

class CropApiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Crop::all()->toJson();
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$crop = new Crop;

		$crop->name = Input::get('name');
		$crop->price = Input::get('price');
		$crop->days_until_harvest = Input::get('days_until_harvest');
		$crop->amount_produced = Input::get('amount_produced');
		$crop->crop_id = Input::get('crop_id');

		$crop->save();

		return Response::json(array(
			'error' => 'none',
			'message' => 'saved' 
			));
	}

	public function getFertilizers($id)
	{
		$fertilizers = Crop::find($id)->fertilizers;
		return $fertilizers->toJson();
	}

	public function getFertilizer($id, $fertilizerid)
	{
		return Fertilizer::find($fertilizerid)->toJson();
	}

	public function getPests($id)
	{
		$pests = Crop::find($id)->pests;
		return $pests->toJson();
	}

	public function getPest($id, $pestid)
	{
		return Pest::find($pestid);
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$crop = Crop::findOrFail($id);
		return $crop->toJson();		
	}
	
	

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$crop = Crop::findOrFail($id);

		$crop->name = (Input::get('name') !== NULL) ? Input::get('name') : $crop->name;
		$crop->price = (Input::get('price') !== NULL) ? Input::get('price') : $crop->price;
		$crop->days_until_harvest = (Input::get('days_until_harvest') !== NULL) ? Input::get('days_until_harvest') : $crop->days_until_harvest;
		$crop->amount_produced = (Input::get('amount_produced') !== NULL) ? Input::get('amount_produced') : $crop->amount_produced;
		$crop->crop_id = (Input::get('crop_id') !== NULL) ? Input::get('crop_id') : $crop->crop_id;

		$crop->save();

		return Response::json(array(
				'error' => 'none',
				'message' => 'updated'
			));
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$crop = Crop::findOrFail($id);
		$crop->fertilizers()->detach();
		$crop->pests()->detach();
		$crop->delete();

		return Response::json(array(
				'error' => 'none',
				'deleted' => $id
			));
	}


}
