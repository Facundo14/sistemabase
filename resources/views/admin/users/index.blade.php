@extends('admin.layout')
@section('header')
	 <h1>
        Posts
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Usuarios</li>
      </ol>
@stop
@section('contenido')

<div class="box box-primary">
	<div class="box-header">
	  	<h3 class="box-title">Listado de usuarios</h3>
	</div>
	<!-- /.box-header -->
	<div class="box-body">
	  <table id="user-table" class="table table-bordered table-striped">
	    <thead>
	    <tr>
	      <th>#</th>
	      <th>Nombre</th>
	      <th>Email</th>
	      <th>Avatar</th>
	      <th>Roles</th>
	      <th>Condición</th>
	      <th>@can('create', $users->first() )
			&nbsp;<a href="{{ route('admin.users.create') }}" class="btn btn-primary btn-xs" title="Agregar"><i class="fa fa-plus"></i></a>
		  @endcan</th>
	    </tr>
	    </thead>
	    <tbody>
	    	@foreach($users as $user)
	    	<tr>
	    		<td>{{ $user->id }}</td>
	    		<td>{{ $user->name }}</td>
	    		<td>{{ $user->email }}</td>
	    		<td><img width="50px" class="img-thumbnail" src="{{asset('img/'.$user->foto) }}"></img></td>
	    		<td>{{ $user->getRoleNames()->implode(', ') }}</td>
	    		<td>@if ($user->condicion == true)
						<a href="#" class="btn btn-success btn-xs" title="Activado"><i class="fa fa-check-circle"></i></a>
	    			@else
						<form action="{{ route('admin.users.activar', $user) }}" method="POST" style="display: inline;" >
							{{csrf_field()}} {{method_field('PUT')}}
							<button title="Activar" class="btn btn-danger btn-xs" onclick="return confirm('Estas seguro de querer activar el usuario?')"><i class="fa fa-remove"></i></button>
						</form>
	    			@endif
	    		</td>
	    		<td>
	    			@can('view', $user)
	    				<a href="{{ route('admin.users.show', $user) }}" class="btn btn-info btn-xs" title="Ver"><i class="fa fa-eye"></i></a>
	    			@endcan
	    			@can('update', $user)
	    				<a href="{{ route('admin.users.edit', $user) }}" class="btn btn-warning btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
	    			@endcan
	    			@can('delete', $user)
		    			<form action="{{ route('admin.users.destroy', $user) }}" method="POST" style="display: inline;" >
		    				{{csrf_field()}} {{method_field('DELETE')}}
		    				<button title="Eliminar" class="btn btn-danger btn-xs" onclick="return confirm('Estas seguro de querer eliminar el usuario?')"><i class="fa fa-trash-o"></i></button>
		    			</form>
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
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.css') }}">
@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>
<script>
  $(function () {
    $("#user-table").DataTable({
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