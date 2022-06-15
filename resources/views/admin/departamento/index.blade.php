@extends('plantilla.admin')


@section('titulo', 'Administración de Departamentos')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.departamento.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de Departamento</h3>

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
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.departamento.create') }}">Crear</a>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Slug</th>
                <th>Descripción</th>
                <th>Fecha creación</th>
                <th>Fecha modificación</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($departamentos as $departamento)

                    <tr>
                        <td> {{ $departamento->id }} </td>
                        <td> {{ $departamento->nombre }} </td>
                        <td> {{ $departamento->slug }} </td>
                        <td> {{ $departamento->descripcion }} </td>
                        <td> {{ $departamento->created_at }} </td>
                        <td> {{ $departamento->updated_at }} </td>

                        <td> <a class="btn btn-default"
                            href="{{ route('admin.bodega.show',$departamento->slug) }}">Ver</a>
                        </td>

                        <td> <a class="btn btn-info"
                            href="{{ route('admin.bodega.edit',$departamento->slug) }}">Editar</a>
                        </td>

                        <td> <a class="btn btn-danger"
                            href="{{ route('admin.bodega.index') }}"
                            v-on:click.prevent="deseas_eliminar({{$departamento->id}})"
                            >Eliminar</a>
                        </td>

                    </tr>
                @endforeach


            </tbody>
          </table>
          {{ $departamentos->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection
