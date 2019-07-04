@extends('admin.layout')

@section('header')
	 <h1>
        Roles
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.roles.index') }}"><i class="fa fa-list"></i> Roles</a></li>
        <li class="active">Crear</li>
      </ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-6">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Roles</h3>
			</div>
			<div class="box-body">

				@include('admin.partials.errors-messages')

				<form method="POST" action="{{ route('admin.roles.store') }}">

					@include('admin.roles.form')

					<button class="btn btn-primary btn-block">Crear Rol</button>
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
<script>
	$(".select2").select2({
	 	role : true
	 });
</script>

@endpush
