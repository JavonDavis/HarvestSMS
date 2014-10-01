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


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		try {
			$crop = Crop::findOrFail($id);
			return $crop->toJson();		
		} catch (ModelNotFoundException $e) {

			return Response::json(array(
					'error' => 'Incorrect ID'
				));
		}
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
