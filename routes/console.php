<?php

use Illuminate\Foundation\Inspiring;
use FisiLabs\Experiment;

use FisiLabs\Facades\FisiLabsCalc;

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
	
	$exs = Experiment::where('active', true)->get();

	foreach ($exs as $e) 
	{
		FisiLabsCalc::experimentTotalError($e);
	}

})->describe('Calculates the error for all experiment at the application');
