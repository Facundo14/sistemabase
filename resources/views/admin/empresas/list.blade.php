 <table id="id-table" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>CUIT</th>
      <th>
        @can('create', $empresas->first() )
          &nbsp;<a href="{{route('admin.empresas.create')}}" class="btn btn-primary btn-xs" title="Agregar"><i class="fa fa-plus"></i></a>
        @endcan
      </th>
    </tr>
    </thead>
    <tbody>
    	@foreach($empresas as $empresa)
    	<tr>
    		<td>{{ $empresa->id }}</td>
    		<td>{{ $empresa->nombre }}</td>
    		<td>{{ $empresa->cuit }}</td>
    		<td>
    			@can('update', $empresa)
            &nbsp;<a href="#" class="btn btn-warning btn-xs" title="Editar" data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>
    			@endcan
    			@can('delete', $empresa)
	    			<form action="{{ route('admin.empresas.destroy', $empresa) }}" method="POST" style="display: inline;" >
	    				{{csrf_field()}} {{method_field('DELETE')}}
	    				<button title="Eliminar" class="btn btn-danger btn-xs" onclick="return confirm('Estas seguro de querer eliminar?')"><i class="fa fa-trash-o"></i></button>
	    			</form>
	    		@endcan
    		</td>
    	</tr>
    	@endforeach
    </tbody>
  </table>


<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Agregar</h4>
      </div>
      <div class="modal-body">
        @include('admin.partials.errors-messages')
        <form method="POST" action="{{ route('admin.empresas.update', $empresa) }}">
          {{csrf_field()}} {{method_field('PUT')}}
          <div class="col-md-6">
            <div class="form-group">
              <label>Nombre:</label>
              <input name="nombre" style="text-transform: uppercase;" class="form-control" placeholder="Ingresa el nombre" value="{{ old('nombre', $empresa->nombre) }}">
            </div>
            <div class="form-group">
              <label>Leyenda:</label>
              <input name="leyenda" value="" class="form-control" placeholder="Ingresa la leyenda">
            </div>
            <div class="form-group">
              <label>Leyenda Factura:</label>
              <textarea rows="10" name="leyenda_factura" type="text" class="form-control" placeholder="Ingresa la leyenda de factura">{{ old('leyenda_factura', $empresa->leyenda) }}</textarea>
            </div>
            <div class="form-group">
              <label>CUIT:</label>
              <input name="cuit" style="text-transform: uppercase;" value="{{ old('cuit', $empresa->cuit) }}" class="form-control" placeholder="Ingresa el cuit">
            </div>
          </div>
          <div class="col-md-6">

            <div class="form-group">
              <label>Direccion:</label>
              <input name="direccion" value="{{ old('direccion', $empresa->direccion) }}" class="form-control" placeholder="Ingresa la direccion">
            </div>
            <div class="form-group">
              <label>Teléfono:</label>
              <input name="telefono" value="{{ old('telefono', $empresa->telefono) }}" class="form-control" placeholder="Ingresa la telefono">
            </div>
            <div class="form-group">
              <label>Email:</label>
              <input type="email" name="email" value="{{ old('email', $empresa->email) }}" class="form-control" placeholder="Ingresa la email">
            </div>
            <div class="form-group">
              <label>Responsable:</label>
              <input name="responsable" value="{{ old('responsable', $empresa->responsable) }}" class="form-control" placeholder="Ingresa la responsable">
            </div>
          </div>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
      </form>
    </div>
  </div>
</div>