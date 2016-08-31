<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    public function creator() 
    {
    	return $this->hasOne('FisiLabs\User', 'id', 'creator_id');
    }

    public function classroom() 
    {
    	return $this->hasOne('FisiLabs\User', 'id', 'classroom_id');
    }
}
