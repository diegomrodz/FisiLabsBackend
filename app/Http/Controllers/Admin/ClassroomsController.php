<?php

namespace FisiLabs\Http\Controllers\Admin;

use Illuminate\Http\Request;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

use FisiLabs\Classroom;

class ClassroomsController extends Controller
{
    public function __invoke() 
    {
    	return view('admin.classrooms')
    		   ->with('classrooms', Classroom::paginate(10));
    }
}
