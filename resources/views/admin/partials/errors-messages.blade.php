{{-- Otra forma para mostrar los errores en lista y en una sola linea --}}
	@if ($errors->any())
		<ul class="list-group">
			@foreach ($errors->all() as $error)
				<li class="list-group-item list-group-item-danger">
					{{ $error }}
				</li>
			@endforeach
		</ul>

	@endif