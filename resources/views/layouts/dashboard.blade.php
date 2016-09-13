@extends('layouts.app')

@section('content')
<input type="hidden" id="access_token" value="{{ $access_token }}">

<div class="container">
	<div class="row">
		<div class="col-md-2 sidebar">
			@if ($user->type == 'admin')
			<ul class="nav nav-sidebar">
				<li><a href="{{ url('/admin') }}">Dashboard</a></li>
				<li><a href="{{ url('/admin/users') }}">Usuários</a></li>
				<li><a href="{{ url('/admin/classrooms') }}">Salas de Estudo</a></li>
				<li><a href="{{ url('/admin/experiments') }}">Experimentos</a></li>
				<li><a href="{{ url('/admin/samples') }}">Medições</a></li>
				<li><a href="{{ url('/admin/oauth') }}">OAuth</a></li>
			</ul>
			@elseif ($user->type == 'instructor')
			<ul class="nav nav-sidebar">
				<li><a href="{{ url('/instructor') }}">Dashboard</a></li>
				<li><a href="{{ url('/instructor/experiments') }}">Experimentos</a></li>
			</ul>
			@endif
		</div>
		<div class="col-md-10">
			@yield('dashboard-content')
		</div>
	</div>
</div>
@endsection