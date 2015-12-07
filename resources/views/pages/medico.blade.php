@extends('app')

@section('content')
<div class="container">	
	<div class="row">
		@if (count($errors) > 0)
			<div class="alert alert-danger">
				
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif
		<div class="col-md-12">
		<h3>{{$medico->nombre.' '.$medico->apellido_paterno.' | '.$medico->especialidad->nombre}}</h3>
		<table class="table">
		  <tr>
		    <th>Dia</th>
		    <th>Hora Inicio</th>
		    <th>Hora Termino</th>
		    <th></th>
		  </tr>
		  @foreach($medico->horasMedicas()->disponible()->get() as $horaMedica)
		  <tr>
		  	<td>{{ $horaMedica->hora_inicio->format('j / n / Y') }}</td>
		    <td>{{ $horaMedica->hora_inicio->format('h:i A') }}</td>
		    <td>{{ $horaMedica->hora_termino->format('h:i A') }}</td>
		    <td><a class="btn btn-primary btn-xs" href="{{ url('horas_medicas/'.$horaMedica->id.'/agendar') }}">Agendar hora</a></td>
		  </tr>
		  @endforeach
		</table>
		</div>
	</div>
</div>
@endsection