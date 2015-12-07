@extends('app')

@section('content')
@include('partials.banner')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Buscar por especialidad</h3>
			<div class="form-group">
			<select id="especialidades" class="form-control">
				@foreach ($especialidades as $especialidad)
				<option value="{{ $especialidad->id }}">{{ $especialidad->nombre }}</option>
				@endforeach
			</select>
			</div>
			<div class="form-group">
					<button id="buscar_especialidad" type="submit" class="btn btn-primary">
						Buscar
					</button>
			</div>
		</div>
		<div class="col-md-4">
			<h3>Buscar por médico</h3>
			<div class="form-group">
			<select id="medicos" class="form-control">
				@foreach ($medicos as $medico)
				<option value="{{ $medico->id }}">{{ $medico->nombre.' '.$medico->apellido_paterno }}</option>
				@endforeach
			</select>
			</div>
			<div class="form-group">
					<button id="buscar_medico" type="submit" class="btn btn-primary">
						Buscar
					</button>
			</div>
		</div>
		<div class="col-md-4">
			<h3>Buscar por centro médico</h3>
			<div class="form-group">
			<select id="centros_medicos" class="form-control">
				@foreach ($centros_medicos as $centro_medico)
				<option value="{{ $centro_medico->id }}">{{ $centro_medico->nombre }}</option>
				@endforeach
			</select>
			</div>
			<div class="form-group">
					<button id="buscar_centro_medico" type="submit" class="btn btn-primary">
						Buscar
					</button>
			</div>
		</div>
	</div>
</div>

@if (!Auth::guest())
	@include('partials.horasmedicasusuario')
@endif

<script type="text/javascript">
	$('#buscar_especialidad').click(function() {
		select_value = $('#especialidades').val();
		url = '{!! url('/especialidad/') !!}' + '/' +select_value;
		window.location.href = url;
	});
	$('#buscar_medico').click(function() {
		select_value = $('#medicos').val();
		url = '{!! url('/medicos/') !!}' + '/' +select_value;
		window.location.href = url;
	});
	$('#buscar_centro_medico').click(function() {
		select_value = $('#centros_medicos').val();
		url = '{!! url('/centros_medicos/') !!}' + '/' +select_value;
		window.location.href = url;
	});
</script>
@endsection
