@extends('plantilla.admin')


@section('titulo', 'Ver Trabajador')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.category.index')}}">Trabajadores</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apicategory">
    <form >
      @csrf





      <span style="display:none;" id="editar">{{ $editar }}</span>
      <span style="display:none;" id="nombretemp">{{ $trabajador->nombre}}</span>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administración de Categorias</h3>

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
                        <label>Rut</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="rut" name="rut" value="{{ $trabajador->rut }}" >
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Nombre</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="nombre" name="nombre" value="{{ $trabajador->nombre }}" >
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Apellido Paterno</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="apellido_paterno" name="apellido_paterno" >
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->
                <!-- /.col -->
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Apellido Materno</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="apellido_materno" name="apellido_materno" >
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <!-- /.col -->

                <div class="col-md-6">
                    <div class="form-group">
                        <label>E-mail</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="email" name="email" value="{{ $trabajador->email }}" >
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>




                <div class="col-md-4">
                    <div class="form-group">
                        <label>Telefono</label>
                        <div class="input-group">
                            <input class="form-control" type="text" id="telefono" name="telefono" value="{{ $trabajador->telefono }}"  >
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>fecha_inicio</label>
                        <div class="input-group">
                            <input class="form-control" type="date" id="fecha_inicio" name="fecha_inicio" value="{{ $trabajador->inicio }}"  >
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label>Fecha Termino</label>
                        <div class="input-group">
                            <input class="form-control" type="date" id="fecha_termino" name="fecha_termino" value="{{ $trabajador->termino }}"  >
                        </div>
                    </div>
                    <!-- /.form-group -->
                </div>


                <!-- /.col -->


                <div class="col-md-6">
                    <div class="form-group">
                        <label>Imagen</label>
                        <div class="input-group">
                            <input class="form-control" type="file" id="imagen" name="imagen"  >
                        </div>

                    </div>
                    <!-- /.form-group -->
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Estado</label>
                        <div class="input-group">
                            <select class="form-control" id="estado" name="estado">
                                <option value="1" >Activo</option>
                                <option value="0" >Inactivo</option>
                            </select>
                        </div>

                    </div>
                    <!-- /.form-group -->
                </div>

            </div>
            <!-- /.row -->







        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('cancelar','admin.trabajador.index') }}">Cancelar</a>

            <a class="btn btn-outline-success float-right" href="{{ route('admin.trabajador.edit',$trabajador->id) }}">Editar</a>





        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </form>
</div>


 @endsection
