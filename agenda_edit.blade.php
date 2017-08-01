
@extends('layouts.app_book')

@section('content')
	<form method="POST" action="/update_book/{{ $contato->book_id }}">
		{{ csrf_field() }}
		<h3>Editar contato</h3><hr>
		{{-- CATEGORY OF THE NEWS --}}
		<div class="form-group">
			<label for="name">Nome</label>
			<input type="text" class="form-control" id="name" name="text_name" 
					value="{{ $contato->book_name }}" autofocus="true" required="true"/>
		</div>
		<div class="form-group">
			<label for="email">E-mail</label>
			<input type="text" class="form-control" id="email" name="text_email" 
					value="{{ $contato->book_email }}"/>
		</div>
		<div class="form-group">
			<label for="phone">Telefone</label>
			<input type="text" class="form-control" id="phone" name="text_phone" 
					value="{{ $contato->book_phone }}"/>
		</div>
		<div class="text-center">
			<button class="btn btn-success" role="submit">Atualizar notícia</button>
		</div>
	</form>
@endsection