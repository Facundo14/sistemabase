@extends('admin.layout')

@section('header')
	 <h1>
        Empresas
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.empresas.index') }}"><i class="fa fa-list"></i> Empresas</a></li>
        <li class="active">Empresas</li>
      </ol>
@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">Empresas</h3>
			</div>
			<div class="box-body">
				@include('admin.partials.errors-messages')
				<form method="POST" action="{{ route('admin.empresas.store') }}">
				  {{csrf_field()}}
				  <div class="col-md-6">
					  <div class="form-group">
						<label>Nombre:</label>
						<input name="nombre" style="text-transform: uppercase;" {{ old('nombre') }} class="form-control" placeholder="Ingresa el nombre">
					  </div>
					  <div class="form-group">
						<label>Leyenda:</label>
						<input name="leyenda" value="{{ old('leyenda') }}" class="form-control" placeholder="Ingresa la leyenda">
					  </div>
					  <div class="form-group">
						<label>Leyenda Factura:</label>
						<textarea rows="10" name="leyenda_factura" type="text" class="form-control" placeholder="Ingresa la leyenda de factura">{{ old('leyenda_factura') }}</textarea>
					  </div>
				  </div>
				  <div class="col-md-6">
					<div class="form-group">
					  <label>CUIT:</label>
					  <input name="cuit" value="{{ old('cuit') }}" class="form-control" placeholder="Ingresa el cuit">
					</div>
					<div class="form-group">
					  <label>Direccion:</label>
					  <input name="direccion" {{ old('direccion') }} class="form-control" placeholder="Ingresa la direccion">
					</div>
					<div class="form-group">
					  <label>Teléfono:</label>
					  <input name="telefono" value="{{ old('telefono') }}" class="form-control" placeholder="Ingresa la telefono">
					</div>
					<div class="form-group">
					  <label>Email:</label>
					  <input type="email" name="email" value="{{ old('email') }}" class="form-control" placeholder="Ingresa la email">
					</div>
					<div class="form-group">
					  <label>Responsable:</label>
					  <input name="responsable" value="{{ old('responsable') }}" class="form-control" placeholder="Ingresa la responsable">
					</div>
				  </div>
		
			  </div>
			  <div class="box-footer">
				<div class="btn-group pull-right">
					<button class="btn btn-app"><i class="fa fa-save"></i> Guardar</button>
						<a type="button" href="{{ route('admin.empresas.index') }}" class="btn btn-app"><i class="fa fa-reply"></i> Cancelar</a>
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
