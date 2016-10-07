<?php

namespace FisiLabs\Http\Controllers\Api;

use Illuminate\Http\Request;

use FisiLabs\Http\Requests;
use FisiLabs\Http\Controllers\Controller;

use FisiLabs\ExperimentGroup;
use FisiLabs\ExperimentGroupMember;

use Auth;

class ExperimentGroupController extends Controller
{
    public function getSubscribe($id) 
    {
    	$user = Auth::guard('api')->user();
    	$group = ExperimentGroup::find($id);

    	$subs = new ExperimentGroupMember;

    	$subs->group_id = $group->id;
    	$subs->user_id = $user->id;

    	$subs->save();

    	return $subs;
    }
}
