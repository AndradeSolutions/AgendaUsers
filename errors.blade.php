
{{-- VALIDATION ERRORS --}}
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li><strong>Erro: {{ $error }}</strong></li>
            @endforeach
        </ul>
    </div>
@endif

{{-- DATA BASE ERRORS --}}
@if (isset($errors_bd))
	<div class="alert alert-danger">
        <ul>
            @foreach ($errors_bd as $error)
                <li><strong>Erro: {{ $error }}</strong></li>
            @endforeach
        </ul>
    </div>
@endif