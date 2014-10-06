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
		$crop->getting_started = Input::get('getting_started');

		$crop->save();

		return Redirect::to('/dashboard/crops');

	}

	public function getCropTable()
	{
		$crops = Crop::all();

		return View::make('crop.table')->with(compact('crops'));
	}

	public function getCropTips($id)
	{
		$crop = Crop::find($id);
		$tips = $crop->croptips()->get();
		return View::make('crop.tips')->with(array('tips' => $tips, 'crop' => $crop));
	}

	public function getCropTipForm($id)
	{
		$crop = Crop::find($id);

		return View::make('crop.tipform')->with('crop', $crop);
	}

	public function postCropTipForm($id)
	{
		$croptip = new Croptip;

		$croptip->description = Input::get('description');
		$croptip->content = Input::get('content');
		$croptip->crop_id = $id;

		$croptip->save();

		return Redirect::to('dashboard/crops/$id/tips');
	}

	public function getAnnouncementForm()
	{
		return View::make('announcement.form');
	}

	public function postAnnouncementForm()
	{
		if (Session::has('user')) {
			$user = Session::get('user');

			$announcement = new Announcement;

			$announcement->description = Input::get('description');
			$announcement->content = Input::get('content');
			$announcement->user_id = $user->id;

			$announcement->save();

			return Redirect::to('/dashboard/announcements');

		} else {
			return Redirect::to('/login');
		}
		
	}

	public function getAnnouncementTable()
	{
		$announcements = Announcement::orderBy('created_at')->get();

		return View::make('announcement.table')->with(compact('announcements'));
	}

	public function getQuestionTable()
	{
		$questions = Question::orderBy('created_at')->get();

		return View::make('question.table')->with(compact('questions'));
	}

	public function getAnswerForm($id)
	{
		$question = Question::find($id);
		return View::make('question.answer')->withQuestion($question);
	}

	public function postAnswer($id)
	{
		$question = Question::find($id);
		$answer = Input::get('answer');

		// Send text message with answer ...
	}


}