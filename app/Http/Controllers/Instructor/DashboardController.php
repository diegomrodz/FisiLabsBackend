<?php

namespace FisiLabs\Http\Controllers\Instructor;

use Illuminate\Http\Request;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function __invoke() 
    {
    	return view('instructor.dashboard');
    }
}
