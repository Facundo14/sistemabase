
<div style="margin-top: 15px;">
    <ul class="nav nav-pills nav-stacked">
        <li class="header ">Seleccionar</li>
        <li class="{{setActiveRoute(['admin.paises.index', 'admin.paises.create', 'admin.paises.edit'])}}">
            <a href="{{ route('admin.paises.index') }}"> País</a>
        </li>
       <li class="{{setActiveRoute(['admin.provincias.index', 'admin.provincias.create', 'admin.provincias.edit'])}}">
        	<a href="{{ route('admin.provincias.index') }}"> Provincia</a>
        </li> {{--
        <li class="{{setActiveRoute('admin.localidades.index')}}">
        	<a href="{{ route('admin.localidades.index') }}"> Localidad</a>
        </li> --}}
    </ul>
</div>