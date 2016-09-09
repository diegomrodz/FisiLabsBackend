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
			<a href="#" data-toggle="modal" data-target="#experimentModal">Novo Experimento</a>
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
					<td>{{ $experiment->unit_name }}</td>
					<td>{{ number_format($experiment->average, $experiment->sig_figures) }} &plusmn; {{ number_format($experiment->total_error, $experiment->sig_figures) }} {{ $experiment->unit }}</td>
					<td>
						<a ng-click="load({{ $experiment->id }})" href="#">Editar</a>
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
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Experimento</h4>
			</div>
			<div class="modal-body">
				<form>
					<div class="form-group">
				    	<label for="name">Nome do Experimento</label>
				    	<input ng-model="experiment.name" type="text" class="form-control">
				  	</div>

				  	<div class="form-group">
				  		<label for="classroom">Sala de Estudos</label>
				  		<select ng-model="experiment.classroom_id" class="form-control">
							@foreach ($classrooms as $classroom)
								<option value="{{ $classroom->id }}">{{ $classroom->name }}</option>
							@endforeach
						</select>
				  	</div>

					<div class="form-group">
				    	<label for="name">Descrição</label>
				    	<textarea ng-model="experiment.description" class="form-control" rows="3"></textarea>
				    </div>

				    <div class="form-group">
				    	<label for="name">Instrumento de Medição</label>
				    	<input ng-model="experiment.measure_device" type="text" class="form-control">
				  	</div>

					<div class="form-group col-sm-8">
						<label for="name">Unidade</label>
					    <input ng-model="experiment.unit_name" type="text" class="form-control">
				    </div>

				    <div class="form-group col-sm-4">
				    	<label for="name">Símbolo</label>
				    	<input ng-model="experiment.unit_name" type="text" class="form-control">
				    </div>

				    <div class="form-group">
				    	<label for="name">Fíguras Significativas</label>
				    	<input ng-model="experiment.sig_figures" type="text" class="form-control">
				  	</div>

				  	<div class="form-group">
				    	<label for="name">Erro de Escala</label>
				    	<input ng-model="experiment.scale_error" type="text" class="form-control">
				  	</div>

				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
				<button type="button" ng-click="create()" class="btn btn-primary">Criar</button>
			</div>
		</div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script type="text/javascript">

	angular.module('fisilabs', [])

	.config(function ($interpolateProvider) {
		$interpolateProvider.startSymbol('${');
		$interpolateProvider.endSymbol('}');
	})

	.service('currentExperiment', function () {
		var service = this;

		var __experiment = {};

		service.get = function () {
			return __experiment;
		};

		service.set = function (experiment) {
			__experiment = experiment;
		};

		service.clear = function (experiment) {
			__experiment = {};
		};
	})

	.controller('listExperimentsCtrl', function ($scope, $http, currentExperiment) {

		$scope.load = function (id) {
			currentExperiment.clear();

			$http.get('/api/experiment/detail/' + id).then(
				function onSuccess (res) {
					currentExperiment.set(res.data);
				},
				function onError (res) {
					alert("Houve um erro na obtenção do experimento.");
				}
			);
		};

	})

	.controller('experimentCtrl', function ($scope, $http, currentExperiment) {
		$scope.experiment = currentExperiment.get();

		$scope.create = function () {
			$http.post('/api/experiment/create', JSON.stringify($scope.experiment)).then(
				function onSuccess () {
					currentExperiment.clear();
					alert("Experimento criado com sucesso");
				},
				function onError () {
					alert("Houve um erro na criãção do experimento.");
				}
			);
		};
	});

</script>

@endsection