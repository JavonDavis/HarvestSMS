<?php 

class DashboardController extends \BaseController {


	public function getIndex()
	{
		return View::make('dashboard');
	}
	
	public function getHelp()
	{
		return View::make('help');
	}

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
		$croptips = $crop->croptips()->get();
		return View::make('crop.tips')->with(array('croptips' => $croptips, 'crop' => $crop));
	}

	public function getCropsPests($id)
	{
		$crop = Crop::find($id);
		$pests = $crop->pests()->get();
		return View::make('crop.pest')->with(array('crop' => $crop, 'pests' => $pests));
	}

	public function getCropsFertilizers($id)
	{
		$crop = Crop::find($id);
		$fertilizers = $crop->fertilizers()->get();
		return View::make('crop.fertilizer')->with(array('crop' => $crop, 'fertilizers' => $fertilizers));
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

		return Redirect::to('dashboard/crops/' . $id . '/tips');
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

	public function getFertilizerTable()
	{
		$fertilizers = Fertilizer::all();
		return View::make('fertilizer.table')->with(compact('fertilizers'));
	}

	public function getFertilizerForm()
	{
		return View::make('fertilizer.create');
	}

	public function postFertilizerForm()
	{
		$fertilizer = new Fertilizer;

		$fertilizer->name = Input::get('name');

		$fertilizer->save();

		return Redirect::to('dashboard/fertilizers/');
	}

	public function getPestTable()
	{
		$pests = Pest::all();
		return View::make('pest.table')->with(compact('pests'));
	}

	public function getPestForm()
	{
		return View::make('pest.create');
	}

	public function postPestForm()
	{
		$pest = new Pest;

		$pest->type = Input::get('type');
		$pest->management_method = Input::get('management');

		$pest->save();

		return Redirect::to('dashboard/pests/');
	}

	public function getPestCrops($id)
	{
		$pest = Pest::find($id);
		$crops = $pest->crops()->get();
		return View::make('pest.crops')->with(array('crops' => $crops, 'pest' => $pest));
	}

	public function getLivestockTable()
	{
		$livestocks = Livestock::all();
		return View::make('livestock.table')->with(compact('livestocks'));
	}

	public function getLivestockForm()
	{
		return View::make('livestock.form');
	}

	public function postLivestockForm()
	{
		# code...
	}

	public function getLivestockTips($id)
	{
		$livestock = Livestock::find($id);
		$tips = $livestock->livestocktips()->get();
		return View::make('livestock.tips')->with(array('tips' => $tips, 'livestock' => $livestock));
	}

	public function getLivestockTipForm($id)
	{
		$livestock = Livestock::find($id);

		return View::make('livestock.tipform')->with('livestock', $livestock);
	}

	public function postLivestockTipForm($id)
	{
		$livestocktip = new Livestocktip;

		$livestocktip->description = Input::get('description');
		$livestocktip->content = Input::get('content');
		$livestocktip->livestock_id = $id;

		$livestocktip->save();

		return Redirect::to('dashboard/livestocks/$id/tips');
	}


}