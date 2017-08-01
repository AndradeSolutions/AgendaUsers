
@extends('layouts.app_book')

@section('content')
	{{-- Apresenta o formulário para criação de nova notícia --}}
	<form method="POST" action="/save_book">
		{{ csrf_field() }}
		<h3>Novo contato</h3><hr>
		<div class="form-group">
			<label for="name">Nome</label>
			<input type="text" class="form-control" id="name" name="text_name" 
					placeholder="Nome" required="true"/>
		</div>
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="text" class="form-control" id="email" name="text_email" 
					placeholder="E-mail" required="true"/>
		</div>
		<div class="form-group">
			<label for="phone">Telefone</label>
			<input type="text" class="form-control" id="phone" name="text_phone" 
					placeholder="Telefone" required="true"/>
		<br>
		<br>
		<br>
		<div class="text-center">
			<button class="btn btn-success" role="submit">Salvar contato</button>
		</div>
	</form>
@endsection