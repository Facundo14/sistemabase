@extends('admin.layout')
@section('header')
	 <h1>
        Roles
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Roles</li>
      </ol>
@stop
@section('contenido')

<div class="box box-primary">
	<div class="box-header">
	  <h3 class="box-title">Listado de roles</h3>
		@can('create', $roles->first())
	  		<a href="{{ route('admin.roles.create') }}" class="btn btn-primary pull-right"><i class="fa fa-plus"></i> Crear rol</a>
	  	@endcan
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table id="role-table" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th>#</th>
	      <th>Identificador</th>
	      <th>Nombre</th>
	      <th>Permisos</th>
	      <th>Acciones</th>
	    </tr>
	    </thead>
	    <tbody>
	    	@foreach($roles as $role)
	    	<tr>
	    		<td>{{ $role->id }}</td>
	    		<td>{{ $role->name }}</td>
	    		<td>{{ $role->display_name }}</td>
	    		<td>{{ $role->permissions->pluck('display_name')->implode(', ') }}</td>
	    		<td>
	    			@can('update', $role)
	    			<a href="{{ route('admin.roles.edit', $role) }}" title="Editar" class="btn btn-xs btn-info"><i class="fa fa-edit"></i></a>
	    			@endcan
	    			@can('delete', $role)
	    			@if($role->id !== 1)
		    			<form action="{{ route('admin.roles.destroy', $role) }}" method="POST" style="display: inline;" >
		    				{{csrf_field()}} {{method_field('DELETE')}}
		    				<button title="Eliminar" onclick="return confirm('Estas seguro de querer eliminar el rol?')" class="btn btn-xs btn-danger"><i class="fa fa-trash-o"></i></button>
		    			</form>
	    			@endif
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
<script>
  $(function () {
    $("#role-table").DataTable({
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