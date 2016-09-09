@extends('layouts.dashboard')

@section('dashboard-content')

<style scoped>
	.pagination {
		margin: 0px !important;
	}
</style>

<div class="panel panel-default">
	<div class="panel-heading">
		<span class="panel-title">Lista de Experimentos</span>
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
		{{ $experiments->links() }}
	</div>
</div>

@endsection