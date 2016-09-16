<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

class ExperimentGroupMember extends Model
{
    public function group() 
    {
    	return $this->hasOne('FisiLabs\ExperimentGroup', 'id', 'group_id');
    }

    public function user() 
    {
    	return $this->hasOne('FisiLabs\User', 'id', 'user_id');
    }
}
