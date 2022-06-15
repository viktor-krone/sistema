@extends('plantilla.admin')


@section('titulo', 'Libro Ventas')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="apidocumento" class="row">

    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Sección de documentos</h3>

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

                @foreach ($model as $doc)
                    <tr>
                        <td> {{ $doc->id }} </td>
                        <td> {{ $doc->fecha }} </td>
                        <td> {{ $doc->folio }} </td>
                        <td> {{ $doc->cliente->rut }}</td>
                        <td> {{ $doc->cliente->razon }}</td>
                        <td> {{ $doc->vendedor->nombre }} </td>
                        <td> {{ number_format($doc->total, 0, ",", ".") }} </td>
                        <td>  </td>

                        <td>
                            <a class="btn btn-default"
                                href="{{ route('admin.documento.show',$doc->id) }}">
                                Ver
                            </a>
                        </td>
                        <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-primary" @click="cargarEstadoDocumento({{ $doc }})">
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
                        <h4 class="modal-title">Estado Documento</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="col-sm-6">
                          <!-- select -->
                            <div class="form-group">
                                <label> Seleccione estado </label>
                                <select v-model="estado_facturas" class="form-control">
                                     <option v-for="estado in estados_facturas" :value="estado.id">@{{estado.nombre}}</option>
                                </select>
                            </div>

                        </div>

                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                        <button type="button" class="btn btn-primary"  @click="updateEstadoFacturas()" >Actualizar</button>
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
