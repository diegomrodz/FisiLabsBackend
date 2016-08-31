<?php

namespace FisiLabs\Http\Controllers\Admin;

use Illuminate\Http\Request;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

class OAuthController extends Controller
{
    public function __invoke() 
    {
    	return view('admin.oauth');
    }
}
