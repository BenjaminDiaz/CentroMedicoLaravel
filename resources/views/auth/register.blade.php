@extends('app')

@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 col-md-offset-2">
			<div class="panel panel-default">
				<div class="panel-heading">Registro</div>
				<div class="panel-body">
					@if (count($errors) > 0)
						<div class="alert alert-danger">
							<strong>Oops!</strong> Hubo problemas con los datos ingresados:<br><br>
							<ul>
								@foreach ($errors->all() as $error)
									<li>{{ $error }}</li>
								@endforeach
							</ul>
						</div>
					@endif

					{!! Form::open(['url' => 'auth/register', 'class' => 'form-horizontal']) !!}
						<div class="form-group">
							<label class="col-md-4 control-label">Nombre</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="nombre" value="{{ old('nombre') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">RUT</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="rut" value="{{ old('rut') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Apellido Paterno</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="apellido_paterno" value="{{ old('apellido_paterno') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Apellido Materno</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="apellido_materno" value="{{ old('apellido_materno') }}">
							</div>
						</div>
						<div class="form-group">
						<label class="col-md-4 control-label">Género</label>						
						<div class="col-md-6">
						<div class="radio">
  							<label><input type="radio" name="genero" value='m'>Masculino</label>
						</div>
						<div class="radio">
  							<label><input type="radio" name="genero" value='f'>Femenino</label>
						</div>
						<div class="radio">
  							<label><input type="radio" name="genero" value='o'>Otro</label>
						</div>
						</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Teléfono</label>
							<div class="col-md-6">
								<input type="tel" class="form-control" name="telefono" value="{{ old('telefono') }}">
							</div>
						</div>
					    <div class="form-group">
							<label class="col-md-4 control-label">Calle</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="calle" value="{{ old('calle') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Numero</label>
							<div class="col-md-6">
								<input type="text" class="form-control" name="numero" value="{{ old('numero') }}">
							</div>
						</div>
						<div class="form-group">
							<label class="col-md-4 control-label">Comuna</label>
							<div class="col-md-6">
								<select class="form-control" name="comuna">
									@foreach ($comunas as $comuna)
										<option value="{{ $comuna->id }}">{{ $comuna->nombre }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Prevision Medica</label>
							<div class="col-md-6">
								<select class="form-control" name="prevision">
									@foreach ($previsiones as $prevision)
										<option value="{{ $prevision->id }}">{{ $prevision->nombre }}</option>
									@endforeach
								</select>
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">E-Mail</label>
							<div class="col-md-6">
								<input type="email" class="form-control" name="email" value="{{ old('email') }}">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password">
							</div>
						</div>

						<div class="form-group">
							<label class="col-md-4 control-label">Confirme Password</label>
							<div class="col-md-6">
								<input type="password" class="form-control" name="password_confirmation">
							</div>
						</div>

						<div class="form-group">
							<div class="col-md-6 col-md-offset-4">
								<button type="submit" class="btn btn-primary">
									Registrar
								</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
