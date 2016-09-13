<?php

namespace FisiLabs\Http\Controllers\Api;

use Illuminate\Http\Request;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

use DB;
use Auth;

use FisiLabs\User;
use FisiLabs\Classroom;
use FisiLabs\Experiment;
use FisiLabs\Subscription;

class ClassroomController extends Controller
{
    
	public function getList() 
	{
		$classrooms = Classroom::where('classrooms.active', true)
						->join('users as a', function ($join) {
					    	$join->on('classrooms.instructor_id', '=', 'a.id');
					    })
					    ->select(
					    	'classrooms.*', 
					    	'a.name as instructor_name'
					    )
					    ->groupBy('classrooms.id')
					    ->paginate(10);

		foreach ($classrooms as $classroom) 
		{
			$classroom["experiments"] = Experiment::where('active', true)
												  ->where('classroom_id', $classroom["id"])
												  ->get();

			$classroom["subscriptions"] = Subscription::where('active', true)
												  ->where('classroom_id', $classroom["id"])
												  ->groupBy('user_id')
												  ->get();			
		}

		return $classrooms;
	}

	public function getDetail($id) 
	{
		$user = Auth::guard('api')->user();
		$classroom = Classroom::find($id);

		$classroom["experiments"] = Experiment::where('experiments.classroom_id', $id)
											  ->where('experiments.active', true)
											  ->leftJoin('samples as s', function ($join) {
											  		$join->on('s.experiment_id', '=', 'experiments.id')
											  	   		 ->where('s.active', true);
											  })
											  ->join('users', function ($join) {
												  $join->on('experiments.creator_id', '=', 'users.id');
											  })
											  ->select(
											  	'experiments.*',
											  	'users.name as creator_name', 
											  	DB::raw('COUNT(s.id) as samples_qtd')
											  )
											  ->groupBy('experiments.id')
											  ->get();

		$classroom["instructor"] = $classroom->instructor;

		$classroom["students"] = $classroom->students();

		$classroom["subscription"] = Subscription::where('classroom_id', $id)
												 ->where('user_id', $user->id)
												 ->where('active', true)
												 ->first();


		return $classroom;
	}

	public function getSubscribe($id) 
	{
		$user = Auth::guard('api')->user();

		$subscription = new Subscription;

		$subscription->user_id = $user->id;
		$subscription->classroom_id = $id;

		$subscription->save();

		return $subscription;
	}

}
