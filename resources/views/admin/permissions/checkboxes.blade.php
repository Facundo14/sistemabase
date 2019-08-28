{{-- @foreach ($permissions as $id => $name)
	<div class="checkbox">
		<label>
			<input name="permissions[]" type="checkbox" value="{{ $name }}"
			{{ $model->permissions->contains($id) || collect(old('permissions'))->contains($name)
			 ? 'checked' : '' }}>
			{{ $name }}
		</label>
	</div>
@endforeach --}}


<select name="permissions[]" class="form-control select2" multiple="multiple" data-placeholder="Seleccione los permisos">
  @foreach ($permissions as $permission)
  <option {{ $model->permissions->contains($permission->id) ? 'selected' : '' }} value="{{$permission->name}}">{{$permission->display_name}}</option>
  @endforeach
</select>