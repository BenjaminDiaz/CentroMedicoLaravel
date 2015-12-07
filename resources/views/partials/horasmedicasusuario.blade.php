<div class="container">
	<h3>Horas Medicas</h3>
		<table class="table">
		  <tr>
		  	<th>Fecha</th>
		    <th>Medico</th>
		    <th>Centro Medico</th>
		    <th>Hora Inicio</th>
		    <th>Hora Termino</th>
		    <th></th>
		  </tr>
		  @foreach ($user->horasMedicas as $horaMedica)
		  <tr>
		    <td>{{ $horaMedica->hora_inicio->format('j / n / Y') }}</td>
		    <td>{{ $horaMedica->medico->nombre }}</td>
		    <td>{{ $horaMedica->medico->centroMedico->nombre }}</td>
		    <td>{{ $horaMedica->hora_inicio->format('h:i A') }}</td>
		    <td>{{ $horaMedica->hora_termino->format('h:i A') }}</td>
		    <td><a class="btn btn-primary btn-xs" href="{{ url('horas_medicas/'.$horaMedica->id.'/cancelar') }}">Cancelar</a></td>
		  </tr>
		  @endforeach
		</table>
</div>