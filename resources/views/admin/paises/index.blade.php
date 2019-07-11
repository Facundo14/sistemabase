@extends('admin.layout')
@section('header')
	 <h1>
        Paises
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Paises</li>
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
							  <h3 class="box-title">Listado de Paises</h3>
							</div>
                            <div class='box-body pad'>
								@include('admin.paises.list')
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
  <!-- toastr notifications -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">
  


@endpush

@push('scripts')
<!-- DataTables -->
<script src="{{ asset('/adminlte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('/adminlte/plugins/datatables/dataTables.bootstrap.min.js')}}"></script>
<!-- toastr notifications -->
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>


<script>
  $(function () {
    $("#empresa-table").DataTable({
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
{{--
@if (count($errors) > 0)
    <script>
        $( document ).ready(function() {
            $('#addModal').modal('show');
        });
    </script>
@endif --}}
<script type="text/javascript">
     // add a new post
     $(document).on('click', '.add-modal', function() {
            $('.modal-title').text('Add');
            $('#addModal').modal('show');
        });
        $('.modal-footer').on('click', '.add', function() {
            $.ajax({
                type: 'POST',
                url: $(formId).attr('action'),
                data: {
                    '_token': $('input[name=_token]').val(),
                    'name': $('#name_add').val(),
                    'shortname': $('#shortname_add').val()
                },
                success: function(data) {
                    $('.errorName').addClass('hidden');
                    $('.errorShortname').addClass('hidden');
                    

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#addModal').modal('show');
                            toastr.error('Eror de validacion!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.errorName').removeClass('hidden');
                            $('.errorName').text(data.errors.name);
                        }
                        if (data.errors.shortname) {
                            $('.errorShortname').removeClass('hidden');
                            $('.errorShortname').text(data.errors.shortname);
                        }
                    } else {
                        toastr.success('Pais guardado!', 'Confirmado!', {
                            timeOut: 1000,
                            fadeOut: 1000,
                            onHidden: function () {
                                    window.location.reload();
                                }
                            });
                            
                        
                    }
                },
            });
        });

        // Edit a post
        $(document).on('click', '.edit-modal', function() {
            $('.modal-title').text('Edit');
            $('#id_edit').val($(this).data('id'));
            $('#name_edit').val($(this).data('name'));
            $('#shortname_edit').val($(this).data('shortname'));
            id = $('#id_edit').val();
            action = $(formIdEdit).attr('action');
            $('#editModal').modal('show');
        });
        $('.modal-footer').on('click', '.edit', function() {
            $.ajax({
                type: 'PUT',
                url: action,
                data: {
                    '_token': $('input[name=_token]').val(),
                    'id': $("#id_edit").val(),
                    'name': $('#name_edit').val(),
                    'shortname': $('#shortname_edit').val()
                },
                success: function(data) {
                    $('.errorName').addClass('hidden');
                    $('.errorShortname').addClass('hidden');

                    if ((data.errors)) {
                        setTimeout(function () {
                            $('#editModal').modal('show');
                            toastr.error('Validation error!', 'Error Alert', {timeOut: 5000});
                        }, 500);

                        if (data.errors.name) {
                            $('.errorName').removeClass('hidden');
                            $('.errorName').text(data.errors.name);
                        }
                        if (data.errors.shortname) {
                            $('.errorShortname').removeClass('hidden');
                            $('.errorShortname').text(data.errors.shortname);
                        }
                    } else {
                        toastr.success('Pais editado!', 'Confirmado!', {
                            timeOut: 1000,
                            fadeOut: 1000,
                            onHidden: function () {
                                    window.location.reload();
                                }
                            });

                       }
                }
            });
        });

</script>



@endpush