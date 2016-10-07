<?php

namespace FisiLabs\Facades;

use FisiLabs\Sample;
use FisiLabs\Experiment;
use FisiLabs\ExperimentGroup;
use FisiLabs\ExperimentGroupDevice;
use FisiLabs\ExperimentDevice;

use FisiLabs\Interfaces\HasExperimentalUncertainty;
use FisiLabs\Interfaces\IsExperimentalResult;

class FisiLabsCalc
{

	public static function experimentTotalError(Experiment $experiment) 
	{
		if ( ! $experiment->using_multiple_devices) 
		{
			if ($experiment->measure_type == "simple") 
			{
				if ($experiment->experiment_mode == "individual") 
				{
					FisiLabsCalc::calculateExperimentalTotalError($experiment);
				}
				else
				{
					foreach ($experiment->groups() as $group) 
					{
						FisiLabsCalc::calculateExperimentalTotalError($group);
					}

					FisiLabsCalc::calculateExperimentalTotalError($experiment);
				}
			}
			else if ($experiment->measure_type == "multiple") 
			{
				if ($experiment->experiment_mode == "individual") 
				{
					foreach ($experiment->samples as $sample) 
					{
						if ($sample->active) 
						{
							FisiLabsCalc::calculateExperimentalTotalError($sample, $experiment->scale_error);
						}
					}
				}
				else 
				{
					foreach ($experiment->groups() as $group) 
					{
						foreach ($group->samples() as $sample) 
						{
							FisiLabsCalc::calculateExperimentalTotalError($sample, $experiment->scale_error);
						}
					}

					FisiLabsCalc::calculateExperimentalTotalError($experiment);
				}
			}
		}
		else 
		{						
			if ($experiment->measure_type == "simple") 
			{

				if ($experiment->experiment_mode == "individual") 
			    {
					foreach ($experiment->devices() as $device) 
					{
						FisiLabsCalc::calculateExperimentalTotalError($device);
					}

				}
				else
				{
					foreach ($experiment->groups() as $group) 
					{
						foreach ($group->groupDevices() as $rel) 
						{
							FisiLabsCalc::calculateExperimentalTotalError($rel, $rel->device->scale_error);
						}
					}

					foreach ($experiment->devices() as $device) 
					{
						FisiLabsCalc::calculateExperimentalTotalError($device);
					}
				}
			}
			else if ($experiment->measure_type == "multiple") 
			{
				if ($experiment->experiment_mode == "individual") 
				{
					foreach ($experiment->devices() as $device) 
					{
						foreach ($device->samples() as $sample) 
						{
							FisiLabs::calculateExperimentalTotalError($sample, $device->scale_error);
						}
					}
				}
				else 
				{
					foreach ($experiment->groups() as $group) 
					{
						foreach ($group->groupDevices() as $rel) 
						{
							foreach ($rel->samples() as $sample) 
							{
								FisiLabsCalc::calculateExperimentalTotalError($sample, $rel->device->scale_error);
							}
						}
					}

					foreach ($experiment->devices() as $device) 
					{
						FisiLabsCalc::calculateExperimentalTotalError($device);
					}
				}
			}

		}

		return 1;
	}

	public static function isValidSample (IsExperimentalResult $sample, Experiment $experiment) 
	{
		if ($experiment->is_ranged) 
		{
			if ($sample->value > $experiment->range_stop) return 0;
			if ($sample->value < $experiment->range_start) return 0;
		}

		return $sample->active;
	}

	private static function calculateExperimentalTotalError (HasExperimentalUncertainty $experiment, $scale_error = null) 
	{
		$sum = 0;
        $count = 0;
        $samples = array();

        foreach ($experiment->samples() as $sample) 
        {
        	if ($experiment instanceof Experiment) 
        	{
        		if (FisiLabsCalc::isValidSample($sample, $experiment)) 
	        	{
		            $sum += $sample->value;
		            $count += 1;

		            array_push($samples, $sample);
	        	}
	        }
	        else
	        {
        		if (FisiLabsCalc::isValidSample($sample, $experiment->experiment)) 
	        	{
		            $sum += $sample->value;
		            $count += 1;

		            array_push($samples, $sample);
	        	}
    		} 
        }

        if ($count > 0) 
        {    
        	if ($scale_error != null) 
        	{
	            $experiment->sistematic_error = $scale_error / 2;
        	}
        	else 
        	{
        		$experiment->sistematic_error = $experiment->scale_error / 2;
        	}

            $experiment->average = $sum / $count;
            
            $experiment->quadratic_average_deviation = 0;

            foreach ($samples as $sample) 
            {
            	$experiment->quadratic_average_deviation += pow($sample->value - $experiment->average, 2);
            }

            $experiment->standard_deviation = sqrt($experiment->quadratic_average_deviation);
            
            $experiment->total_error = sqrt(
                pow($experiment->sistematic_error, 2) + pow($experiment->standard_deviation, 2)
            );

            if ($experiment instanceof Sample) 
            {
            	$experiment->value = $experiment->average;
            }

            $experiment->save();
        }
	}


}
