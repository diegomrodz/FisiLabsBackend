<?php

namespace FisiLabs\Http\Controllers\Admin;

use Illuminate\Http\Request;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

use FisiLabs\Sample;

class SamplesController extends Controller
{
    public function __invoke() 
    {
    	return view('admin.samples')
    		   ->with('samples', Sample::paginate(10));
    }
}
