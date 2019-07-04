@extends('admin.layout')
@section('header')
	 <h1>
        Timeline
        <small>Listado</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('inicio') }}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Linea de tiempo</li>
      </ol>
@stop
@section('contenido')
<div class="row">
	<div class='col-md-12'>
        <div class="box box-solid">
            <div class="box-body">
                <div class="row vdivide">
                    <div class="col-md-6 col-sm-4">
                        <div class='box box-solid box-primary'>
                            <div class="box-header">
                              <h3 class="box-title">Time line 1</h3> <button class="btn btn-success pull-right"  title="Nueva tarea"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class='box-body pad'>
                              <ul class="timeline">
                            @foreach ($empresas as $empresa)
                                <!-- timeline time label -->
                                <li class="time-label">
                                    <span class="bg-red">
                                        @if (!is_null($empresa->created_at))
                                        {{$empresa->created_at->toFormattedDateString()}}
                                        @else
                                            <span>Sin fecha</span>
                                        @endif
                                    </span>
                                </li>
                                <!-- /.timeline-label -->

                                <!-- timeline item -->
                                <li>
                                    <!-- timeline icon -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i>
                                            @if (!is_null($empresa->updated_at))
                                                {{$empresa->updated_at->format('m/d/Y H:i')}}
                                                @else
                                                    <span>Sin fecha</span>
                                                @endif
                                        </span>

                                        <span class="time">Últ. Actualización</span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>

                                        <div class="timeline-body">
                                            ACA VAN LAS EMPRESAS.. EJEMPLO

                                            <strong>{{$empresa->nombre}}</strong>
                                        </div>

                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">...</a>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                            </ul>
                            </div>
                        </div><!-- /.box -->
                    </div><!-- /.col (RIGHT) -->
                    <div class="col-md-6 col-sm-4">

                        <div class='box box-solid box-primary'>
                            <div class="box-header">
                              <h3 class="box-title">Time line 2</h3> <button class="btn btn-success pull-right"  title="Nueva tarea"><i class="fa fa-plus"></i></button>
                            </div>
                            <div class='box-body pad'>
                              <ul class="timeline">
                                @foreach ($roles as $role)
                                <!-- timeline time label -->
                                <li class="time-label">
                                    <span class="bg-red">
                                        @if (!is_null($role->created_at))
                                        {{$role->created_at->toFormattedDateString()}}
                                        @else
                                            <span>Sin fecha</span>
                                        @endif
                                    </span>
                                </li>
                                <!-- /.timeline-label -->

                                <!-- timeline item -->
                                <li>
                                    <!-- timeline icon -->
                                    <i class="fa fa-envelope bg-blue"></i>
                                    <div class="timeline-item">
                                        <span class="time"><i class="fa fa-clock-o"></i>
                                             @if (!is_null($role->updated_at))
                                                {{$role->updated_at->format('m/d/Y H:i')}}
                                            @else
                                                <span>Sin fecha</span>
                                            @endif
                                        </span>

                                        <h3 class="timeline-header"><a href="#">Support Team</a> ...</h3>

                                        <div class="timeline-body">
                                            ACA VAN LOS ROLES.. EJEMPLO

                                            <strong>{{$role->name}}</strong>
                                        </div>

                                        <div class="timeline-footer">
                                            <a class="btn btn-primary btn-xs">...</a>
                                        </div>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
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

@endpush

@push('scripts')


@endpush