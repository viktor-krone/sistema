@extends('plantilla.admin')


@section('titulo', 'Crear Anticipo')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.anticipo')}}">Anticipo</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')




<div id="apitrabajador">
    <form action="{{ route('admin.anticipo.store') }}" method="POST">
      @csrf

      <input type="hidden" id="trabajador_id" name="trabajador_id" value="{{ $trabajador->id }}" readonly/>

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administración anticipo</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">









            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Tipo</label>
                        <div class="input-group">
                            <select class="form-control" id="tipo" name="tipo">
                                <option value="0" >Anticipo</option>
                                <option value="1" >Pago</option>
                            </select>
                        </div>



                    </div>

                    <div class="form-group">
                        <label>Monto</label>
                        <div class="input-group">
                            <input class="form-control" type="number" id="monto" name="monto">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Fecha</label>
                        <div class="input-group">
                            <input class="form-control" type="date" id="fecha" name="fecha" >
                        </div>
                    </div>


                    <!-- /.form-group -->
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Razon</label>
                        <div class="input-group">
                            <textarea class="form-control" name="razon" rows="5" id="razon" value="{{ old('razon') }}"></textarea>
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <label>Observacion</label>
                        <div class="input-group">
                            <textarea class="form-control" name="observacion" rows="5" id="observacion" value="{{ old('observacion') }}"></textarea>
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->






        </div>
        <!-- /.card-body -->
        <div class="card-footer">

          <a class="btn btn-danger" href="{{ route('cancelar','admin.trabajador.index') }}">Cancelar</a>


            <input :disabled = "deshabilitar_boton==1"
                  type="submit" value="Guardar" class="btn btn-primary float-right">


        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </form>
</div>














@endsection
