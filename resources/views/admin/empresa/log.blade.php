@extends('plantilla.admin')


@section('titulo', 'Registro log')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="confirmareliminar" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.empresa.index')}}</span>
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección log</h3>

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
                <th> ID </th>
                <th> Nombre </th>
                <th> Descripcion </th>
                <th> Modelo </th>
                <th> Atributos </th>
                <th> Creacion </th>
                <th colspan="3"></th>
              </tr>
            </thead>
            <tbody>

                @foreach ($logs as $log)

                    <tr>
                        <td> {{ $log->id }} </td>
                        <td> {{ $log->log_name }} </td>
                        <td> {{ $log->description }} </td>
                        <td> {{ $log->subject_type }} </td>
                        <td> {{ $log->properties }} </td>
                        <td> {{ $log->created_at }} </td>

                        <td>
                            <a class="btn btn-default"
                            href="#">Ver</a>
                        </td>

                        <td>
                            <a class="btn btn-info"
                            href="">Editar</a>
                        </td>

                        <td>
                            <a class="btn btn-danger"
                            href="#"
                            >Eliminar</a>
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
