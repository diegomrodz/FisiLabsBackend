<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

use FisiLabs\Interfaces\HasExperimentalUncertainty;

class ExperimentDevice extends Model implements HasExperimentalUncertainty 
{
    public function experiment() 
    {
    	return $this->hasOne('FisiLabs\Experiment', 'id', 'experiment_id');
    }

    public function samples() 
    {
    	return Sample::where('experiment_device_id', $this->experiment_id)
    				 ->where('active', true)
    				 ->get();
    }
}
