<?php 

class DashboardController extends \BaseController {

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
		$crop->days_until_harvest = Input::get('days');

		$crop->save();

		return Redirect::to('/dashboard/crops');

	}

	public function getCropTable()
	{
		$crops = Crop::all();

		return View::make('crop.table')->with(compact('crops'));
	}

	public function getAnnouncementForm()
	{
		return View::make('announcement.form');
	}

	public function postAnnouncementForm()
	{
		$announcement = new Announcement;

		$announcement->description = Input::get('description');
		$announcement->content = Input::get('content');

		$announcement->save();

		return Redirect::to('/dashboard/announcements');
	}

	public function getAnnouncementTable()
	{
		$announcements = Announcement::all()->orderBy('created_at')->get();

		return View::make('announcement.table')->with(compact('announcements'));
	}

}