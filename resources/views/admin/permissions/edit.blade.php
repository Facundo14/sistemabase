@extends('admin.layout')

@section('header')
	 <h1>
        Permisos
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.permissions.index') }}"><i class="fa fa-list"></i> Permisos</a></li>
        <li class="active">Crear</li>
      </ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Permisos</h3>
			</div>
			<div class="box-body">

				@include('admin.partials.errors-messages')

				<form method="POST" action="{{ route('admin.permissions.update', $permission) }}">
				{{method_field('PUT')}} {{csrf_field()}}

				<div class="form-group">
					<label>Identificador:</label>
					<input value="{{ $permission->name }}" class="form-control" disabled>
				</div>

				<div class="form-group">
					<label>Nombre:</label>
					<input name="display_name" value="{{ old('display_name', $permission->display_name) }}" class="form-control">
				</div>

					<button class="btn btn-primary btn-block">Actualizar permisos</button>
				</form>
			</div>
		</div>
	</div>

</div>
@stop

@push('style')
   <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2/select2.min.css')}}">
@endpush

@push('scripts')

<!-- Select2 -->
<script src="{{ asset('/adminlte/plugins/select2/select2.full.min.js')}}"></script>

@endpush
