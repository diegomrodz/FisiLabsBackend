<?php

use Illuminate\Foundation\Inspiring;
use FisiLabs\Experiment;
use FisiLabs\Events\SampleWasCreated;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
});

Artisan::command('calc:all', function () {
	foreach (Experiment::get() as $experiment) 
	{
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
})->describe('Calculates the error for all experiment at the application');
