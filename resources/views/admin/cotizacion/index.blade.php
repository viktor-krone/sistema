@extends('plantilla.admin')


@section('titulo', 'Administración de Cotizaciones')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="apicotizacion" class="row">

  <span style="display:none;" id="urlbase">{{route('admin.category.index')}}</span>

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de Cotizacion</h3>

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
            @can('crear-cotizacion')
                <a class=" m-2 float-right btn btn-primary"  href="{{ route('admin.cotizacion.create') }}">Crear</a>
            @endcan
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

                @foreach ($model as $cotizacion)
                    <tr>
                        <td> {{ $cotizacion->id }} </td>
                        <td> {{ $cotizacion->fecha }} </td>
                        <td> {{ $cotizacion->folio }} </td>
                        <td> {{ $cotizacion->cliente->rut }}</td>
                        <td> {{ $cotizacion->cliente->razon }}</td>
                        <td> {{ $cotizacion->vendedor->nombre }} </td>
                        <td> {{ number_format($cotizacion->total, 0, ",", ".") }} </td>
                        <td>  </td>

                        <td>
                            <a class="btn btn-default"
                                href="{{ route('admin.cotizacion.show',$cotizacion->id) }}">
                                Ver
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary" @click="cargarEstadoCotizacion({{ $cotizacion }})">
                            Estado
                            </button>
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





    <div class="modal fade" id="modal-primary">
        <div class="modal-dialog">

                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title">Estado Cotizacion</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-6">
                          <!-- select -->
                            <div class="form-group">
                                <label> Seleccione estado </label>
                                <select v-model="estado_cotizacion" class="form-control">
                                     <option v-for="estado in estados_cotizacion" :value="estado.id">@{{estado.nombre}}</option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary"  @click="updateEstadoCotizacion()" >Actualizar</button>
                    </div>
                </div>



            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    <!-- /.modal -->










  </div>
  <!-- /.row -->





 @endsection
