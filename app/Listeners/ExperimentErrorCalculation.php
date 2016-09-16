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
       
        if ($experiment->experiment_mode == 'individual') 
        {
            $experiment->calculateTotalError();
        }
        else 
        {
            foreach ($experiment->groups() as $group) 
            {
                $group->calculateTotalError();
            }
        }
    }
}
