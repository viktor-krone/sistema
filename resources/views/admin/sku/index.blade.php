@extends('plantilla.admin')


@section('titulo', 'Administración de skus')

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

  <span style="display:none;" id="urlbase">{{route('admin.sku.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de skus</h3>

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
        <div class="card-body table-responsive p-0" >
            @can('crear-skus')
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.sku.create') }}">Crear</a>
            @endcan
          <table class="table1 table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Imagen</th>
                <th>Nombre</th>
                <th>Estado</th>
                <th>Activo</th>
                <th>Slider Principal</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($skus as $sku)
                    <tr>
                        <td> {{ $sku->id }} </td>
                        <td>
                           @if ($sku->images->count()<=0 )
                              <img style="height: 100px;    width: 100px;" src="/imagenes/avatar.png" class="rounded-circle">
                           @else
                              <img style="height: 100px;    width: 100px;" src="{{ $sku->images->random()->url }}" class="rounded-circle">
                           @endif




                        </td>
                        <td> {{ $sku->nombre }} </td>
                        <td> {{ $sku->estado }} </td>
                        <td> {{ $sku->activo }} </td>
                        <td> {{ $sku->sliderprincipal }} </td>

                        <td>
                            @can('ver-skus')
                            <a class="btn btn-default"
                            href="{{ route('admin.sku.show',$sku->slug) }}">Ver</a>
                            @endcan
                        </td>

                        <td>
                            @can('editar-skus')
                            <a class="btn btn-info"
                            href="{{ route('admin.sku.edit',$sku->slug) }}">Editar</a>
                            @endcan
                        </td>

                        <td>
                            @can('editar-skus')
                            <a class="btn btn-danger"
                            href="{{ route('admin.sku.index') }}"
                            v-on:click.prevent="deseas_eliminar({{ $sku->id}})"
                            >Eliminar</a>
                            @endcan
                        </td>

                    </tr>
                @endforeach


            </tbody>
          </table>
          {{ $skus->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection
