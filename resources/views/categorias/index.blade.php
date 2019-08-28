@extends('admin.layout')
@section('header')
	 <h1>
        Categorias
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Categorias</li>
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
							  <h3 class="box-title">Listado de categorias</h3>
							</div>
                            <div class='box-body pad'>
								@include('categorias.list')
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
<script src="{{ asset('/adminlte/js/data-table-pages.js')}}"></script>




@endpush