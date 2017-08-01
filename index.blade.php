
@extends('layouts.app')

{{-- LOGIN FORM --}}

@section('content')
	
	<div class="row">
		<div class="col-md-4  col-md-offset-4  col-sm-8  col-sm-offset-2  col-xs-12">
			{{-- INCLUDE ERRORS --}}
			@include('includes.errors')
			<form method="POST" action="/execute_login">
				{{-- CSRF TOKEN--}}
				{{ csrf_field() }}
				<div class="text-center">
					<label id="textMessageSignIn" for="textMessageSignIn">Faça login para iniciar sua sessão</label>
				</div>
				{{-- E-MAIL --}}
				<div class="form-group">
					<label for="userEmail">Endereço de e-mail</label>
					<input type="text" class="form-control" id="userEmail" name="text_email" placeholder="E-mail" autofocus="true">
				</div>
				{{-- PASSWORD --}}
				<div class="form-group">
					<label for="userPassword">Senha</label>
					<input type="password" class="form-control" id="userPassword" name="text_password" placeholder="Senha">
				</div>
				<div>
					<input id="checkConn" type="checkbox" name="checkConnected" checked="true"> Manter-me conectado
				</div><br>
				{{-- SUBMIT --}}
				<div class="text-center">
					<button id="btnSub" type="submit" class="btn btn-primary col-md-12">ENTRAR</button>
				</div>
			</form>
			<div id="recover" class="row  col-md-14  text-center">
				<br><br><br><br>
				{{-- FORGOT PASSWORD --}}
				<a id="forgotPass" href="/recovery">Esqueceu sua senha?</a>
				<br><br>
				{{-- CREATE NEW ACCOUNT --}}
				<label id="textMessageCreate" for="textMessageCreate">Não tem um cadastro? </label>
				<a id="createAccount" href="/create"><strong>CADASTRE-SE</strong></a>
			</div>
		</div>
	</div>

@endsection