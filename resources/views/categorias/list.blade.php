 <table id="id-table" class="table table-bordered table-striped">
    <thead>
    <tr>
      <th>#</th>
      <th>Nombre</th>
      <th>Descripcion</th>
      <th>
          &nbsp;<a href="{{route('categorias.create')}}" class="btn btn-primary btn-xs" title="Agregar"><i class="fa fa-plus"></i></a>
      </th>
    </tr>
    </thead>
    <tbody>
    	@foreach($categorias as $categoria)
    	<tr>
    		<td>{{ $categoria->id }}</td>
    		<td>{{ $categoria->nombre }}</td>
    		<td>{{ $categoria->descripcion }}</td>
    		<td>
    			@can('update', $categoria)
            &nbsp;<a href="{{ route('categorias.edit', $categoria) }}" class="btn btn-warning btn-xs" title="Editar"><i class="fa fa-edit"></i></a>
    			@endcan
    			@can('delete', $categoria)
	    			<form action="{{ route('categorias.destroy', $categoria) }}" method="POST" style="display: inline;" >
	    				{{csrf_field()}} {{method_field('DELETE')}}
	    				<button title="Eliminar" class="btn btn-danger btn-xs" onclick="return confirm('Estas seguro de querer eliminar?')"><i class="fa fa-trash-o"></i></button>
	    			</form>
	    		@endcan
    		</td>
    	</tr>
    	@endforeach
    </tbody>
  </table>