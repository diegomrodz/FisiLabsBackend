<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

class Sample extends Model
{
    public function experiment() 
    {
    	return $this->hasOne('FisiLabs\Experiment', 'id', 'experiment_id');
    }

    public function user() 
    {
    	return $this->hasOne('FisiLabs\User', 'id', 'user_id');
    }
}
