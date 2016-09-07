<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

class Subscription extends Model
{
	public function user() 
	{
		return $this->hasOne('FisiLabs\User', 'id', 'user_id');
	}

    public function classroom() 
    {
    	return $this->hasOne('FisiLabs\Classroom', 'id', 'classroom_id');
    }
}
