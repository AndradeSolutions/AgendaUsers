
@extends('layouts.app_book')

@section('content')
	<h3>Painel de controle</h3><hr>
	{{-- Verifica se há notícias em nossa base de dados --}}
	@if (count($registros) == 0)
		<div class="row">
			<div class="col-md-12 text-center">
				<p class="alert alert-danger text-center">Não foram encontrados contatos!</p>		
			</div>
		</div>
	@else
		@foreach ($registros as $contato)
			@include('includes.book_line')
		@endforeach
	@endif
@endsection