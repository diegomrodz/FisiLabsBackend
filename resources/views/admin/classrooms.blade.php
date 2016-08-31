@extends('layouts.dashboard')

@section('dashboard-content')

<style scoped>
	.pagination {
		margin: 0px !important;
	}
</style>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="panel-title">Lista de Salas de Estudo</span>
	</div>

	<div class="panel-body">
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Nome</th>
					<th>Instrutor</th>
					<th></th>
					<th></th>
				</tr>		
			</thead>
			<tbody>
				@foreach($classrooms as $classroom)
				<tr>
					<td>{{ $classroom->id }}</td>
					<td>{{ $classroom->name }}</td>
					<td>{{ $classroom->instructor->name }}</td>
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
		{{ $classrooms->links() }}
	</div>
</div>

@endsection