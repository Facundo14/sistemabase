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
	<form method="POST" action="{{ route('admin.users.update', $user) }}">
		{{csrf_field()}} {{method_field('PUT')}}
		<div class="col-md-6">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Datos personales</h3>
				</div>
				<div class="box-body">
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
					<div class="form-group {{ $errors->has('username') ? 'has-error' : '' }}">
						<label>Username:</label>
						<input name="username" type="text" class="form-control" placeholder="Ingresa el usuario" value="{{old('username', $user->username)}}">
						{!!$errors->first('username', '<span class="help-block">:message</span>')!!}

					</div>
					<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
						<label>Nombre:</label>
						<input name="name" type="text" class="form-control" placeholder="Ingresa el nombre del usuario" value="{{old('name', $user->name)}}">
						{!!$errors->first('name', '<span class="help-block">:message</span>')!!}

					</div>
					<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
						<label>Email:</label>
						<input name="email" type="text" class="form-control" placeholder="Ingresa el nombre del usuario" value="{{old('email', $user->email)}}">
						{!!$errors->first('email', '<span class="help-block">:message</span>')!!}
					</div>

					<div class="form-group">
						<label for="password">Contraseña:</label>
						<input name="password" type="password" class="form-control" placeholder="Contraseña">
						<span class="help-block">Dejar en blanco si no quieres cambiar la contraseña</span>
						{!!$errors->first('password', '<span class="help-block">:message</span>')!!}
					</div>

					<div class="form-group">
						<label for="password_confirmation">Repite la contraseña:</label>
						<input name="password_confirmation" type="password" class="form-control" placeholder="Repite la contraseña">
						{!!$errors->first('password', '<span class="help-block">:message</span>')!!}
					</div>

					<button class="btn btn-primary btn-block">Actualizar usuario</button>

				</div>
			</div>
		</div>
	</form>
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Roles</h3>
			</div>
			<div class="box-body">
				@role('Admin')
					<form method="POST" action="{{ route('admin.users.roles.update', $user) }}" >
						{{csrf_field()}} {{method_field('PUT')}}

						@include('admin.roles.checkboxes')

						<button class="btn btn-primary btn-block">Actualizar roles</button>
					</form>
				@else
					<ul class="list-group">
						@forelse ($user->roles as $role)
							<li class="list-group-item">{{ $role->display_name }}</li>
						@empty
							<li class="list-group-item">No tiene Roles</li>
						@endforelse
					</ul>

				@endrole
			</div>
		</div>
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Permisos</h3>
			</div>
			<div class="box-body">
				@role('Admin')
					<form method="POST" action="{{ route('admin.users.permissions.update', $user) }}" >
						{{csrf_field()}} {{method_field('PUT')}}

						@include('admin.permisos.checkboxes', ['model' => $user])

						<button class="btn btn-primary btn-block">Actualizar permisos</button>
					</form>
				@else
					<ul class="list-group">
						@forelse ($user->permissions as $permission)
							<li class="list-group-item">{{ $permission->display_name }}</li>
						@empty
							<li class="list-group-item">No tiene Permisos</li>
						@endforelse
					</ul>

				@endrole
			</div>
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
	 	role : true
	 });
</script>

@endpush
