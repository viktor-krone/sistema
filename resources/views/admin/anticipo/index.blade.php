@extends('plantilla.admin')


@section('titulo', 'Administración de anticipos')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.anticipo')}}</span>
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
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Rut</th>
                <th>Nombre</th>
                <th>Fecha</th>
                <th>Solicitado</th>
                <th>Pagado</th>
                <th>Restante</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($trabajadores as $trabajador)

                    <tr>
                        <td> {{ $trabajador->id }} </td>
                        <td> {{ $trabajador->rut }} </td>
                        <td> {{ $trabajador->nombre }} </td>
                        <td> {{ $trabajador->inicio }} </td>
                        <td class="success"> {{ $montoSolicitado = MyHelper::montoSolicitado($trabajador->id) }} </td>
                        <td> {{ $montoPagado = MyHelper::montoPagado($trabajador->id) }}</td>
                        <td> 80.000 </td>

                        <td>

                        </td>

                        <td>
                            <!-- Single button -->
                            <div class="btn-group">
                                <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fa fa-bars"></i>
                                </button>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <a href="">Informacion de {{$trabajador->nombre}}</a>
                                    </li>
                                    <li>
                                        <a href="{{ route('admin.anticipo.create',$trabajador->id) }}">Asignar Anticipo</a>
                                    </li>
                                </ul>
                            </div>
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
