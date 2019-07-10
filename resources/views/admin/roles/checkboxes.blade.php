@foreach ($roles as $role)
<div class="checkbox">
		<label data-toggle="tooltip" data-placement="right" title="{{ $role->permissions->pluck('display_name')->implode(', ')}}">
			<input name="roles[]" type="checkbox" value="{{ $role->name }}" {{ $user->roles->contains($role->id) ? 'checked' : '' }} >
			{{ $role->name }} <br>
			
		</label>
	</div> 
@endforeach

{{-- <select name="roles[]" class="form-control select2" multiple="multiple" data-placeholder="Seleccione las roles" style="width: 100%;">
  @foreach ($roles as $role)
  <option {{ $user->roles->contains($role->id) ? 'selected' : '' }} value="{{$role->name}}">{{$role->name}}</option>
  <small class="text-muted">{{ $role->permissions->pluck('name')->implode(', ')}}</small>
  @endforeach
</select> --}}