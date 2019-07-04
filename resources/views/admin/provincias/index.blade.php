@extends('admin.layout')
@section('header')
	 <h1>
        Provincias
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Provincias</li>
      </ol>
@stop
@section('contenido')
<div class="row">
	<div class='col-md-12'>
        <div class="box box-solid">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-2 col-sm-4">
                        <div class="box-header">
                            <i class="fa fa-building"></i>
                            <h3 class="box-title">Configurar</h3>
                        </div>
                        <!-- Navigation - folders-->
                        @include('admin.partials.navegationsfolders')
                    </div><!-- /.col (LEFT) -->
                    <div class="col-md-10 col-sm-8">

                        <div class='box box-solid box-primary'>
                            <div class="box-header">
              							  <h3 class="box-title">Listado de Provincias</h3>
              							</div>
                            <div class='box-body pad'>
								              @include('admin.provincias.list')
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

<script src="{{asset('js/provinciasmodal.js')}}"></script>

@endpush