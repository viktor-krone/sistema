@extends('plantilla.admin')


@section('titulo', 'Administración de Notas de ventas')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.notaventa.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de Notas de ventas</h3>

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
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.notaventa.create') }}">Crear</a>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th> Fecha </th>
                <th> Folio </th>
                <th> Rut </th>
                <th> Razon </th>
                <th> Vendedor </th>
                <th> Total </th>
                <th> </th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($model as $notaventa)

                    <tr>
                        <td> {{ $notaventa->id }} </td>
                        <td> {{ $notaventa->fecha }} </td>
                        <td> {{ $notaventa->folio }} </td>
                        <td> {{ $notaventa->cliente->rut }}</td>
                        <td> {{ $notaventa->cliente->razon }}</td>
                        <td> {{ $notaventa->vendedor->nombre }} </td>
                        <td> {{ number_format($notaventa->total, 0, ",", ".") }} </td>
                        <td>  </td>

                        <td>
                            <a class="btn btn-default"
                                href="{{ route('admin.notaventa.show',$notaventa->id) }}">
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
