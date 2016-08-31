@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-2 sidebar">
			<ul class="nav nav-sidebar">
				<li><a href="{{ url('/admin') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/users') }}">Usuários</a></li>
				<li><a href="{{ url('/admin/classrooms') }}">Salas de Estudo</a></li>
				<li><a href="{{ url('/admin/experiments') }}">Experimentos</a></li>
				<li><a href="{{ url('/admin/samples') }}">Medições</a></li>
				<li><a href="{{ url('/admin/oauth') }}">OAuth</a></li>
			</ul>
		</div>
		<div class="col-md-10">
			@yield('dashboard-content')
		</div>
	</div>
</div>
@endsection