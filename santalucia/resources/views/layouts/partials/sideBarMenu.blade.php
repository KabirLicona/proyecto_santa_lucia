<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
        data-accordion="false">
        <!-- Agrega íconos a los enlaces usando la clase .nav-icon
            con font-awesome o cualquier otra biblioteca de fuentes de iconos -->

            
        <li class="nav-item">
            <a href="{{ route('home') }}"
                class="nav-link {{ request()->routeIs('home') == 'home' ? 'active' : '' }}">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                    Dashboard
                </p>
            </a>
        </li>


        <!--------------------------------------------------------- Gestion de Registros --------------------------------------------------------->
        @if (auth()->user()->can('gestion producto') || auth()->user()->can('gestion categoria'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'producto' || request()->segment(1) == 'categoria' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'producto' || request()->segment(1) == 'categoria' ) ? 'active' : '' }}">
                <i class="fas fa-cubes nav-icon    "></i>
                <p>
                    Registros
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('gestion producto')
                    <li class="nav-item">
                        <a href="{{ route('producto.index') }}"
                            class="nav-link {{ request()->routeIs('producto.index') == 'producto.index' ? 'active' : '' }}">
                            <i class="fas fa-box-open nav-icon   "></i>
                            <p>Producto</p>
                        </a>
                    </li>   
                @endcan

                @can('gestion categoria')
                    <li class="nav-item">
                        <a href="{{ route('categoria.index') }}"
                            class="nav-link {{ request()->routeIs('categoria.index') == 'categoria.index' ? 'active' : '' }}">
                            <i class="fas fa-puzzle-piece nav-icon   "></i>
                            <p>Categoria</p>
                        </a>
                    </li>   
                @endcan
            </ul>
        </li>
        @endif


        <!--------------------------------------------------------- Gestion de Mantenimiento --------------------------------------------------------->
        


         @if (auth()->user()->can('gestion cliente') || auth()->user()->can('gestion empresa'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'cliente' || request()->segment(1) == 'empresa' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'cliente' || request()->segment(1) == 'empresa' ) ? 'active' : '' }}">
                <i class="fas fa-cubes nav-icon    "></i>
                <p>
                    Mantenimiento
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                                                             <!-- Codigo Gestion de Clientes -->
                @can('gestion cliente')
                    <li class="nav-item">
                        <a href="{{ route('cliente.index') }}"
                            class="nav-link {{ request()->routeIs('cliente.index') == 'cliente.index' ? 'active' : '' }}">
                            <i class="fas fa-box-open nav-icon   "></i>
                            <p>Cliente</p>
                        </a>
                    </li>   
                @endcan
                                                               <!-- Codigo de Gestion Empresa -->
                @can('gestion empresa')
                    <li class="nav-item">
                        <a href="{{ route('empresa.index') }}"
                            class="nav-link {{ request()->routeIs('empresa.index') == 'empresa.index' ? 'active' : '' }}">
                            <i class="fas fa-puzzle-piece nav-icon   "></i>
                            <p>Empresa</p>
                        </a>
                    </li>   
                @endcan
          
                                                              <!-- Codigo de Gestion Tipo Clientes -->
        @can('gestion tipocliente')
                    <li class="nav-item">
                        <a href="{{ route('tipocliente.index') }}"
                            class="nav-link {{ request()->routeIs('tipocliente.index') == 'tipocliente.index' ? 'active' : '' }}">
                            <i class="fas fa-puzzle-piece nav-icon   "></i>
                            <p>Tipo de Cliente</p>
                        </a>
                    </li>   
                @endcan
            </ul>
        </li>
        @endif




        
        <!--------------------------------------------------------- Gestion de Usuarios --------------------------------------------------------->
        

        @if (auth()->user()->can('gestion usuarios'))
        <li class="nav-item has-treeview {{ (request()->segment(1) == 'users' || request()->segment(1) == 'roles' ) ? 'menu-open' : '' }}">
            <a href="#" class="nav-link {{ (request()->segment(1) == 'users' || request()->segment(1) == 'roles' ) ? 'active' : '' }}">
                <i class="fas fa-user-astronaut nav-icon   "></i>
                <p>
                                                           <!-- Codigo de Gestion de Usuarios -->
                    Gestion de Usuario
                    <i class="right fas fa-angle-left"></i>
                </p>
            </a>
            <ul class="nav nav-treeview">
                @can('gestion usuarios')
                    <li class="nav-item">
                        <a href="{{ route('users.create') }}"
                            class="nav-link {{ request()->routeIs('users.create') == 'users.create' ? 'active' : '' }}">
                            <i class="fas fa-user-plus nav-icon"></i>
                            <p>Agregar Usuario</p>
                        </a>
                    </li>
                                                         <!-- Codigo de Lista de  Usuarios -->
                    <li class="nav-item">
                        <a href="{{ route('users.index') }}"
                            class="nav-link {{ request()->routeIs('users.index') == 'users.index' ? 'active' : '' }}">
                            <i class="fas fa-users nav-icon   "></i>
                            <p>Lista de usuarios</p>
                        </a>
                    </li> 
                @endcan
                                                        <!-- Codigo de Roles & Permisos -->
                <li class="nav-item">
                    <a href="{{ route('roles.index') }}" class="nav-link {{ request()->routeIs('roles.index') == 'roles.index' ? 'active' : '' }}">
                        <i class="fas fa-users-cog nav-icon   "></i>
                        <p>Roles & Permisos</p>
                    </a>
                </li>
            </ul>
        </li>
        @endif
                                                           <!--Configuracion -->
        @role('admin') 
        <li class="nav-item">
            <a href="{{ route('setting.index') }}" class="nav-link {{ request()->routeIs('setting.index') == 'setting.index' ? 'active' : '' }}">
                <i class="fas fa-cog nav-icon   "></i>
                <p>
                    Configuración
                </p>
            </a>
        </li>
        @endrole

        <li class="nav-item">
            <a href="{{ route('profile.show', Auth::user()->id) }}" class="nav-link {{ request()->routeIs('profile.show') == 'profile.show' ? 'active' : '' }}">
                <i class="fas fa-user-ninja nav-icon   "></i>
                <p>
                                                            <!-- Perfiles -->
                    Perfil
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();
                                     document.getElementById('logout-form').submit();">
                <i class="nav-icon fas fa-sign-out-alt text-cyan   "></i>
                <p>
                   Cerrar Sesión
                </p>
                {{-- {{ __('Cerrar Sesión') }} --}}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST"
                style="display: none;">
                @csrf
            </form>
        </li>
    </ul>
</nav>