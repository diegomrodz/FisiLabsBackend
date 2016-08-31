<?php

namespace FisiLabs\Http\Controllers\Admin;

use Illuminate\Http\Request;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

use FisiLabs\Experiment;

class ExperimentsController extends Controller
{
    public function __invoke() 
    {
    	return view('admin.experiments')
    		   ->with('experiments', Experiment::paginate(10));
    }
}
