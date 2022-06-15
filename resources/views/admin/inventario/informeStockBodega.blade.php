@extends('plantilla.admin')


@section('titulo', 'Informe Stock por bodega')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>

  @section('breadcrumb')
      <li class="breadcrumb-item"><a href="{{ route('admin.informe.stock') }}">Stock</a></li>
      <li class="breadcrumb-item active">@yield('titulo')</li>
  @endsection
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
                <th> Producto </th>
                <th> Bodega </th>
                <th> Stock </th>
              </tr>
            </thead>
            <tbody>
                @foreach ($stock as $item)
                    <tr>
                        <td> {{ $item->id }} </td>
                        <td> {{ $item->product->slug }} </td>
                        <td> {{ $item->bodega->nombre }} </td>
                        <td> {{ $item->cantidad }} </td>
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
