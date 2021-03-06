<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

use FisiLabs\Interfaces\HasExperimentalUncertainty;

class Experiment extends Model implements HasExperimentalUncertainty 
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

    public function groups() 
    {
        return ExperimentGroup::where('experiment_id', $this->id)
                              ->where('active', true)
                              ->get();
    }

    public function devices() 
    {
        return ExperimentDevice::where('experiment_id', $this->id)
        //                       ->where('active', true)
                               ->get();
    }

    public function experiment () 
    {
        return $this;
    }
}
