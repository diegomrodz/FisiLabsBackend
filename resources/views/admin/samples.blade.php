@extends('layouts.dashboard')

@section('dashboard-content')

<style scoped>
	.pagination {
		margin: 0px !important;
	}
</style>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="panel-title">Lista de Medições</span>
	</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Experimento</th>
					<th>Aluno</th>
					<th>Medição</th>
					<th></th>
					<th></th>
				</tr>		
			</thead>
			<tbody>
				@foreach($samples as $sample)
				<tr>
					<td>{{ $sample->id }}</td>
					<td>{{ $sample->experiment->name }}</td>
					<td>{{ $sample->user->name }}</td>
					<td>{{ $sample->value }}</td>
					<td>
						<a href="#">Editar</a>
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
		{{ $samples->links() }}
	</div>
</div>

@endsection