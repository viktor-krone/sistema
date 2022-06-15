@extends('plantilla.admin')


@section('titulo', 'Administración de Empresas')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.empresa.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de Empresas</h3>

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
            @can('crear-empresas')
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.empresa.create') }}">Crear</a>
            @endcan
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Rut</th>
                <th>Razon</th>
                <th>Email</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($empresas as $empresa)

                    <tr>
                        <td> {{ $empresa->id }} </td>
                        <td> {{ $empresa->rut_empresa }} </td>
                        <td> {{ $empresa->razon }} </td>
                        <td> {{ $empresa->email }} </td>
                        <td> {{ $empresa->created_at }} </td>
                        <td> {{ $empresa->updated_at }} </td>

                        <td>
                            @can('crear-empresas')
                            <a class="btn btn-default"
                            href="{{ route('admin.empresa.show',$empresa->rut_empresa) }}">Ver</a>
                            @endcan
                        </td>

                        <td>
                            @can('editar-empresas')
                            <a class="btn btn-info"
                            href="{{ route('admin.empresa.edit',$empresa->rut_empresa) }}">Editar</a>
                            @endcan
                        </td>

                        <td>
                            @can('eliminar-empresas')
                            <a class="btn btn-danger"
                            href="{{ route('admin.empresa.index') }}"
                            v-on:click.prevent="deseas_eliminar({{ $empresa->id}})"
                            >Eliminar</a>
                            @endcan
                        </td>

                    </tr>
                @endforeach


            </tbody>
          </table>
          {{ $empresas->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection
