@extends('admin.layout')
@section('header')
	 <h1>
        Empresas
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Empresas</li>
      </ol>
@stop
@section('contenido')
<div class="row">
	<div class='col-md-12'>
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-12 col-sm-8">

                        <div class='box box-solid box-primary'>
                            <div class="box-header">
							  <h3 class="box-title">Listado de empresas</h3>
							</div>
                            <div class='box-body pad'>
								@include('admin.empresas.list')
                            </div>
                        </div><!-- /.box -->
                    </div><!-- /.col (RIGHT) -->
                </div><!-- /.row -->
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div><!-- /.col-->
</div>
@stop

@push('style')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.css')}}">
  <link rel="stylesheet" href="{{ asset('/adminlte/plugins/datatables/extensions/Buttons/css/buttons.datatables.css')}}">


@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>

<script>
  $(function () {
    $("#empresa-table").DataTable({
        "aoColumnDefs": [{ 'bSortable': false, 'aTargets': [ 3 ] }],
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