@extends('plantilla.admin')


@section('titulo', 'Administración de usuarios')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.user.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de Usuarios</h3>

          <div class="card-tools">



            <form>
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="nombre" class="form-control float-right"
                placeholder="Buscar"
                value="{{ request()->get('nombre') }}"
                >

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" style="height: 300px;">
            @can('crear-usuarios')
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.user.create') }}">Crear</a>
            @endcan
            @can('exportar-usuarios')
                <a class=" m-2 float-right" href="usuarios/export">
                    <i class="fa-2x f3 fas fa-file-excel"></i>
                </a>
            @endcan
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Email</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($usuarios as $usuario)

                    @if($usuario->rut != '17128579-8')
                        <tr>
                            <td> {{ $usuario->id }} </td>
                            <td> {{ $usuario->rut }} </td>
                            <td> {{ $usuario->name }} </td>
                            <td> {{ $usuario->email }} </td>
                            <td>
                                @can('ver-usuarios')
                                <a class="btn btn-default"
                                href="{{ route('admin.user.show',$usuario->id) }}">
                                    Ver
                                </a>
                                @endcan
                            </td>
                            <td>
                                @can('editar-usuarios')
                                <a class="btn btn-info"
                                href="{{ route('admin.user.edit',$usuario->id) }}">
                                    Editar
                                </a>
                                @endcan
                            </td>

                        </tr>

                    @endif
                @endforeach


            </tbody>
          </table>
          {{ $usuarios->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection
