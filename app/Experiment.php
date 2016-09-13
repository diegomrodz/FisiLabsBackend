<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

class Experiment extends Model
{
    protected $fillable = [
        "creator_id",
        "classroom_id",
        "experiment_mode",
        "name",
        "description",
        "measure_device",
        "scale_error",
        "sig_figures",
        "unit",
        "unit_name"
    ];

    public function creator() 
    {
    	return $this->hasOne('FisiLabs\User', 'id', 'creator_id');
    }

    public function classroom() 
    {
    	return $this->hasOne('FisiLabs\Classroom', 'id', 'classroom_id');
    }

    public function samples() 
    {
    	return $this->hasMany('FisiLabs\Sample', 'experiment_id', 'id');
    }
}
