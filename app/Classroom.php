<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function instructor() 
    {
    	return $this->hasOne('FisiLabs\User', 'id', 'instructor_id');
    }

    public function students() 
    {
    	return Subscription::where('subscriptions.active', true)
    					  ->where('subscriptions.classroom_id', $this->id)
    					  ->join('users as u', function ($join) {
    					  	$join->on('u.id', '=', 'subscriptions.user_id');
    					  })
    					  ->select('subscriptions.id as subscription_id', 'u.*')
    					  ->get();
    }
}
