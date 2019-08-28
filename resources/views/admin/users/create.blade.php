@extends('admin.layout')

@section('header')
	 <h1>
        Usuarios
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.users.index') }}"><i class="fa fa-list"></i> Usuarios</a></li>
        <li class="active">Crear</li>
      </ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Datos personales</h3>
			</div>
			<div class="box-body">
				<form method="POST" action="{{ route('admin.users.store') }}" enctype="multipart/form-data">
				{{csrf_field()}}
					{{-- Otra forma para mostrar los errores en lista y en una sola linea --}}
					{{-- @if ($errors->any())
						<ul class="list-group">
							@foreach ($errors->all() as $error)
								<li class="list-group-item list-group-item-danger">
									{{ $error }}
								</li>
							@endforeach
						</ul>
					@endif --}}
					<div class="col-md-12">
						<div class="col-md-6">
							<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
								<label>Usuario:</label>
								<input name="username" type="text" class="form-control" placeholder="Ingresa el usuario">
								{!!$errors->first('username', '<span class="help-block">:message</span>')!!}

							</div>
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
								<label>Nombre:</label>
								<input name="name" type="text" class="form-control" placeholder="Ingresa el nombre del usuario">
								{!!$errors->first('name', '<span class="help-block">:message</span>')!!}

							</div>
							<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
								<label>Email:</label>
								<input name="email" type="text" class="form-control" placeholder="Ingresa el nombre del usuario">
								{!!$errors->first('email', '<span class="help-block">:message</span>')!!}
							</div>

							<div class="form-group">
								<label for="password">Contraseña:</label>
								<input name="password" type="password" class="form-control" placeholder="Contraseña">
								{!!$errors->first('password', '<span class="help-block">:message</span>')!!}
							</div>

							<div class="form-group">
								<label for="password_confirmation">Repite la contraseña:</label>
								<input name="password_confirmation" type="password" class="form-control" placeholder="Repite la contraseña">
								{!!$errors->first('password', '<span class="help-block">:message</span>')!!}
							</div>
							<div class="form-group">
								<label>Permisos</label>
								@include('admin.permissions.checkboxes', ['model' => $user])
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="form-group col-md-4">
								<label>Roles</label>
								@include('admin.roles.checkboxes', ['model' => $user])
							</div>
							<div class="form-group col-md-8">
								<label>Foto</label>
								<input name="foto" type="file" class="form-control" placeholder="Ingresa el foto del usuario">
								{!!$errors->first('foto', '<span class="help-block">:message</span>')!!}
							</div>
						</div>
						<div class="form-group col-md-6">
							<div class="form-group col-md-4">
								<label>Tipo:</label>
								<select name="tipo_dni" class="form-control" placeholder="Ingresa el nombre del usuario">
									<option value="DNI">DNI</option>
									<option value="CUIT">CIUT</option>
									<option value="LC">LC</option>
								</select>
								{!!$errors->first('tipo_dni', '<span class="help-block">:message</span>')!!}
							</div>
							<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }} col-md-8">
								<label>DNI:</label>
								<input name="dni" class="form-control" placeholder="Ingresa el dni del usuario">
								{!!$errors->first('dni', '<span class="help-block">:message</span>')!!}
							</div>
						</div>
					</div>
			</div>
			<div class="box box-warning collapsed-box">
				<div class="box-header with-border">
					<h3 class="box-title">Datos adicionales</h3>
					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i></button>
					</div>
				</div>
				<div class="box-body" style="display: none;">
					<div class="col-md-6">
						<div class="form-group">
							<label for="direccion">Dirección</label>
							<input name="direccion" type="text" class="form-control" placeholder="Dirección">
							{!!$errors->first('direccion', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="telefono">Teléfono</label>
							<input name="telefono" type="text" class="form-control" placeholder="Teléfono">
							{!!$errors->first('telefono', '<span class="help-block">:message</span>')!!}
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<div class="btn-group pull-right">
					<button class="btn btn-app"><i class="fa fa-save"></i> Guardar</button>
						<a type="button" href="{{ route('admin.users.index') }}" class="btn btn-app"><i class="fa fa-reply"></i> Cancelar</a>
				</div>
			</div>
				</form>
		</div>
	</div>

</div>
@stop

@push('style')
   <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/select2/select2.min.css') }}">
@endpush

@push('scripts')

<!-- Select2 -->
<script src="{{ asset('adminlte/plugins/select2/select2.full.min.js') }}"></script>
<script>
	$(".select2").select2({
		language: {
		noResults: function (params) {
			return "Sin resultados";
		}
		}
	 });
</script>
@endpush
