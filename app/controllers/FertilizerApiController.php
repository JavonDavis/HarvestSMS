<?php

class FertilizerApiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Fertilizer::all()->toJson();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$fertilizer = new Fertilizer;

		$fertilizer->name = Input::get('name');

		$fertilizer->save();

		return Response::json(array(
				'error' => 'none',
				'message' => 'saved'
			));
	}

	public function getCrops($id)
	{
		$crops = Fertilizer::find($id)->crops;
		return $crops->toJson();
	}

	public function getCrop($id, $cropid)
	{
		return Crop::find($cropid)->toJson();
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$fertilizer = Fertilizer::findOrFail($id);
		return $fertilizer->toJson();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$fertilizer = Fertilizer::findOrFail($id);

		$fertilizer->name = (Input::get('name') !== NULL) ? Input::get('name') : $fertilizer->name;

		$fertilizer->save();

		return Response::json(array(
				"error" => "none",
				"message" => "updated"
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
		$fertilizer = Fertilizer::findOrFail($id);
		$fertilizer->crops()->detach();
		$fertilizer->delete();

		return Response::json(array(
				'error' => 'none',
				'deleted' => $id
			));
	}


}
