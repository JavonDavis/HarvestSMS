<?php

class PestApiController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return Pest::all()->toJson();
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$pest = new Pest;

		$pest->type = Input::get('type');
		$pest->management_method = Input::get('management_method');

		$pest->save();

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
		$pest = Pest::findOrFail($id);
		return $pest->toJson();
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$pest = Pest::findOrFail($id);

		$pest->type = (Input::get('type') !== NULL) ? Input::get('type') : $pest->type;
		$pest->management_method = (Input::get('management_method') !== NULL) ? Input::get('management_method') : $pest->management_method;

		$pest->save();

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
		$pest = Pest::findOrFail($id);
		$pest->crops()->detach();
		$pest->delete();

		return Response::json(array(
				'error' => 'none',
				'deleted' => $id
			));
	}


}
