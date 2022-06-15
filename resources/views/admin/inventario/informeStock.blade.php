@extends('plantilla.admin')


@section('titulo', 'Informe Stock')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

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
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th> Codigo </th>
                <th> Precio </th>
                <th> Stock </th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($productos as $item)

                    <tr>
                        <td> {{ $item->id }} </td>
                        <td> {{ $item->nombre }} </td>
                        <td> {{ $item->precio_actual }} </td>
                        <td> {{ $item->stock_actual }} </td>
                        <td>
                            <a class="btn btn-default"
                            href="{{ route('admin.informe.stockBodega',$item->id) }}">Bodegas</a>
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
