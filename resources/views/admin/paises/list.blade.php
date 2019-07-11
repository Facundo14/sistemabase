 <table id="empresa-table" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Abreviatura</th>
      <th>
        @can('create', $paises->first() )
          &nbsp;<a href="#" class="btn btn-primary btn-xs" title="Agregar" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></a>
        @endcan
      </th>
    </tr>
    </thead>
    <tbody>
    	@foreach($paises as $pais)
    	<tr>
    		<td>{{ $pais->id }}</td>
    		<td>{{ $pais->name }}</td>
    		<td>{{ $pais->shortname }}</td>
    		<td>
    			@can('update', $pais)
                &nbsp;<a href="#" class="edit-modal btn btn-warning btn-xs" title="Editar" data-id="{{$pais->id}}" data-name="{{$pais->name}}" data-shortname="{{$pais->shortname}}"><i class="fa fa-edit"></i></a>
    			@endcan
    			@can('delete', $pais)
	    			<form action="{{ route('admin.paises.destroy', $pais) }}" method="POST" style="display: inline;" >
	    				{{csrf_field()}} {{method_field('DELETE')}}
	    				<button title="Eliminar" class="btn btn-danger btn-xs" onclick="return confirm('Estas seguro de querer eliminar?')"><i class="fa fa-trash-o"></i></button>
	    			</form>
	    		@endcan
    		</td>
    	</tr>
    	@endforeach
    </tbody>
  </table>


    <!-- Modal form to add a post -->
    <div id="addModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Pais nuevo</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="formId" action="{{route('admin.paises.store')}}">
						@csrf
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_add" autofocus>
                                <p class="errorName text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shortname">Abreviatura:</label>
                            <div class="col-sm-10">
								<input type="text" class="form-control" id="shortname_add">
                                <p class="errorShortname text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary add" data-dismiss="modal">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal form to add a post -->
    <div id="editModal" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">×</button>
                    <h4 class="modal-title">Pais editar</h4>
                </div>
                <div class="modal-body">
                    <form class="form-horizontal" role="form" id="formIdEdit" action="{{route('admin.paises.update', $pais)}}">
						@csrf
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="name">Nombre:</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="name_edit" name="name_edit">
                                <p class="errorName text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="control-label col-sm-2" for="shortname">Abreviatura:</label>
                            <div class="col-sm-10">
								<input type="text" class="form-control" id="shortname_edit" name="shortname_edit">
                                <p class="errorShortname text-center alert alert-danger hidden"></p>
                            </div>
                        </div>
                    </form>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary edit" data-dismiss="modal">
                            Guardar
                        </button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">
                            Cerrar
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>