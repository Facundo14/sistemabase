@extends('admin.layout')
@section('header')
	 <h1>
        Permisos
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Permisos</li>
      </ol>
@stop
@section('contenido')

<div class="box box-primary">
	<div class="box-header">
	  <h3 class="box-title">Listado de permisos</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table id="permission-table" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th>#</th>
	      <th>Identificador</th>
	      <th>Nombre</th>
	      <th>Acciones</th>
	    </tr>
	    </thead>
	    <tbody>
	    	@foreach($permissions as $permission)
	    	<tr>
	    		<td>{{ $permission->id }}</td>
	    		<td>{{ $permission->name }}</td>
	    		<td>{{ $permission->display_name }}</td>
	    		<td>
	    			@can('update', $permission)
	    				<a href="{{ route('admin.permissions.edit', $permission) }}" title="Editar" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
	    			@endcan
	    		</td>
	    	</tr>
	    	@endforeach
	    </tbody>
	  </table>
	</div>

	<!-- /.box-body -->
	</div>

@stop

@push('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css')}}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/extensions/Buttons/js/buttons.flash.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/extensions/Buttons/js/jszip.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/extensions/Buttons/js/pdfmake.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/extensions/Buttons/js/vfs_fonts.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/extensions/Buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/extensions/Buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/extensions/Buttons/js/dataTables.buttons.min.js')}}"></script>
<script>
  $(function () {
    $("#permission-table").DataTable({
				"language": {
					"sProcessing":     "Procesando...",
					"sLengthMenu":     "Mostrar _MENU_ registros",
					"sZeroRecords":    "No se encontraron resultados",
					"sEmptyTable":     "Ningún dato disponible en esta tabla",
					"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
					"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
					"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
					"sInfoPostFix":    "",
					"sSearch":         "Buscar:",
					"sUrl":            "",
					"sInfoThousands":  ",",
					"sLoadingRecords": "Cargando...",
					"oPaginate": {
							"sFirst":    "Primero",
							"sLast":     "Último",
							"sNext":     "Siguiente",
							"sPrevious": "Anterior"
					},
					"oAria": {
							"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
							"sSortDescending": ": Activar para ordenar la columna de manera descendente"
					}
			}
    });
  });

</script>

@endpush