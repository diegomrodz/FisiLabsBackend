<?php

use Illuminate\Database\Seeder;

use FisiLabs\User;
use FisiLabs\Experiment;
use FisiLabs\Classroom;
use FisiLabs\Sample;
use FisiLabs\Subscription;

class DummyDataSeeder extends Seeder
{
	protected $data = [
		"users" => [
			[
				"name" => "Diego Rodrigues",
				"email" => "diego.mrodrigues@outlook.com",
				"type" => "admin",
			],
			[
				"name" => "Jefferson Fiuza",
				"email" => "jefynho1213@hotmail.com",
				"type" => "admin",
			],
			[
				"name" => "Professor A",
				"email" => "professor.a@email.com",
				"type" => "instructor",
			],
			[
				"name" => "Professor B",
				"email" => "professor.b@email.com",
				"type" => "instructor",
			],
			[
				"name" => "Aluno A",
				"email" => "aluno.a@email.com",
				"type" => "user",
			],
			[
				"name" => "Aluno B",
				"email" => "aluno.b@email.com",
				"type" => "user",
			],
			[
				"name" => "Aluno C",
				"email" => "aluno.c@email.com",
				"type" => "user",
			],
			[
				"name" => "Aluno D",
				"email" => "aluno.d@email.com",
				"type" => "user",
			],
			[
				"name" => "Aluno E",
				"email" => "aluno.e@email.com",
				"type" => "user",
			],
			[
				"name" => "Aluno F",
				"email" => "aluno.f@email.com",
				"type" => "user",
			]
		],

		"classroms" => [
			[
				"instructor" => "professor.a@email.com",
				"name" => "Fisica I - BEC",
				"description" => "Disciplina de Fisica Experimental I do Bacharelado de Engenharia da Computação do Senac",
			
				"experiments" => [
					[
						"name" => "Experimento A",
						"desc" => "Experimento para testar aplicação",
						"measure_device" => "Cronometro",
						"scale_error" => 0.05,
						"sig_figure" => 3,
						"unit" => "s",
						"unit_name" => "Segundos",

						"samples" => [
							[
								"user" => "aluno.a@email.com",
								"value" => 3.23
							],
							[
								"user" => "aluno.b@email.com",
								"value" => 3.08
							],
							[
								"user" => "aluno.c@email.com",
								"value" => 3.30
							],
							[
								"user" => "aluno.d@email.com",
								"value" => 3.26
							],
							[
								"user" => "aluno.e@email.com",
								"value" => 3.19
							],
							[
								"user" => "aluno.f@email.com",
								"value" => 3.18
							]
						]
					],					
					[
						"name" => "Experimento B",
						"desc" => "Experimento para testar aplicação",
						"measure_device" => "Régua",
						"scale_error" => 0.5,
						"sig_figure" => 4,
						"unit" => "m",
						"unit_name" => "Metros",

						"samples" => [
							[
								"user" => "aluno.a@email.com",
								"value" => 1.43
							],
							[
								"user" => "aluno.b@email.com",
								"value" => 2.08
							],
							[
								"user" => "aluno.c@email.com",
								"value" => 1.30
							],
							[
								"user" => "aluno.d@email.com",
								"value" => 2.26
							],
							[
								"user" => "aluno.e@email.com",
								"value" => 2.19
							],
							[
								"user" => "aluno.f@email.com",
								"value" => 1.18
							]
						]
					]
				]

			],
			[
				"instructor" => "professor.b@email.com",
				"name" => "Fisica II - BEC",
				"description" => "Disciplina de Fisica Experimental II do Bacharelado de Engenharia da Computação do Senac",

				"experiments" => [
					[
						"name" => "Experimento A",
						"desc" => "Experimento para testar aplicação",
						"measure_device" => "Cronometro",
						"scale_error" => 0.05,
						"sig_figure" => 3,
						"unit" => "s",
						"unit_name" => "Segundos",

						"samples" => [
							[
								"user" => "aluno.a@email.com",
								"value" => 3.23
							],
							[
								"user" => "aluno.b@email.com",
								"value" => 3.08
							],
							[
								"user" => "aluno.c@email.com",
								"value" => 3.30
							],
							[
								"user" => "aluno.d@email.com",
								"value" => 3.26
							],
							[
								"user" => "aluno.e@email.com",
								"value" => 3.19
							],
							[
								"user" => "aluno.f@email.com",
								"value" => 3.18
							]
						]
					],					
					[
						"name" => "Experimento B",
						"desc" => "Experimento para testar aplicação",
						"measure_device" => "Fita Métrica",
						"scale_error" => 0.5,
						"sig_figure" => 4,
						"unit" => "m",
						"unit_name" => "Metros",

						"samples" => [
							[
								"user" => "aluno.a@email.com",
								"value" => 1.43
							],
							[
								"user" => "aluno.b@email.com",
								"value" => 2.08
							],
							[
								"user" => "aluno.c@email.com",
								"value" => 1.30
							],
							[
								"user" => "aluno.d@email.com",
								"value" => 2.26
							],
							[
								"user" => "aluno.e@email.com",
								"value" => 2.19
							],
							[
								"user" => "aluno.f@email.com",
								"value" => 1.18
							]
						]
					]
				]
			]
		]

	];


    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach ($this->data["users"] as $_user) 
        {
        	$user = User::create([
        		"name" => $_user["name"],
        		"email" => $_user["email"],
        		"type" => $_user["type"],
        		"password" => bcrypt("senha")
        	]);
        }

        $students = User::where('type', 'user')->get();

        foreach ($this->data["classroms"] as $_classrom) 
        {
        	$instructor = User::where('email', $_classrom['instructor'])->first();

        	$classrom = Classroom::create([
        		"instructor_id" => $instructor->id, 
        		"name" => $_classrom["name"],
        		"description" => $_classrom["description"]
        	]);


        	foreach ($students as $student) 
        	{
				Subscription::create([
					"classroom_id" 	=> $classrom->id,
					"user_id"		=> $student->id
				]);        		
        	}

        	foreach ($_classrom["experiments"] as $_experiment) 
        	{
        		$experiment = Experiment::create([
        			"classroom_id" => $classrom->id,
        			"creator_id" => $instructor->id,
        			"name" => $_experiment["name"],
        			"description" => $_experiment["desc"],
        			"measure_device" => $_experiment["measure_device"],
        			"scale_error" => $_experiment["scale_error"],
        			"sig_figures" => $_experiment["sig_figure"],
        			"unit" => $_experiment["unit"],
        			"unit_name" => $_experiment["unit_name"]
        		]);

        		foreach ($_experiment["samples"] as $_sample) 
        		{
        			$student = User::where('email', $_sample["user"])->first();

        			$sample = Sample::create([
        				"experiment_id" => $experiment->id,
        				"user_id" => $student->id,
        				"value" => $_sample["value"]
        			]);
        		}
        	}

        }
    }
}
