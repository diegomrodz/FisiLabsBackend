<?php

namespace FisiLabs\Http\Controllers\Api;

use Illuminate\Http\Request;

use Auth;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

use FisiLabs\Events\SampleWasCreated;

use FisiLabs\Experiment;
use FisiLabs\Classroom;
use FisiLabs\Sample;
use FisiLabs\User;
use FisiLabs\Subscription;

class ExperimentController extends Controller
{

	public function getDetail($id) 
	{
		$user = Auth::guard('api')->user();
		$experiment = Experiment::find($id);

		$experiment["classroom"] = $experiment->classroom;
		$experiment["creator"] = $experiment->creator;

		$experiment["samples"] = Sample::where('samples.experiment_id', $id)
									   ->where('samples.active', true)
									   ->join('users as u', function ($join) {
									   		$join->on('u.id', '=', 'samples.user_id');
									   })
									   ->select(
									   		'samples.*',
									   		'u.name as user_name'
									   )
									   ->get();

		$experiment["subscription"] = Subscription::where('classroom_id', $experiment->classroom_id)
													->where('user_id', $user->id)
													->where('active', true)
													->first();


		$experiment["students"] = Sample::where('samples.experiment_id', $id)
										->join('users', function ($join) {
											$join->on('samples.user_id', '=', 'users.id');
										})
										->select('users.*')
										->get();

		return $experiment;
	}

	public function postCreateSample($id, Request $request) 
	{
		$user = Auth::guard('api')->user();
		$experiment = Experiment::find($id);
		
		$sample = new Sample;

		$sample->experiment_id = $id;
		$sample->user_id = $user->id;
		$sample->value = $request->value;
		$sample->desc = $request->desc;

		$sample->save();

		event(new SampleWasCreated($experiment));

		return 1;
	}

}
