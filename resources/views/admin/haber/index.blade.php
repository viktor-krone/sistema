@extends('plantilla.admin')


@section('titulo', 'Administración de Haberes')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.haber.index')}}</span>
  @include('custom.modal_eliminar')
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de Haberes</h3>

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
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.haber.create') }}">Crear</a>
          <table class="table table-head-fixed">
            <thead>
              <tr>
                <th>ID</th>
                <th>Fecha</th>
                <th>Haber</th>
                <th>Descripción</th>
                <th>Monto</th>
                <th>Fecha creación</th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($haberes as $haber)

                    <tr>
                        <td> {{ $haber->id }} </td>
                        <td> {{ $haber->fecha }} </td>
                        <td> {{ $haber->haber_id }} </td>
                        <td> {{ $haber->observacion }} </td>
                        <td> {{ $haber->monto }} </td>
                        <td> {{ $haber->created_at }} </td>
                        <td> ops </td>
                    </tr>
                @endforeach


            </tbody>
          </table>
          {{ $haberes->appends($_GET)->links() }}
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
  <!-- /.row -->



 @endsection
