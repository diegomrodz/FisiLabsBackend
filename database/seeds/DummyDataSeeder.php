<?php

use Illuminate\Database\Seeder;

use FisiLabs\User;
use FisiLabs\Experiment;
use FisiLabs\ExperimentSubscription;
use FisiLabs\ExperimentGroup;
use FisiLabs\ExperimentGroupMember;
use FisiLabs\ExperimentGroupDevice;
use FisiLabs\ExperimentDevice;
use FisiLabs\Classroom;
use FisiLabs\Sample;
use FisiLabs\Subscription;
use FisiLabs\SampleValue;

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
						"name" => "Experimento com medidas simples",
						"desc" => "Experimento para testar aplicação",
						"measure_device" => "Cronometro",
						"scale_error" => 0.05,
						"unit" => "s",
						"unit_name" => "Segundo",
						"mode" => "individual",
						"is_ranged" => false,
						"using_multiple_devices" => false,
						"measure_type" => "simple",

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
						"name" => "Experimento em grupo com medidas simples",
						"desc" => "Experimento para testar aplicação",
						"measure_device" => "Cronometro",
						"scale_error" => 0.05,
						"unit" => "s",
						"unit_name" => "Segundo",
						"mode" => "group",
						"is_ranged" => false,
						"using_multiple_devices" => false,
						"measure_type" => "simple",

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
					],

					[
						"name" => "Experimento com medidas simples usando múltiplos dispositivos",
						"desc" => "Experimento para testar aplicação",
						"unit" => "s",
						"unit_name" => "Segundo",
						"mode" => "individual",
						"is_ranged" => false,
						"using_multiple_devices" => true,
						"measure_type" => "simple",

						"instruments" => [
							[
								"experiment_device" => "Cronometro 1",
								"scale_error" => 0.05,
								"decimal_places" => 2,

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
								"experiment_device" => "Cronometro 2",
								"scale_error" => 0.05,
								"decimal_places" => 2,

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
								"experiment_device" => "Cronometro 3",
								"scale_error" => 0.05,
								"decimal_places" => 2,

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
							]
						]

					],

					[
						"name" => "Experimento com medidas simples usando múltiplos dispositivos em grupo",
						"desc" => "Experimento para testar aplicação",
						"unit" => "s",
						"unit_name" => "Segundo",
						"mode" => "group",
						"using_multiple_devices" => true,
						"is_ranged" => false,
						"measure_type" => "simple",

						"instruments" => [
							[
								"experiment_device" => "Cronometro 1",
								"scale_error" => 0.05,
								"decimal_places" => 2,

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

							],
							[
								"experiment_device" => "Cronometro 2",
								"scale_error" => 0.05,
								"decimal_places" => 2,

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

							],
							[
								"experiment_device" => "Cronometro 3",
								"scale_error" => 0.05,
								"decimal_places" => 2,

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
						"name" => "Experimento com medidas multiplas",
						"desc" => "Experimento para testar aplicação",
						"measure_device" => "3 Dados",
						"scale_error" => 0,
						"unit" => "",
						"unit_name" => "",
						"mode" => "individual",
						"using_multiple_devices" => false,
						"is_ranged" => true,
						"range_start" => 3,
						"range_stop" => 18,
						"range_step" => 1,
						"measure_type" => "multiple",

						"samples" => [
							[
								"user" => "aluno.a@email.com",
							],
							[
								"user" => "aluno.b@email.com",
							],
							[
								"user" => "aluno.c@email.com",
							],
							[
								"user" => "aluno.d@email.com",
							],
							[
								"user" => "aluno.e@email.com",
							],
							[
								"user" => "aluno.f@email.com",
							]
						]
					],

					[
						"name" => "Experimento com medidas multiplas em grupo",
						"desc" => "Experimento para testar aplicação",
						"measure_device" => "3 Dados",
						"scale_error" => 0,
						"unit" => "",
						"unit_name" => "",
						"mode" => "group",
						"is_ranged" => true,
						"range_start" => 3,
						"range_stop" => 18,
						"range_step" => 1,
						"using_multiple_devices" => false,
						"measure_type" => "multiple",

						"groups" => [

							"Grupo 1" => [
								[
									"user" => "aluno.a@email.com",
								],
								[
									"user" => "aluno.b@email.com",
								],
								[
									"user" => "aluno.c@email.com",
								]
							],

							"Grupo 2" => [
								[
									"user" => "aluno.d@email.com",
								],
								[
									"user" => "aluno.e@email.com",
								],
								[
									"user" => "aluno.f@email.com",
								]
							]
						]

					],


					[
						"name" => "Experimento com medidas multiplas usando multiplos dispositivos",
						"desc" => "Experimento para testar aplicação",
						"unit" => "s",
						"unit_name" => "Segundos",
						"mode" => "individual",
						"is_ranged" => true,
						"range_start" => 5,
						"range_stop" => 15,
						"range_step" => 1,
						"using_multiple_devices" => true,
						"measure_type" => "multiple",

						"instruments" => [
							[
								"experiment_device" => "Cronometro 1",
								"scale_error" => 0.05,
								"decimal_places" => 2,

								"samples" => [
									[
										"user" => "aluno.a@email.com",
									],
									[
										"user" => "aluno.b@email.com",
									],
									[
										"user" => "aluno.c@email.com",
									],
									[
										"user" => "aluno.d@email.com",
									],
									[
										"user" => "aluno.e@email.com",
									],
									[
										"user" => "aluno.f@email.com",
									]
								]

							],
							[
								"experiment_device" => "Cronometro 2",
								"scale_error" => 0.05,
								"decimal_places" => 2,

								"samples" => [
									[
										"user" => "aluno.a@email.com",
									],
									[
										"user" => "aluno.b@email.com",
									],
									[
										"user" => "aluno.c@email.com",
									],
									[
										"user" => "aluno.d@email.com",
									],
									[
										"user" => "aluno.e@email.com",
									],
									[
										"user" => "aluno.f@email.com",
									]
								]

							],
							[
								"experiment_device" => "Cronometro 3",
								"scale_error" => 0.05,
								"decimal_places" => 2,

								"samples" => [
									[
										"user" => "aluno.a@email.com",
									],
									[
										"user" => "aluno.b@email.com",
									],
									[
										"user" => "aluno.c@email.com",
									],
									[
										"user" => "aluno.d@email.com",
									],
									[
										"user" => "aluno.e@email.com",
									],
									[
										"user" => "aluno.f@email.com",
									]
								]

							]
						]

					],

					[
						"name" => "Experimento com medidas multiplas e instrumentos multiplos em grupo",
						"desc" => "Experimento para testar aplicação",
						"unit" => "s",
						"unit_name" => "Segundos",
						"mode" => "group",
						"is_ranged" => true,
						"using_multiple_devices" => true,
						"measure_type" => "multiple",
						"range_start" => 5,
						"range_stop"  => 15,
						"range_step"  => 1,

						"instruments" => [
							[
								"experiment_device" => "Cronometro 1",
								"scale_error" => 0.05,
								"decimal_places" => 2,

								"groups" => [

									"Grupo 1" => [
										[
											"user" => "aluno.a@email.com",
										],
										[
											"user" => "aluno.b@email.com",
										],
										[
											"user" => "aluno.c@email.com",
										]
									],

									"Grupo 2" => [
										[
											"user" => "aluno.d@email.com",
										],
										[
											"user" => "aluno.e@email.com",
										],
										[
											"user" => "aluno.f@email.com",
										]
									]
								]

							],
							[
								"experiment_device" => "Cronometro 2",
								"scale_error" => 0.05,
								"decimal_places" => 2,

								"groups" => [

									"Grupo 1" => [
										[
											"user" => "aluno.a@email.com",
										],
										[
											"user" => "aluno.b@email.com",
										],
										[
											"user" => "aluno.c@email.com",
										]
									],

									"Grupo 2" => [
										[
											"user" => "aluno.d@email.com",
										],
										[
											"user" => "aluno.e@email.com",
										],
										[
											"user" => "aluno.f@email.com",
										]
									]
								]
							],
							[
								"experiment_device" => "Cronometro 3",
								"scale_error" => 0.05,
								"decimal_places" => 2,

								"groups" => [

									"Grupo 1" => [
										[
											"user" => "aluno.a@email.com",
										],
										[
											"user" => "aluno.b@email.com",
										],
										[
											"user" => "aluno.c@email.com",
										]
									],

									"Grupo 2" => [
										[
											"user" => "aluno.d@email.com",
										],
										[
											"user" => "aluno.e@email.com",
										],
										[
											"user" => "aluno.f@email.com",
										]
									]
								]
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
        			"is_ranged" => $_experiment["is_ranged"],
        			"using_multiple_devices" => $_experiment["using_multiple_devices"],
        			"name" => $_experiment["name"],
        			"measure_type" => $_experiment["measure_type"],
        			"description" => $_experiment["desc"],
        			"unit" => $_experiment["unit"],
        			"unit_name" => $_experiment["unit_name"]
        		]);

        		if ($_experiment["is_ranged"]) 
        		{
        			$experiment->range_start = $_experiment["range_start"];
        			$experiment->range_stop = $_experiment["range_stop"];
        			$experiment->range_step = $_experiment["range_step"];
        		
        			$experiment->save();
        		}

        		if ($_experiment["using_multiple_devices"]) 
        		{
        			if ($_experiment["mode"] == "individual") 
        			{
        				foreach ($_experiment["instruments"] as $_instrument) 
        				{
        					$instrument = ExperimentDevice::create([
        						"name" => $_instrument["experiment_device"],
        						"scale_error" => $_instrument["scale_error"],
        						"decimal_places" => $_instrument["decimal_places"]
        					]);

        					foreach ($_instrument["samples"] as $sample) 
        					{
        						$student = User::where('email', $_sample["user"])->first();

			        			$subscription = ExperimentSubscription::create([
			        				"experiment_id" => $experiment->id,
			        				"user_id" => $student->id
			        			]);

			        			if ($_experiment["measure_type"] == "simple") 
			        			{
									$sample = Sample::create([
					        			"experiment_id" => $experiment->id,
					        			"user_id" => $student->id,
					        			"experiment_device_id" => $instrument->id,
					        			"value" => $_sample["value"]
					        		]);
			        			}
			        			else 
			        			{

			        				$sample = Sample::create([
					        			"experiment_id" => $experiment->id,
					        			"user_id" => $student->id,
					        			"experiment_device_id" => $instrument->id
					        		]);		

			        				if ($experiment->is_ranged) 
			        				{
			        					foreach (range(0, 5) as $value) 
				        				{
					        				$s_value = SampleValue::create([
					        					"sample_id" => $sample->id,
					        					"value" => rand($experiment->range_start, $experiment->range_stop)
					        				]);		
				        				}
			        				}
			        				else 
			        				{
			        					foreach ($_sample["values"] as $value) 
				        				{
					        				$s_value = SampleValue::create([
							        			"sample_id" => $sample->id,
							        			"value" => $value
							        		]);		
				        				}	
			        				}
			        			}
        					}
        				}
        			}
        			else // group 
        			{
        				foreach ($_experiment["instruments"] as $_instrument) 
        				{
        					$instrument = ExperimentDevice::create([
        						"name" => $_instrument["experiment_device"],
        						"experiment_id" => $experiment->id,
        						"scale_error" => $_instrument["scale_error"],
        						"decimal_places" => $_instrument["decimal_places"]
        					]);

        					foreach ($_instrument["groups"] as $groupName => $_group) 
        					{
        						$group = ExperimentGroup::create([
        							"experiment_id" => $experiment->id,
        							"name" => $groupName
        						]);

        						$groupDevice = ExperimentGroupDevice::create([
        							"experiment_id" => $experiment->id,
        							"group_id" => $group->id,
        							"device_id" => $instrument->id,
        						]);

        						foreach ($_group as $_member) 
        						{
									$student = User::where('email', $_member["user"])->first();

				        			$subscription = ExperimentSubscription::create([
				        				"experiment_id" => $experiment->id,
				        				"user_id" => $student->id
				        			]);

				        			$member = ExperimentGroupMember::create([
				        				"group_id" => $group->id,
				        				"user_id" => $student->id
				        			]);

				        			if ($_experiment["measure_type"] == "multiple") 
				        			{
				        				$sample = Sample::create([
							        		"experiment_id" => $experiment->id,
							        		"user_id" => $student->id,
							        		"group_id" => $group->id,
							        		"experiment_device_id" => $instrument->id
							        	]);

				        				if ($experiment->is_ranged) 
				        				{
				        					foreach (range(0, 5) as $value) 
				        					{
							        			$s_value = SampleValue::create([
							        				"sample_id" => $sample->id,
							        				"value" => rand($experiment->range_start, $experiment->range_stop)
							        			]);
				        					}
				        				}
				        				else 
				        				{
											foreach ($_group["values"] as $value) 
				        					{
							        			$s_value = SampleValue::create([
							        				"sample_id" => $sample->id,
							        				"value" => $value
							        			]);
				        					}	
				        				}
				        			}
				        			else 
				        			{
				        				$sample = Sample::create([
							        		"experiment_id" => $experiment->id,
							        		"user_id" => $student->id,
							        		"group_id" => $group->id,
							        		"experiment_device_id" => $instrument->id,
							        		"value" => $_member["value"]
							        	]);
				        			}

        						}

        					}
        				}
        			}
        		}
        		else 
        		{
        			$experiment["measure_device"] = $_experiment["measure_device"];

        			$experiment->save();

	        		if ($_experiment["mode"] == "individual") 
	        		{
	        			if ($_experiment["measure_type"] == "simple") 
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
	        			else 
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
			        				"user_id" => $student->id
			        			]);

			        			if ($experiment->is_ranged) 
			        			{
				        			foreach (range(0, 5) as $_value) 
				        			{
				        				$value = SampleValue::create([
						        			"sample_id" => $sample->id,
						        			"value" => rand($experiment->range_start, $experiment->range_stop)
						        		]);
				        			}
			        			}
			        			else 
			        			{
			        				foreach ($_sample["values"] as $_value) 
				        			{
				        				$value = SampleValue::create([
						        			"sample_id" => $sample->id,
						        			"value" => $_value
						        		]);
				        			}
			        			}
			        		}	
	        			}
	        		}
	        		else if ($_experiment["mode"] == "group") 
	        		{
	        			if ($_experiment["measure_type"] == "simple") 
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

				        			$subscription = ExperimentSubscription::create([
				        				"experiment_id" => $experiment->id,
				        				"user_id" => $student->id
				        			]);

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
	        			else // multiple 
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

				        			$subscription = ExperimentSubscription::create([
				        				"experiment_id" => $experiment->id,
				        				"user_id" => $student->id
				        			]);

			        				$member = ExperimentGroupMember::create([
			        					"group_id" => $group->id,
			        					"user_id" => $student->id
			        				]);

			        				$sample = Sample::create([
			        					"experiment_id" => $experiment->id,
			        					"user_id" => $student->id, 
			        					"group_id" => $group->id,
			        				]);

			        				if ($experiment->is_ranged) 
			        				{
			        					foreach (range(0, 5) as $_value) 
				        				{
											$value = SampleValue::create([
					        					"sample_id" => $sample->id,
					        					"value" => rand($experiment->range_start, $experiment->range_stop)
					        				]);
				        				}
			        				}
			        				else 
			        				{
			        					foreach ($_sample["values"] as $_value) 
				        				{
											$value = SampleValue::create([
					        					"sample_id" => $sample->id,
					        					"value" => $_value
					        				]);
				        				}
			        				}
		        				}
		        			}
	        			}
	        		}
        		}
        	}

        }
    }
}
