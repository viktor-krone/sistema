@section('menu_principal')

<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->

  <a href="{{ asset('/admin') }}" class="brand-link">
      @isset($empresa->images->url)
    <img src="{{ App\User::find( auth()->user()->id )->empresa->images->url }}"
         alt="AdminLTE Logo"
         class="brand-image img-circle elevation-3"
         style="opacity: .8">
         @endisset

         @if(Auth::check())
         <span class="brand-text font-weight-light">{{ App\User::find( auth()->user()->id )->empresa->razon }}</span>

         @else
         <span class="brand-text font-weight-light">---</span>

         @endif
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="{{ asset('/adminlte/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"> {{ auth()->user()->name }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="{{ asset('/admin/') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v1</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ asset('/adminlte/index2.html') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v2</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ asset('/adminlte/index3.html') }}" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Dashboard v3</p>
              </a>
            </li>
          </ul>
        </li>



        @can('gestion-comercial')
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-book"></i>
                  <p>
                      Gestion Comercial
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Maestros
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          @can('listar-clientes')
                          <li class="nav-item">
                              <a href="{{ route('admin.cliente.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Clientes</p>
                              </a>
                          </li>
                          @endcan

                          <li class="nav-item">
                              <a href="{{ route('admin.proveedor.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Proveedores</p>
                              </a>
                          </li>

                          @can('listar-productos')
                          <li class="nav-item">
                              <a href="{{ route('admin.product.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Productos</p>
                              </a>
                          </li>
                          @endcan
                          @can('listar-skus')
                          <li class="nav-item">
                              <a href="{{ route('admin.sku.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sku</p>
                              </a>
                          </li>
                          @endcan
                          @can('listar-categorias')
                          <li class="nav-item">
                              <a href="{{ route('admin.category.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Categorías</p>
                              </a>
                          </li>
                          @endcan
                          @can('listar-vendedores')
                          <li class="nav-item">
                              <a href="{{ route('admin.vendedor.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Vendedores</p>
                              </a>
                          </li>
                          @endcan
                      </ul>
                  </li>
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Emision
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      @can('crear-cotizacion')
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.cotizacion.create')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cotización</p>
                              </a>
                          </li>

                      </ul>
                      @endcan
                      @can('crear-nota-venta')
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.notaventa.create')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Nota de venta</p>
                              </a>
                          </li>

                      </ul>
                      @endcan

                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.documentos.crea_factura')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Factura</p>
                              </a>
                          </li>

                      </ul>

                  </li>
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Libros
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      @can('listar-cotizaciones')
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.cotizacion.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cotización</p>
                              </a>
                          </li>
                      </ul>
                       @endcan
                       @can('listar-nota-ventas')
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.notaventa.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Nota de venta</p>
                              </a>
                          </li>

                      </ul>
                      @endcan
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.documentos.listar')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Libro Venta</p>
                              </a>
                          </li>

                      </ul>
                  </li>
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Informes
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Compra</p>
                              </a>
                          </li>
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Venta</p>
                              </a>
                          </li>

                      </ul>
                  </li>



              </ul>
          </li>
          @endcan



          @can('tesoreria')
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                      Tesoreria
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Maestros
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Maestro 1</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Cuentas Clientes
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Por cobrar</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </li>
          @endcan



          @can('inventario')
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                      Inventario
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Maestros
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.bodega.create')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Bodega</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.sucursal.create')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Sucursal</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Movimientos
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.movimiento.create')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Ingresar stock</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Informe Stock
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.informe.stock')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Stock</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </li>
          @endcan



          @can('remuneraciones')
          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                      Remuneraciones
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Maestros
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.trabajador.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Trabajadores</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.departamento.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Departamento</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.cargo.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Cargo</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Gestión registros
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.vacacion')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Registros</p>
                              </a>
                          </li>
                      </ul>

                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.haber.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Listado de Haberes</p>
                              </a>
                          </li>
                      </ul>

                  </li>
              </ul>

              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Liquidación
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.liquidacion.index')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Crear liquidacion</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>

              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Gestión Anticipos
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="{{ route('admin.anticipo')}}" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Anticipos</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </li>
          @endcan




          <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                  <i class="nav-icon fas fa-boxes"></i>
                  <p>
                      Web
                      <i class="right fas fa-angle-left"></i>
                  </p>
              </a>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              Maestros
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Datos General</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Datos Social</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pagina Principal</p>
                              </a>
                          </li>
                      </ul>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="#" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>Pagina 2</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
              <ul class="nav nav-treeview">
                  <li class="nav-item has-treeview">
                      <a href="#" class="nav-link">
                          <i class="nav-icon fas fa-list-alt"></i>
                          <p>
                              link
                              <i class="right fas fa-angle-left"></i>
                          </p>
                      </a>
                      <ul class="nav nav-treeview">
                          <li class="nav-item">
                              <a href="" class="nav-link">
                                  <i class="far fa-circle nav-icon"></i>
                                  <p>link</p>
                              </a>
                          </li>
                      </ul>
                  </li>
              </ul>
          </li>




          @can('administracion')
        <li class="nav-header">Administración</li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tools"></i>
            <p>
              Configuración
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
              @can('ver-seccion-control-de-acceso')
                <li class="nav-item">
                  <a href="{{ route('admin.empresa.index')}}" class="nav-link">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Empresas</p>
                  </a>
                </li>
              @endcan
              @can('listar-usuarios')
            <li class="nav-item">
              <a href="{{ route('admin.user.index')}}" class="nav-link">
                <i class="nav-icon fas fa-users"></i>
                <p>Usuarios</p>
              </a>
            </li>
            @endcan
            @can('listar-roles')
          <li class="nav-item">
              <a href="{{ route('admin.roles.index')}}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Roles</p>
              </a>
          </li>
          @endcan
          @can('listar-permisos')
          <li class="nav-item">
              <a href="{{ route('admin.permissions.index') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Permisos</p>
              </a>
          </li>
          @endcan
          @can('listar-logs')
          <li class="nav-item">
              <a href="{{ route('admin.log') }}" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Logs</p>
              </a>
          </li>
          @endcan




            <li class="nav-item has-treeview">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>
                  Level 2
                  <i class="right fas fa-angle-left"></i>
                </p>
              </a>
              <ul class="nav nav-treeview">
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
                <li class="nav-item">
                  <a href="#" class="nav-link">
                    <i class="far fa-dot-circle nav-icon"></i>
                    <p>Level 3</p>
                  </a>
                </li>
              </ul>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="far fa-circle nav-icon"></i>
                <p>Level 2</p>
              </a>
            </li>
          </ul>
        </li>
        @endcan

      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>
  @endsection
