<div style="margin-top: 15px;">
    <ul class="nav nav-pills nav-stacked">
        <li class="header">Seleccionar</li>
        <li class="{{setActiveRoute('admin.paises.index')}}" >
        	<a href="{{ route('admin.paises.index') }}"> Pais </a>
        </li>
        <li class="{{setActiveRoute('admin.provincias.index')}}">
        	<a href="{{ route('admin.provincias.index') }}"> Provincia</a>
        </li>{{--
        <li class="{{setActiveRoute('admin.localidades.index')}}">
        	<a href="{{ route('admin.localidades.index') }}"> Localidad</a>
        </li> --}}
        </li>
    </ul>
</div>