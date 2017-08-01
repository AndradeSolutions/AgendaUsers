
@extends('layouts.app')

{{-- REGISTER FORM --}}

@section('content')
	<div class="row">
		<div class="col-md-4  col-md-offset-4  col-sm-8  col-sm-offset-2  col-xs-12">
			{{-- INCLUDE ERRORS --}}
			@include('includes.errors')
			<form method="POST" action="/execute_recovery">
				{{-- CSRF TOKEN--}}
				{{ csrf_field() }}
				<div class="text-center">
					<label id="textMessageRegister" for="textMessageRegister">Recuperação de senha</label>
				</div>
				{{-- E-MAIL --}}
				<div class="form-group">
					<label for="userEmail">Endereço de e-mail</label>
					<input type="text" class="form-control" id="userEmail" name="text_email" placeholder="E-mail" autofocus="true">
				</div><br>
				{{-- SUBMIT --}}
				<div class="text-center">
					<button id="btnSub" type="submit" class="btn btn-success  col-md-12">ENVIAR E-MAIL</button><br><br><br>
					<a href="/">Voltar</a>
				</div>
			</form>
		</div>
	</div>
@endsection