@extends('layouts.dashboard')

@section('dashboard-content')
<style scoped>
	.pagination {
		margin: 0px !important;
	}

	.panel-header-controls {
		float: right;
	}

	div.form-group.col-sm-8 {
		padding-left: 0px;
	}

	div.form-group.col-sm-4 {
		padding-left: 0px;
		padding-right: 0px;
	}

	div.form-group.col-sm-6 {
		padding-left: 0px;
		padding-right: 0px;
	}
</style>

<div class="panel panel-default" ng-controller="listExperimentsCtrl">
	<div class="panel-heading">
		<span class="panel-title">Lista de Experimentos</span>

		<div class="panel-header-controls">
			<a href="#" ng-click="new()" data-toggle="modal" data-target="#experimentModal">Novo Experimento</a>
		</div>
	</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Sala de Estudo</th>
					<th>Criador</th>
					<th>Equip. de Medição</th>
					<th>Unidade</th>
					<th>Valor Médio</th>
					<th></th>
					<th></th>
				</tr>		
			</thead>
			<tbody>
				@foreach($experiments as $experiment)
				<tr>
					<td>{{ $experiment->id }}</td>
					<td>{{ $experiment->name }}</td>
					<td>{{ $experiment->classroom->name }}</td>
					<td>{{ $experiment->creator->name }}</td>
					<td>{{ $experiment->measure_device }}</td>
					<td>{{ $experiment->unit_name === "" ? "AD" : $experiment->unit_name }}</td>
					<td>{{ number_format($experiment->average, $experiment->sig_figures) }} &plusmn; {{ number_format($experiment->total_error, $experiment->sig_figures) }} {{ $experiment->unit }}</td>
					<td>
						<a data-toggle="modal" data-target="#experimentModal" ng-click="load({{ $experiment->id }})" href="#">Editar</a>
					</td>
					<td>
						<a class="text-danger" href="#">Excluir</a>
					</td>
				</tr>
				@endforeach
			</tbody>
		</table>
	</div>

	<div class="panel-footer">
		{{ $experiments->links() }}
	</div>
</div>

<div ng-controller="experimentCtrl" id="experimentModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header" ng-if="config.mode == 'new'">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Novo Experimento</h4>
			</div>

			<div class="modal-header" ng-if="config.mode == 'edit'">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Experimento #${ config.form.id }</h4>
			</div>
			
			<div class="modal-body">
				<form>
					<div class="form-group">
				    	<label for="name">Nome do Experimento</label>
				    	<input ng-model="config.form.name" type="text" class="form-control" maxlength="50">
				    	<p class="help-block">${ 50 - config.form.name.length } caracteres restantes</p>
				  	</div>

				  	<div class="form-group">
				  		<label for="classroom">Sala de Estudos</label>
				  		<select id="classroom_id" ng-model="config.form.classroom_id" class="form-control">
				  			<option value="">Selecione uma sala de aula</option>
							@foreach ($classrooms as $classroom)
								<option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
							@endforeach
						</select>
				  	</div>

					<div class="form-group">
				    	<label for="name">Descrição</label>
				    	<textarea ng-model="config.form.description" class="form-control" rows="3" maxlength="512"></textarea>
				    	<p class="help-block">${ 512 - config.form.description.length } caracteres restantes</p>
				    </div>


				  	<div class="form-group">
				  		<label for="classroom">Modo do Experimento</label>
				  		<select ng-model="config.form.experiment_mode" class="form-control">
				  			<option value="">Escolha o modo de experimento</option>
							<option value="individual">Individual</option>
							<option value="group">Em Grupo</option>
						</select>
						<p class="help-block" ng-if="config.form.experiment_mode == 'individual'">Em uma atividade individual, a sala atua como um único grupo</p>
						<p class="help-block" ng-if="config.form.experiment_mode == 'group'">Atividades em grupo terão suas medidas agrupadas</p>
				  	</div>

				    <div class="form-group">
				    	<label for="name">Instrumento de Medição</label>
				    	<input ng-model="config.form.measure_device" type="text" maxlength="40" class="form-control">
				    	<p class="help-block">${ 40 - config.form.measure_device.length } caracteres restantes</p>
				  	</div>

					<div class="form-group col-sm-8">
						<label for="name">Unidade</label>
					    <input ng-model="config.form.unit_name" maxlength="30" type="text" class="form-control">
					    <p class="help-block">${ 30 - config.form.unit_name.length } caracteres restantes</p>
				    </div>

				    <div class="form-group col-sm-4">
				    	<label for="name">Símbolo</label>
				    	<input ng-model="config.form.unit" type="text" class="form-control" maxlength="8">
				    	<p class="help-block">${ 8 - config.form.unit.length } caracteres restantes</p>
				    </div>

				    <div class="form-group">
				    	<label for="name">Fíguras Significativas</label>
				    	<input ng-model="config.form.sig_figures" type="text" min=0 max=10 step=1 class="form-control">
				  		<p class="help-block">Apenas números inteiros de 0 a 10</p>
				  	</div>

				  	<div class="form-group">
				    	<label for="name">Erro de Escala</label>
				    	<input ng-model="config.form.scale_error" type="number" min=0 step=0.10 class="form-control">
				  	</div>

				</form>
			</div>
			<div class="modal-footer" ng-if="config.mode == 'new'">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" ng-click="create()" class="btn btn-primary">Criar</button>
			</div>

			<div class="modal-footer" ng-if="config.mode == 'edit'">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" ng-click="edit()" class="btn btn-primary">Editar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

	angular.module('fisilabs', [])

	.run(function ($http) {
		$http.defaults.headers.common.Authorization = 'Bearer ' + $("#access_token").val();
	})

	.config(function ($interpolateProvider) {
		$interpolateProvider.startSymbol('${');
		$interpolateProvider.endSymbol('}');
	})

	.service('experimentModalConfig', function () {
		return {
			form: {},
			mode: 'new'
		};
	})

	.controller('listExperimentsCtrl', function ($scope, $http, experimentModalConfig) {

		$scope.load = function (id) {


			$http.get('/api/experiment/detail/' + id).then(
				function onSuccess (res) {
					experimentModalConfig.form = res.data;
					experimentModalConfig.mode = 'edit';

					$("#classroom_id").val(res.data.classroom_id);
				},
				function onError (res) {
					alert("Houve um erro na obtenção do experimento.");
				}
			);
		};

		$scope.new = function () {
			experimentModalConfig.mode = 'new';
			experimentModalConfig.form = {};
		};

	})

	.controller('experimentCtrl', function ($scope, $http, experimentModalConfig) {
		$scope.config = experimentModalConfig;
		var hasClicked = false;

		function checkForm() {
			// TODO: Função para validação de formulário
			return true;
		};

		$scope.create = function () {
			hasClicked = true;

			if (checkForm()) {
				$http.post('/api/experiment/create', JSON.stringify($scope.config.form)).then(
					function onSuccess () {
						experimentModalConfig.form = {};
						alert("Experimento criado com sucesso");
						hasClicked = false;
					},
					function onError () {
						alert("Houve um erro na criãção do experimento.");
						hasClicked = false;
					}
				);

				$("experimentModal").modal('close');
			} else {
				hasClicked = false;
			}
		};

		$scope.edit = function () {
			console.log($scope.experiment);
		};


	});

</script>

@endsection