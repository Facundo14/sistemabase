@extends('admin.layout')

@section('header')
	 <h1>
        Categorias
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('categorias.index') }}"><i class="fa fa-list"></i> Categorias</a></li>
        <li class="active">Categorias</li>
      </ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Categorias</h3>
			</div>
			<div class="box-body">
				@include('admin.partials.errors-messages')
				<form method="POST" action="{{ route('categorias.store') }}">
				  {{csrf_field()}}
				  	<div class="col-md-6">
					  <div class="form-group">
						<label>Nombre:</label>
						<input name="nombre" style="text-transform: uppercase;" {{ old('nombre') }} class="form-control" placeholder="Ingresa el nombre">
					  </div>
					  <div class="form-group">
						<label>Descripcion:</label>
						<input name="descripcion" style="text-transform: uppercase;" {{ old('descripcion') }} class="form-control" placeholder="Ingresa la descripcion">
					  </div>
					</div>
			  </div>
			  <div class="box-footer">
				<div class="btn-group pull-right">
					<button class="btn btn-app"><i class="fa fa-save"></i> Guardar</button>
						<a type="button" href="{{ route('categorias.index') }}" class="btn btn-app"><i class="fa fa-reply"></i> Cancelar</a>
				</div>
			</div>
			</form>
		</div>
	</div>

</div>
@stop

@push('style')
   <!-- Select2 -->
  <link rel="stylesheet" href="/adminlte/plugins/select2/select2.min.css">
@endpush

@push('scripts')
<script>
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2()
   }
 );
</script>
<!-- Select2 -->
<script src="/adminlte/plugins/select2/select2.full.min.js"></script>
@endpush
