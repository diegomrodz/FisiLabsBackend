<?php

namespace FisiLabs;

use Illuminate\Database\Eloquent\Model;

use FisiLabs\Interfaces\HasExperimentalUncertainty;

class ExperimentGroup extends Model implements HasExperimentalUncertainty 
{
    public function experiment() 
    {
    	return $this->hasOne('FisiLabs\Experiment', 'id', 'experiment_id');
    }

    public function samples() 
    {
        return Sample::where('experiment_id', $this->experiment_id)
                     ->where('group_id', $this->id)
                     ->where('active', true)
                     ->get();
    }

    public function groupDevices() 
    {
        return ExperimentGroupDevice::where('group_id', $this->id)
                                    ->where('active', true)
                                    ->get();
    }
}
