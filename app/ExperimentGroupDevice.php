<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

use FisiLabs\Interfaces\HasExperimentalUncertainty;

class ExperimentGroupDevice extends Model implements HasExperimentalUncertainty 
{
    public function device() 
    {
    	return $this->hasOne('FisiLabs\ExperimentDevice', 'id', 'device_id');
    }

	public function experiment() 
    {
    	return $this->hasOne('FisiLabs\Experiment', 'id', 'experiment_id');
    }

    public function group() 
    {
    	return $this->hasOne('FisiLabs\ExperimentGroup', 'id', 'group_id');
    }

    public function samples() 
    {
    	return Sample::where('experiment_id', $this->experiment_id)
                     ->where('experiment_device_id', $this->device_id)
                     ->where('group_id', $this->group_id)
                     ->where('active', true)
    				 ->get();
    }

}
