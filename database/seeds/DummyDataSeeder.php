<?php

use Illuminate\Database\Seeder;

use FisiLabs\User;
use FisiLabs\Experiment;
use FisiLabs\ExperimentSubscription;
use FisiLabs\ExperimentGroup;
use FisiLabs\ExperimentGroupMember;
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
						"unit" => "s",
						"unit_name" => "Segundo",
						"mode" => "individual",

						"samples" => [
							[
								"user" => "aluno.a@email.com",
								"value" => 3.23
							],
							[
								"user" => "aluno.a@email.com",
								"value" => 3.25
							],
							[
								"user" => "aluno.a@email.com",
								"value" => 3.24
							],
							[
								"user" => "aluno.b@email.com",
								"value" => 3.14
							],
							[
								"user" => "aluno.b@email.com",
								"value" => 3.12
							],
							[
								"user" => "aluno.b@email.com",
								"value" => 3.10
							],
							[
								"user" => "aluno.c@email.com",
								"value" => 3.15
							],
							[
								"user" => "aluno.c@email.com",
								"value" => 3.11
							],
							[
								"user" => "aluno.c@email.com",
								"value" => 3.20
							],
							[
								"user" => "aluno.d@email.com",
								"value" => 3.13
							],
							[
								"user" => "aluno.d@email.com",
								"value" => 3.13
							],
							[
								"user" => "aluno.d@email.com",
								"value" => 3.10
							],
							[
								"user" => "aluno.e@email.com",
								"value" => 3.11
							],
							[
								"user" => "aluno.e@email.com",
								"value" => 3.12
							],
							[
								"user" => "aluno.e@email.com",
								"value" => 3.13
							],
							[
								"user" => "aluno.f@email.com",
								"value" => 3.18
							],
							[
								"user" => "aluno.f@email.com",
								"value" => 3.15
							],
							[
								"user" => "aluno.f@email.com",
								"value" => 3.10
							]
						]
					],					
					[
						"name" => "Experimento A",
						"desc" => "Experimento para testar aplicação",
						"measure_device" => "Cronometro",
						"scale_error" => 0.05,
						"unit" => "s",
						"unit_name" => "Segundo",
						"mode" => "group",

						"groups" => [

							"Grupo 1" => [
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
								]
							],

							"Grupo 2" => [
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
						"unit" => "s",
						"unit_name" => "Segundo",
						"mode" => "individual",

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
						"unit" => "m",
						"unit_name" => "Metro",
						"mode" => "individual",

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
        			"experiment_mode" => $_experiment["mode"],
        			"name" => $_experiment["name"],
        			"description" => $_experiment["desc"],
        			"measure_device" => $_experiment["measure_device"],
        			"scale_error" => $_experiment["scale_error"],
        			"unit" => $_experiment["unit"],
        			"unit_name" => $_experiment["unit_name"]
        		]);

        		if ($_experiment["mode"] == "individual") 
        		{
        			foreach ($_experiment["samples"] as $_sample) 
	        		{
	        			$student = User::where('email', $_sample["user"])->first();

	        			$subscription = ExperimentSubscription::create([
	        				"experiment_id" => $experiment->id,
	        				"user_id" => $student->id
	        			]);

	        			$sample = Sample::create([
	        				"experiment_id" => $experiment->id,
	        				"user_id" => $student->id,
	        				"value" => $_sample["value"]
	        			]);
	        		}
        		}
        		else if ($_experiment["mode"] == "group") 
        		{
        			foreach ($_experiment["groups"] as $_groupName => $_group) 
        			{
        				$group = ExperimentGroup::create([
        					"experiment_id" => $experiment->id,
        					"name" => $_groupName
        				]);

        				foreach ($_group as $_sample) 
        				{
		        			$student = User::where('email', $_sample["user"])->first();

	        				$member = ExperimentGroupMember::create([
	        					"group_id" => $group->id,
	        					"user_id" => $student->id
	        				]);

	        				$sample = Sample::create([
	        					"experiment_id" => $experiment->id,
	        					"user_id" => $student->id, 
	        					"group_id" => $group->id,
	        					"value" => $_sample["value"]
	        				]);
        				}
        			}
        		}
        	}

        }
    }
}
