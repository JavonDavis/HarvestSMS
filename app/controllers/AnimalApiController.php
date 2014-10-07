<?php

class AnimalApiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Livestock::all()->toJson();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$livestock = new Livestock;

		$livestock->name = Input::get('name');
		$livestock->care_methods = Input::get('care_methods');
		$livestock->feed = Input::get('feed');
		$livestock->getting_started = Input::get('getting_started');

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
		$livestock = Livestock::findOrFail($id);
		return $livestock->toJson();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$livestock = Livestock::findOrFail($id);

		$livestock->name = (Input::get('name') !== NULL) ? Input::get('name') : $livestock->name;
		$livestock->care_methods = (Input::get('care_methods') !== NULL) ? Input::get('care_methods') : $livestock->care_methods;
		$livestock->feed = (Input::get('feed') !== NULL) ? Input::get('feed') : $livestock->feed;
		$livestock->getting_started = (Input::get('getting_started') !== NULL) ? Input::get('getting_started') : $livestock->getting_started;

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
		$livestock = Livestock::findOrFail($id);
		$livestock->delete();

		return Response::json(array(
				'error' => 'none',
				'deleted' => $id
			));
	}


}
