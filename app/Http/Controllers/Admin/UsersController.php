<?php

namespace FisiLabs\Http\Controllers\Admin;

use Illuminate\Http\Request;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

use FisiLabs\User;

class UsersController extends Controller
{
    public function __invoke() 
    {
    	return view('admin.users')
    		   ->with('users', User::paginate(10));
    }
}
