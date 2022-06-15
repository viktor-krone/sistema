@extends('plantilla.admin')


@section('titulo', 'Crear Trabajador')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.trabajador.index')}}">Trabajadores</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="apitrabajador">
    <form action="{{ route('admin.trabajador.store') }}" method="POST">
      @csrf


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
                                        <input class="form-control" type="text" id="rut" name="rut" >
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Nombre</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="nombre" name="nombre" >
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Segundo Nombre</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="segundo_nombre" name="segundo_nombre" >
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
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha Nacimiento</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" id="fecha_nacimiento" name="fecha_nacimiento" >
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Estado civil</label>
                                    <div class="input-group">
                                        <select class="form-control" id="estado_civil_id" name="estado_civil_id">
                                            <option>Seleccione</option>
                                            <option value="1">Soltero/a</option>
                                            <option value="2">Casado/a</option>
                                            <option value="3">Divorciado/a</option>
                                            <option value="4">Separado/a</option>
                                            <option value="5">Viudo/a</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Estado Militar</label>
                                    <div class="input-group">
                                        <select class="form-control" id="estado_militar_id" name="estado_militar_id">
                                            <option>Seleccione</option>
                                            <option value="1">Realizado</option>
                                            <option value="2">Eximido/a</option>
                                            <option value="3">Cumplido</option>
                                            <option value="4">Postergado</option>
                                            <option value="5">Inscrito/a</option>
                                            <option value="6">Sin Servicio Militar</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Sexo</label>
                                    <div class="input-group">
                                        <select class="form-control" id="sexo_id" name="sexo_id">
                                            <option>Seleccione</option>
                                            <option value="1">Femenino</option>
                                            <option value="2">Masculino</option>
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
                                            <option>Seleccione</option>
                                            <option value="1">Basico</option>
                                            <option value="2">Medio</option>
                                            <option value="3">Tecnico</option>
                                            <option value="4">Universitario</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Telefono</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="telefono" name="telefono" >
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Dirección</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="direccion" name="direccion" >
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Comuna</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="comuna_id" name="comuna_id" >
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>E-mail</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="email" name="email" >
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
                                        <input class="form-control" type="text" id="sueldo" name="sueldo" >
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha_inicio</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" id="inicio" name="inicio" >
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>




                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Fecha Termino</label>
                                    <div class="input-group">
                                        <input class="form-control" type="date" id="termino" name="termino" >
                                    </div>
                                </div>
                                <!-- /.form-group -->
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Cargo</label>
                                    <div class="input-group">
                                        
                                        <select class="form-control" id="cargo_id" name="cargo_id">
                                            <option>Seleccione</option>
                                            @foreach ($cargos as $cargo)
                                            <option value="{{ $cargo->id }}">{{ $cargo->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Departamentos</label>
                                    <div class="input-group">

                                        <select class="form-control" id="departamento_id" name="departamento_id">
                                            <option>Seleccione</option>
                                            @foreach ($departamentos as $departamento)
                                            <option value="{{ $departamento->id }}">{{ $departamento->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo de contrato</label>
                                    <div class="input-group">

                                        <select class="form-control" id="tipo_contrato_id" name="tipo_contrato_id">
                                            <option>Seleccione</option>
                                            <option value="1">Plazo fijo</option>
                                            <option value="2">Indefinido</option>

                                        </select>
                                    </div>
                                </div>
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


    </form>
</div>


 @endsection
