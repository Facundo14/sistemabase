      <ul class="sidebar-menu">
        <li class="header">Menu</li>
        <!-- Optionally, you can add icons to the links -->
        <li class="{{ setActiveRoute('inicio') }}">
          <a href="{{ route('inicio') }}">
            <i class="fa fa-dashboard"></i> <span>Inicio</span>
          </a>
        </li>
          @can('view_parametros_usuario')
          <li class="treeview {{ setActiveRoute(['admin.empresas.index', 'admin.empresas.create','admin.users.index', 'admin.users.create','admin.roles.index', 'admin.roles.edit','admin.permissions.index', 'admin.permissions.edit']) }}">
            <a href="#"><i class="fa fa-cog"></i> <span>Parámetros</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">{{--
              @can('view_parametros_usuario_generales')
              <li class="treeview {{ setActiveRoute(['admin.empresas.index', 'admin.empresas.create','admin.users.index', 'admin.users.create','admin.roles.index', 'admin.roles.edit','admin.permissions.index', 'admin.permissions.edit']) }}">
                <a href="{{ route('admin.empresas.index') }}"><i class="fa fa-cogs"></i> <span>Generales</span>
                </a>
              </li>
              @endcan --}}
              @can('view', new App\Empresa)
              <li class="treeview {{ setActiveRoute(['admin.empresas.index', 'admin.empresas.create']) }}">
                <a href="{{ route('admin.empresas.index') }}"><i class="fa fa-building-o"></i> <span>Empresa</span>
                </a>
              </li>
              @endcan
             <li class="treeview">
                <a href="{{ route('admin.empresas.timelineshow') }}"><i class="fa fa-building-o"></i> <span>Linea de tiempo</span>
              </a>
              </li>
              @can('view', new App\User)
                <li class="treeview {{ setActiveRoute(['admin.users.index', 'admin.users.create','admin.roles.index', 'admin.roles.edit','admin.permissions.index', 'admin.permissions.edit']) }}">
                  <a href="#"><i class="fa fa-users"></i> <span>Usuarios</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="{{ setActiveRoute('admin.users.index') }}">
                      <a href="{{ route('admin.users.index') }}">
                        <i class="fa fa-eye"></i>Ver todos los usuarios
                      </a>
                    </li>
                    @can('view', new \Spatie\Permission\Models\Role)
                      <li class="{{ setActiveRoute(['admin.roles.index', 'admin.roles.edit']) }}">
                        <a href="{{ route('admin.roles.index') }}">
                          <i class="fa fa-circle-o"></i> <span>Roles</span>
                        </a>
                      </li>
                    @endcan
                    @can('view', new \Spatie\Permission\Models\Permission)
                      <li class="{{ setActiveRoute(['admin.permissions.index', 'admin.permissions.edit']) }}">
                        <a href="{{ route('admin.permissions.index') }}">
                          <i class="fa fa-circle-o"></i> <span>Permisos</span>
                        </a>
                      </li>
                    @endcan
                  </ul>
                </li>
              @endcan

            </ul>
          </li>
          @endcan
      </ul>