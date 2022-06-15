@extends('plantilla.admin')


@section('titulo', 'Administración de Proveedores')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')
<style type="text/css">
  .table1 {
    width: 100%;
    margin-bottom: 1rem;
    color: #212529;
    text-align: center;
  }

  .table1 td, .table1 th {
    padding: .75rem;
    vertical-align: center;
    border-top: 1px solid #dee2e6;
  }

</style>


<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.proveedor.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de proveedores</h3>

          <div class="card-tools">

            <form>
              <div class="input-group input-group-sm" style="width: 150px;">
                <input type="text" name="razon" class="form-control float-right"
                placeholder="Buscar"
                value="{{ request()->get('razon') }}"
                >

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                </div>
              </div>
            </form>

          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body table-responsive p-0" >
            @can('crear-proveedores')
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.proveedor.create') }}">Crear</a>
            @endcan
          <table class="table1 table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Rut</th>
                <th>Razon</th>
                <th>Giro</th>
                <th>Activo</th>
                <th>Slider Principal</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($proveedores as $proveedor)
                    <tr>
                        <td> {{ $proveedor->id }} </td>
                        <td> {{ $proveedor->rut }} </td>
                        <td> {{ $proveedor->razon }} </td>
                        <td> {{ $proveedor->giro }} </td>
                        <td> {{ $proveedor->estado }} </td>

                        <td>
                            @can('ver-proveedores')
                            <a class="btn btn-default"
                            href="{{ route('admin.proveedor.show',$proveedor->id) }}">Ver</a>
                            @endcan
                        </td>

                        <td>
                            @can('editar-proveedores')
                            <a class="btn btn-info"
                            href="{{ route('admin.proveedor.edit',$proveedor->id) }}">Editar</a>
                            @endcan
                        </td>

                        <td>
                            @can('eliminar-proveedores')
                            <a class="btn btn-danger"
                            href="{{ route('admin.proveedor.index') }}"
                            v-on:click.prevent="deseas_eliminar({{ $proveedor->id }})"
                            >Eliminar</a>
                            @endcan
                        </td>

                    </tr>
                @endforeach


            </tbody>
          </table>
          {{ $proveedores->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection
