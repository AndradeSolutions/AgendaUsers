
<div class="row">
	{{-- CATEGORY --}}
	<div class="col-md-2">
		<strong>{{ $contato->book_name }}</strong>
	</div>
	<div class="col-md-4">
		<strong>{{ $contato->book_email }}</strong>
	</div>
	<div class="col-md-2">
		<strong>{{ $contato->book_phone }}</strong>
	</div>
	{{-- ACTION --}}
	<div class="col-md-3 text-right">
		<a href="/edit_book/{{ $contato->book_id }}" class="btn btn-warning" role="button">Editar
		</a>
		{{-- TO DELETE --}}
		<a href="/delete_book/{{ $contato->book_id }}" class="btn btn-danger" role="button">Excluir
		</a>
	</div>
</div>