@extends('app')

@section('content')
<div class="container">	
	<div class="row">
		<div class="col-md-12">
		<h3>{{$centro_medico->nombre}}</h3>
		<table class="table">
		  <tr>
		    <th>Nombre</th>
		    <th>Especialidad</th>
		    <th></th>
		  </tr>
		  @foreach ($medicos as $medico)
		  <tr>
		    <td>{{ $medico->nombre }} {{ $medico->apellido_paterno }}</td>
		    <td>{{ $medico->especialidad->nombre }}</td>
		    <td><a class="btn btn-primary btn-xs" href="{{ url('medicos/'.$medico->id) }}">Ver horas disponibles</a></td>
		  </tr>
		  @endforeach
		</table>
		</div>
	</div>
</div>
@endsection