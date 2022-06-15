@extends('plantilla.admin')


@section('titulo', 'Administración de Trabajadores')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.trabajador.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de Trabajadores</h3>

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
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.trabajador.create') }}">Crear</a>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Fecha Inicio</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($trabajadores as $trabajador)

                    <tr>
                        <td> {{ $trabajador->id }} </td>
                        <td> {{ $trabajador->rut }} </td>
                        <td> {{ $trabajador->nombre }} </td>
                        <td> {{ $trabajador->apellido_paterno }} </td>
                        <td> {{ $trabajador->apellido_materno }} </td>
                        <td> {{ $trabajador->inicio }} </td>

                        <td> <a class="btn btn-default"
                            href="{{ route('admin.trabajador.show',$trabajador->id) }}">Ver</a>
                        </td>

                        <td> <a class="btn btn-info"
                            href="{{ route('admin.trabajador.edit',$trabajador->id) }}">Editar</a>
                        </td>

                        <td> <a class="btn btn-danger"
                            href="{{ route('admin.trabajador.index') }}"
                            v-on:click.prevent="deseas_eliminar({{ $trabajador->id }})"
                            >Eliminar</a>
                        </td>

                    </tr>
                @endforeach


            </tbody>
          </table>
          {{ $trabajadores->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection
