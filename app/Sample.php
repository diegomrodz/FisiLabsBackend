<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

use FisiLabs\Interfaces\HasExperimentalUncertainty;
use FisiLabs\Interfaces\IsExperimentalResult;

class Sample extends Model implements HasExperimentalUncertainty, IsExperimentalResult
{
    public function experiment() 
    {
    	return $this->hasOne('FisiLabs\Experiment', 'id', 'experiment_id');
    }

    public function user() 
    {
    	return $this->hasOne('FisiLabs\User', 'id', 'user_id');
    }

    public function values() 
    {
    	return SampleValue::where('sample_id', $this->id)
    					  ->where('active', true)
    					  ->get();
    }

    public function samples() 
    {
    	return $this->values();
    }
}
