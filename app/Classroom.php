<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function instructor() 
    {
    	return $this->hasOne('FisiLabs\User', 'id', 'instructor_id');
    }
}
