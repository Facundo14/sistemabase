@extends('admin.layout')

@section('header')
	 <h1>
        Empresa
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.empresas.index') }}"><i class="fa fa-list"></i> Empresa</a></li>
        <li class="active">Crear</li>
      </ol>
@stop

@section('contenido')
<div class="row">
	@include('admin.partials.errors-messages')
	<form method="POST" action="{{ route('admin.empresas.update', $empresa) }}">
		{{csrf_field()}} {{method_field('PUT')}}
		<div class="col-md-12">
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Datos</h3>
				</div>
				<div class="box-body">
					<div class="col-md-6">
						<div class="form-group">
							<label>Nombre:</label>
							<input name="nombre" style="text-transform: uppercase;" value="{{ old('nombre', $empresa->nombre) }}" class="form-control" placeholder="Ingresa el nombre">
						</div>
						<div class="form-group">
							<label>Leyenda:</label>
							<input name="leyenda" value="{{ old('leyenda', $empresa->leyenda) }}" class="form-control" placeholder="Ingresa la leyenda">
						</div>
						<div class="form-group">
							<label>Leyenda Factura:</label>
							<textarea rows="10" name="leyenda_factura" type="text" class="form-control" placeholder="Ingresa la leyenda de factura">{{ old('leyenda_factura', $empresa->leyenda) }}</textarea>
						</div>
						<div class="form-group">
							<label>CUIT:</label>
							<input name="cuit" style="text-transform: uppercase;" value="{{ old('cuit', $empresa->cuit) }}" class="form-control" placeholder="Ingresa el cuit">
						</div>
					</div>
					<div class="col-md-6">

						<div class="form-group">
							<label>Direccion:</label>
							<input name="direccion" value="{{ old('direccion', $empresa->direccion) }}" class="form-control" placeholder="Ingresa la direccion">
						</div>
						<div class="form-group">
							<label>Teléfono:</label>
							<input name="telefono" value="{{ old('telefono', $empresa->telefono) }}" class="form-control" placeholder="Ingresa la telefono">
						</div>
						<div class="form-group">
							<label>Email:</label>
							<input type="email" name="email" value="{{ old('email', $empresa->email) }}" class="form-control" placeholder="Ingresa la email">
						</div>
						<div class="form-group">
							<label>Responsable:</label>
							<input name="responsable" value="{{ old('responsable', $empresa->responsable) }}" class="form-control" placeholder="Ingresa la responsable">
						</div>
					</div>
				</div>
				<div class="box-footer">
					<div class="btn-group pull-right">
						<button class="btn btn-app"><i class="fa fa-save"></i> Guardar</button>
						<a type="button" href="{{ route('admin.empresas.index') }}" class="btn btn-app"><i class="fa fa-reply"></i> Cancelar</a>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>
@stop

@push('style')
   <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/select2/select2.min.css')}}">
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
<script src="{{ asset('/adminlte/plugins/select2/select2.full.min.js')}}"></script>


@endpush
