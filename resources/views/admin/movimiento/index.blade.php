@extends('plantilla.admin')


@section('titulo', 'Administración de Ajustes de inventario')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.movimiento.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de Ajuste</h3>

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
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.movimiento.create') }}">Crear</a>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th> Fecha </th>
                <th> Folio </th>
                <th> </th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($model as $item)

                    <tr>
                        <td> {{ $item->id }} </td>
                        <td> {{ $item->fecha }} </td>
                        <td> {{ $item->folio }} </td>
                        <td>  </td>

                        <td>
                            <a class="btn btn-default"
                                href="{{ route('admin.movimiento.show',$item->id) }}">
                                Ver
                            </a>
                        </td>

                    </tr>
                @endforeach


            </tbody>
          </table>

        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection
