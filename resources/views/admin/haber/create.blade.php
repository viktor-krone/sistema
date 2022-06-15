@extends('plantilla.admin')

@section('titulo', 'Crear Haberes')
    @section('breadcrumb')
        <li class="breadcrumb-item"><a href="{{route('admin.haber.index')}}">Haberes</a></li>
        <li class="breadcrumb-item active">@yield('titulo')</li>
    @endsection
@section('contenido')

<div id="apihaber">
    <form action="{{ route('admin.haber.store') }}" method="POST">
        @csrf

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Administración de Haberes</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>

            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Haber</label>
                            <select class="form-control" v-model="haber_id" name="haber_id" id="haber_id">
                              <option>Seleccione...</option>
                              @foreach($haberes as $index => $valor )
                                  <option value="{{ $valor->id }}">
                                      {{ $valor->nombre }}
                                  </option>
                              @endforeach
                            </select>

                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Trabajador</label>
                            <select class="form-control" v-model="trabajador_id" name="trabajador_id" id="trabajador_id">
                              <option>Seleccione...</option>
                              @foreach($trabajadores as $index => $valor )
                                  <option value="{{ $valor->id }}">
                                      {{ $valor->nombre }}
                                  </option>
                              @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Fecha</label>
                            <input v-model="fecha"
                            class="form-control" type="date" name="fecha" id="fecha" value="{{ old('fecha') }}">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nombre">Monto</label>
                            <input v-model="monto" class="form-control" type="text" name="monto" id="monto" value="{{ old('monto') }}">
                        </div>


                    </div>
                </div>

                <div class="form-group">
                    <label for="descripcion">Observación</label>
                    <textarea class="form-control" name="observacion" id="observacion" cols="30" rows="5"></textarea>
                </div>
            </div>
            <!-- /.card-body -->

            <div class="card-footer">

                <a class="btn btn-danger" href="{{ route('cancelar','admin.haber.index') }}">Cancelar</a>
                <input
                :disabled = "deshabilitar_boton==1"
                type="submit" value="Guardar" class="btn btn-primary float-right">
            </div>
            <!-- /.card-footer-->
        </div>
        <!-- /.card -->
    </form>
</div>


@endsection
