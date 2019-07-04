@extends('layout')

@section('header')

@stop

@section('contenido')
<div class="row">
	<div class="col-md-12">
		<div class="box box-primary">
			<div class="box-header with-border">
				<h3 class="box-title">ERROR 403</h3>
			</div>
			<div class="box-body">
				<section class="pages container text-center">
					<div class="page page-about">
						<h1 class="text-capitalize">Página no autorizada</h1>
						<span style="color: red;font-weight: bold;">{{ $exception->getMessage() }}</span>
						<p><a href="{{ url()->previous() }}" style="font-weight: bold;"><i class="fa fa-backward"></i> Regresar</a></p>
					</div>
				</section>
			</div>
		</div>
	</div>
</div>
@stop
