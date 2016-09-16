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

    public function groups() 
    {
        return ExperimentGroup::where('experiment_id', $this->id)
                              ->where('active', true)
                              ->get();
    }

    public function calculateTotalError() 
    {
        $sum = 0;
        $count = 0;

        foreach ($this->samples as $sample) 
        {
            $sum += $sample->value;
            $count += 1; 
        }

        if ($count > 0) 
        {       
            $this->sistematic_error = $this->scale_error / 2;

            $this->average = $sum / $count;
            
            $this->quadratic_average_deviation = 0;

            foreach ($this->samples as $sample) 
            {
                $this->quadratic_average_deviation += pow($sample->value - $this->average, 2);
            }

            $this->standard_deviation = sqrt($this->quadratic_average_deviation);
            
            $this->total_error = sqrt(
                pow($this->sistematic_error, 2) + pow($this->standard_deviation, 2)
            );

            $this->save();
        }
    }
}
