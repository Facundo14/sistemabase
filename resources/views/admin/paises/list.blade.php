 <table id="pais-table" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>#</th>
      <th>Pais</th>
      <th>Creado</th>
      <th>
        @can('create', $paises->first())
          &nbsp;<a href="#" class="btn btn-primary btn-xs" title="Agregar" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></a>
        @endcan
      </th>
    </tr>
    </thead>
    <tbody>
    	@foreach($paises as $pais)
    	<tr>
    		<td>{{ $pais->id }}</td>
    		<td>{{ $pais->pais }}</td>
    		<td>{{ $pais->created_at->diffForHumans() }}</td>
    		<td>
    			@can('update', $pais)
            <a data-id="{{ $pais->id }}" class="btn btn-warning btn-xs btnEdit" title="Editar"><i class="fa fa-edit"></i></a>
    			@endcan
    			@can('delete', $pais)
            <form action="{{ route('admin.paises.destroy', $pais) }}" method="POST" style="display: inline;" >
              {{csrf_field()}} {{method_field('DELETE')}}
              <button type="submit" title="Eliminar" class="btn btn-danger btn-xs" onclick="return confirm('Estas seguro de querer eliminar?')"><i class="fa fa-trash-o"></i></button>
            </form>
          @endcan
    		</td>
    	</tr>
    	@endforeach
    </tbody>
  </table>


<!-- Add Student Modal -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Student Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Nuevo pais</h4>
      </div>
    <div class="modal-body">
    <form id="addPais" name="addPais" action="{{ route('admin.paises.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="txtNombre">Nombre:</label>
        <input type="text" class="form-control" id="txtNombre" placeholder="Nombre del pais" name="txtNombre">
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- Update Student Modal -->
<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Student Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Actualizar pais</h4>
      </div>
    <div class="modal-body">
    <form id="updatePais" name="updatePais" action="{{ route('admin.paises.update', $pais) }}" method="post">
      <input type="hidden" name="hdnPaisId" id="hdnPaisId"/>
      @csrf
      <div class="form-group">
        <label for="txtNombre">Nombre:</label>
        <input type="text" class="form-control" id="txtNombre" placeholder="Nombre del pais" name="txtNombre">
      </div>
    </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </form>
    </div>
  </div>
</div>