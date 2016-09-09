<?php

namespace FisiLabs\Http\Controllers\Instructor;

use Auth;

use Illuminate\Http\Request;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

use FisiLabs\Experiment;
use FisiLabs\Classroom;

class ExperimentsController extends Controller
{
    public function __invoke() 
    {
    	$user = Auth::user();

    	$experiments = Experiment::where('creator_id', $user->id)
    							 ->where('active', true)
    							 ->paginate(10);

    	$classrooms = Classroom::where('instructor_id', $user->id)
    						   ->where('active', true)
    						   ->get();

    	return view('instructor.experiments')
    		   ->with('experiments', $experiments)
    		   ->with('classrooms', $classrooms);
    }
}
