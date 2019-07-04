 <table id="pais-table" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>#</th>
      <th>Provincia</th>
      <th>Pais</th>
      <th>Creado</th>
      <th>
        @can('create', $provincias->first())
          &nbsp;<a href="#" class="btn btn-primary btn-xs" title="Agregar" data-toggle="modal" data-target="#addModal"><i class="fa fa-plus"></i></a>
        @endcan
      </th>
    </tr>
    </thead>
    <tbody>
    	@foreach($provincias as $provincia)
    	<tr>
    		<td>{{ $provincia->id }}</td>
    		<td>{{ $provincia->provincia }}</td>
        <td>{{ $provincia->pais->pais }}</td>
    		<td>{{ $provincia->created_at}}</td>
    		<td>
    			@can('update', $provincia)
            <a data-id="{{ $provincia->id }}" class="btn btn-warning btn-xs btnEdit" title="Editar"><i class="fa fa-edit"></i></a>
    			@endcan
    			@can('delete', $provincia)
            <form action="{{ route('admin.provincias.destroy', $provincia) }}" method="POST" style="display: inline;" >
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
        <h4 class="modal-title">Nueva provincia</h4>
      </div>
    <div class="modal-body">
    <form id="addProvincia" name="addProvincia" action="{{ route('admin.provincias.store') }}" method="post">
      @csrf
      <div class="form-group">
        <label for="txtNombre">Nombre:</label>
        <input type="text" class="form-control" id="txtNombre" placeholder="Nombre del pais" name="txtNombre">
      </div>
      <div class="form-group">
        <label>Minimal</label>
        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;" tabindex="-1" aria-hidden="true">
          <option selected="selected">Alabama</option>
        </select><span class="select2 select2-container select2-container--default select2-container--below" dir="ltr" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-qp3n-container"><span class="select2-selection__rendered" id="select2-qp3n-container" title="Alabama">Alabama</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span>
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
{{-- 
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
</div> --}}