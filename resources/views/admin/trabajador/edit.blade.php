@extends('plantilla.admin')


@section('titulo', 'Editar Trabajador')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.trabajador.index')}}">Trabajadores</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apitrabajador">
    <form action="{{ route('admin.trabajador.update',$trabajador->id)}}" method="POST">
      @csrf
      @method('PUT')
      <span style="display:none;" id="editar">{{ $editar }}</span>
      <span style="display:none;" id="nombretemp">{{ $trabajador->nombre}}</span>

      <div class="col-md-12">
          <div class="card">
              <div class="card-header">
                  <h3 class="card-title">Crear Trabajador</h3>

                  <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                          <i class="fas fa-minus"></i>
                      </button>
                      <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                          <i class="fas fa-times"></i>
                      </button>
                  </div>
              </div>

              <div class="card-header p-2">
                  <ul class="nav nav-pills">
                      <li class="nav-item"><a class="nav-link active" href="#datosPersonales" data-toggle="tab">Datos Personales</a></li>
                      <li class="nav-item"><a class="nav-link" href="#datosLaborales" data-toggle="tab">Datos Laborales</a></li>
                      <li class="nav-item"><a class="nav-link" href="#prevision" data-toggle="tab">Prevision</a></li>
                      <li class="nav-item"><a class="nav-link" href="#datosBancarios" data-toggle="tab">Datos bancarios</a></li>
                  </ul>
              </div><!-- /.card-header -->

              <div class="card-body">
                  <div class="tab-content">
                      <div class="active tab-pane" id="datosPersonales">
                          <div class="row">
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Rut</label>
                                      <div class="input-group">
                                          <input class="form-control" type="text" id="rut" name="rut" value="{{ $trabajador->rut }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Nombre</label>
                                      <div class="input-group">
                                          <input class="form-control" type="text" id="nombre" name="nombre" value="{{ $trabajador->nombre }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Segundo Nombre</label>
                                      <div class="input-group">
                                          <input class="form-control" type="text" id="segundo_nombre" name="segundo_nombre"  value="{{ $trabajador->segundo_nombre }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Apellido Paterno</label>
                                      <div class="input-group">
                                          <input class="form-control" type="text" id="apellido_paterno" name="apellido_paterno" value="{{ $trabajador->apellido_paterno }}">
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
                                          <input class="form-control" type="text" id="apellido_materno" name="apellido_materno" value="{{ $trabajador->apellido_materno }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <!-- /.col -->
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Fecha Nacimiento</label>
                                      <div class="input-group">
                                          <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="{{ $trabajador->fecha_nacimiento }}" >
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Estado civil</label>

                                      <div class="input-group">
                                          <select class="form-control" required id="estado_civil_id" name="estado_civil_id">
                                            @foreach ($estado_civil as $item)
                                                 <option value="{{ $item->id }}"{{ ($item->id == $trabajador->estado_civil_id) ? 'selected' : '' }}>{{ $item->nombre }}</option>
                                            @endforeach

                                          </select>
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Estado Militar</label>
                                      <div class="input-group">
                                          <select class="form-control" required id="estado_militar_id" name="estado_militar_id">
                                              <option value="0">Seleccione</option>
                                              @foreach ($estado_militar as $item)
                                                  <option value="{{ $item->id }}"{{ ($item->id == $trabajador->estado_militar_id) ? 'selected' : '' }}>{{ $item->nombre }}</option>
                                              @endforeach

                                          </select>
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Sexo</label>
                                      <div class="input-group">
                                          <select class="form-control" id="sexo_id" name="sexo_id" required>
                                              @foreach ($sexos as $item)
                                                  <option value="{{ $item->id }}"{{ ($item->id == $trabajador->sexo_id) ? 'selected' : '' }}>{{ $item->nombre }}</option>
                                              @endforeach

                                          </select>
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Nivel estudio</label>
                                      <div class="input-group">
                                          <select class="form-control" id="nivel_estudio_id" name="nivel_estudio_id">
                                              <option value="0">Seleccione</option>
                                              @foreach ($nivel_estudio as $item)
                                                  <option value="{{ $item->id }}" {{ ($item->id == $trabajador->nivel_estudio_id) ? 'selected' : '' }}
                                                      >{{ $item->nombre }}</option>
                                              @endforeach
                                          </select>
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-2">
                                  <div class="form-group">
                                      <label>Telefono</label>
                                      <div class="input-group">
                                          <input class="form-control" type="text" id="telefono" name="telefono" value="{{ $trabajador->telefono }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>

                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Dirección</label>
                                      <div class="input-group">
                                          <input class="form-control" type="text" id="direccion" name="direccion" value="{{ $trabajador->direccion }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Comuna</label>
                                      <div class="input-group">
                                          <input class="form-control" type="text" id="comuna_id" name="comuna_id" value="{{ $trabajador->comuna_id }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>

                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>E-mail</label>
                                      <div class="input-group">
                                          <input class="form-control" type="text" id="email" name="email" value="{{ $trabajador->email }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>






                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Imagen</label>
                                      <div class="input-group">
                                          <input class="form-control" type="file" id="imagen" name="imagen"  >
                                      </div>

                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-2">
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

                      </div>
                      <div class="tab-pane" id="datosLaborales">
                          <div class="row">




                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Sueldo</label>
                                      <div class="input-group">
                                          <input class="form-control" type="text" id="sueldo" name="sueldo" value="{{ $trabajador->sueldo }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>fecha_inicio</label>
                                      <div class="input-group">
                                          <input class="form-control" type="date" id="inicio" name="inicio" value="{{ $trabajador->inicio }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>
                              <div class="col-md-4">
                                  <div class="form-group">
                                      <label>Fecha Termino</label>
                                      <div class="input-group">
                                          <input class="form-control" type="date" id="termino" name="termino" value="{{ $trabajador->termino }}">
                                      </div>
                                  </div>
                                  <!-- /.form-group -->
                              </div>

                          </div>
                      </div>
                      <div class="tab-pane" id="prevision">
                          aca
                      </div>
                      <div class="tab-pane" id="datosBancarios">
                          aca
                      </div>

                  </div>

              </div><!-- /.card-body -->

              <div class="card-footer">

                  <a class="btn btn-danger" href="{{ route('cancelar','admin.trabajador.index') }}">Cancelar</a>


                  <input
                      :disabled = "deshabilitar_boton==1"
                      type="submit" value="Guardar" class="btn btn-primary float-right">

              </div>


          </div>
           <!-- /.nav-tabs-custom -->
      </div>

      <!-- /.card -->
    </form>
</div>


 @endsection
