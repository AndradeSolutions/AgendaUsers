
@extends('layouts.app')

@section('content')
	<div class="row">
		<p>Usuário: <strong>{{ session('user_first_name') }}</strong></p>
		<a href="/agenda_index">Acessar agenda de contatos</a><br><br><br>
	</div>
	<div class="row">
		<a href="/application_logout">Logout</a>
	</div>	

@endsection