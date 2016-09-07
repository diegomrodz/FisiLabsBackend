<?php

namespace FisiLabs\Listeners;

use FisiLabs\Events\SampleWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class ExperimentErrorCalculation
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  SampleWasCreated  $event
     * @return void
     */
    public function handle(SampleWasCreated $event)
    {
        $experiment = $event->experiment;
        $samples = $experiment->samples; 
        $sum = 0;
        $count = 0;

        $experiment->sistematic_error = $experiment->scale_error / 2;

        foreach ($samples as $sample) 
        {
            $sum += $sample->value;
            $count += 1; 
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

        $experiment->save();
    }
}
