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
use FisiLabs\ExperimentGroup;
use FisiLabs\ExperimentSubscription;
use FisiLabs\ExperimentGroupMember;

class ExperimentController extends Controller
{

	public function getDetail($id) 
	{
		$user = Auth::guard('api')->user();
		$experiment = Experiment::find($id);

		$experiment["classroom"] = $experiment->classroom;
		$experiment["creator"] = $experiment->creator;

		if ($experiment->experiment_mode == "individual") 
		{
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

			$experiment["subscription"] = ExperimentSubscription::where('experiment_id', $experiment->id)
																 ->where('user_id', $user->id)
																 ->where('active', true)
																 ->first(); 


			$experiment["students"] = Sample::where('samples.experiment_id', $id)
											->join('users', function ($join) {
												$join->on('samples.user_id', '=', 'users.id');
											})
											->select('users.*')
											->groupBy('users.id')
											->get();
		}
		else if ($experiment->experiment_mode == "group") 
		{

			$experiment["subscription"] = ExperimentGroupMember::where('groups.experiment_id', $experiment->id)
															   ->where('experiment_group_members.user_id', $user->id)
															   ->where('groups.active', true)
															   ->where('experiment_group_members.active', true)
															   ->join('experiment_groups as groups', function ($join) {
															   		$join->on('experiment_group_members.group_id', '=', 'groups.id');
															   })
															   ->select('experiment_group_members.*')
															   ->first();

			$experiment["groups"] = ExperimentGroup::where('experiment_id', $experiment->id)
												   ->where('active', true)
												   ->get();

			foreach ($experiment["groups"] as $group) 
			{
				$group["samples"] = Sample::where('samples.experiment_id', $experiment->id)
										  ->where('samples.group_id', $group["id"])
										  ->where('samples.active', true)
										  ->join('users', function ($join) {
										  	$join->on('samples.user_id', '=', 'users.id');
										  })
										  ->select('samples.*', 'users.name as user_name')
										  ->get();

				$group["members"] = ExperimentGroupMember::where('experiment_group_members.group_id', $group["id"])
														 ->where('experiment_group_members.active', true)
														 ->join('users', function ($join) {
														 	$join->on('users.id', '=', 'experiment_group_members.user_id');
														 })
														 ->select('experiment_group_members.*', 'users.name as user_name')
														 ->get();
			}

		}

		return $experiment;
	}

	public function postCreateExperiment(Request $request) 
	{
		$user = Auth::guard('api')->user();
		$form = $request->all();

		$form["creator_id"] = $user->id;

		return Experiment::create($form);
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
