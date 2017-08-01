
@extends('layouts.app')

{{-- REGISTER FORM --}}

@section('content')
	<div class="row">
		<div class="col-md-4  col-md-offset-4  col-sm-8  col-sm-offset-2  col-xs-12">
			{{-- INCLUDE ERRORS --}}
			@include('includes.errors')
			<form method="POST" action="/execute_create">
				{{-- CSRF TOKEN--}}
				{{ csrf_field() }}
				<div class="text-center">
					<label id="textMessageRegister" for="textMessageRegister">Crie uma conta grátis</label>
				</div>
				{{-- FIRST NAME --}}
				<div class="form-group">
					<label for="userName">Nome</label>
					<input type="text" class="form-control" id="userName" name="text_first_name" placeholder="Nome" autofocus="true">
				</div>				
				{{-- LAST NAME --}}
				<div class="form-group">
					<label for="userLastName">Sobrenome</label>
					<input type="text" class="form-control" id="userLastName" name="text_last_name" placeholder="Sobrenome">
				</div>
				{{-- E-MAIL --}}
				<div class="form-group">
					<label for="userEmail">Endereço de e-mail</label>
					<input type="text" class="form-control" id="userEmail" name="text_email" placeholder="E-mail">
				</div>
				{{-- PASSWORD --}}
				<div class="form-group">
					<label for="userPassword">Senha - ( mínimo 6 caracteres )</label>
					<input type="password" class="form-control" id="userPassword" name="text_password" placeholder="Senha">
				</div>
				{{-- PASSWORD REPEAT--}}
				<div class="form-group">
					<label for="userRepeatPassword">Repetir senha</label>
					<input type="password" class="form-control" id="userRepeatPassword" name="text_repeat_password" placeholder="Repetir senha">
				</div>
				<div class="text-center">
					<input id="check_terms_and_conditions" type="checkbox" name="check_terms_and_conditions" value="1"> Concordo com os termos e condições de uso.
				</div><br>
				{{-- SUBMIT --}}
				<div class="text-center">
					<button id="btnSub" type="submit" class="btn btn-success  col-md-12">CADASTRAR</button><br><br><br>
					<a href="/">Voltar</a>
				</div>
			</form>
		</div>
	</div>
@endsection