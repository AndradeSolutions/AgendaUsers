
@extends('layouts.app_book')

@section('content')
	<h3>Contatos</h3><hr>
	@if (count($registros) == 0)
		<p class="alert alert-danger text-center">Não foram encontrado nenhum contato!</p>
	@else
		@php
			$total_contatos = 0;
		@endphp
		{{-- Apresentar as notícias existentes na base de dados --}}
		@foreach ($registros as $contato)
				<div class="row bg-info" style="padding: 5px 0px 5px 0px">
					<div class="col-md-9">
						<ul><li>
							<h3>{{ $contato->book_name }}</h3>
							<h5>{{ $contato->book_email }}</h5>
							<h5>{{ $contato->book_phone }}</h5>
						</li></ul>
					</div>
				</div>
				<hr>
				@php
					$total_contatos++;
				@endphp
			
		@endforeach	
		<div class="row">
			<div class="col-md-12 text-right">
				<p>Nº total de contatos: {{ $total_contatos }}</p>
			</div>
		</div>
	@endif
@endsection