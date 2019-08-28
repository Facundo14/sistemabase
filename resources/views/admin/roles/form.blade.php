{{csrf_field()}}
<div class="form-group">
	<label>Identificador:</label>
	@if ($role->exists)
		<input value="{{ $role->name }}" class="form-control" disabled>
	@else
		<input name="name" value="{{ old('name', $role->name) }}" class="form-control" placeholder="Ingresa el identificador del rol">
	@endif
</div>
<div class="form-group">
	<label>Nombre:</label>
	<input name="display_name" value="{{ old('display_name', $role->display_name) }}" class="form-control" placeholder="Ingresa el nombre del rol">
</div>

<div class="form-group">
	<label>Permisos</label>
	@include('admin.permissions.checkboxes', ['model' => $role])
</div>