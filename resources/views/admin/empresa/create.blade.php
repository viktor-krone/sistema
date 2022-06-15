@extends('plantilla.admin')

@section('titulo', 'Crear Empresa')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.empresa.index')}}">Empresa</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')

<div id="apiempresa">
    <form action="{{ route('admin.empresa.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Administración de Empresas</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                        <i class="fas fa-minus"></i></button>
                        <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                            <i class="fas fa-times"></i></button>
                </div>
            </div>

            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Datos de la empresa</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Rut Empresa</label>
                                <input v-model="rut_empresa"
                                @blur="getEmpresa"
                                @focus = "div_aparecer= false"
                                class="form-control" type="text" name="rut_empresa" id="rut_empresa" >
                                <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                                    @{{ div_mensajeslug }}
                                </div>
                                <br v-if="div_aparecer">

                                <label for="slug">Razon </label>
                                <input class="form-control" type="text" name="razon" id="razon">
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Fantasia</label>
                                <input  class="form-control" type="text" name="fantasia" id="fantasia" >

                                <label for="slug">Telefono</label>
                                <input class="form-control" type="text" name="telefono" id="telefono" >
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Web</label>
                                <input class="form-control" type="text" name="web" id="web" >

                                <label for="slug">Email</label>
                                <input class="form-control" type="text" name="email" id="email" >
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Imagen</label>
                                <input type="file" class="form-control-file" name="imagenes[]" id="imagenes[]" multiple
                                accept="image/*" >

                                <div class="description">
                                 Un número ilimitado de archivos pueden ser cargados en este campo.
                                  <br>
                                  Límite de 2048 MB por imagen.
                                  <br>
                                  Tipos permitidos: jpeg, png, jpg, gif, svg.
                                  <br>
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

                </div>
            </div>


            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Imagen</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="slug">Imagen</label>
                                <input type="file" class="form-control-file" name="imagenes[]" id="imagenes[]"
                                accept="image/*" >

                                <div class="description">
                                 Un número ilimitado de archivos pueden ser cargados en este campo.
                                  <br>
                                  Límite de 2048 MB por imagen.
                                  <br>
                                  Tipos permitidos: jpeg, png, jpg, gif, svg.
                                  <br>
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen </label>
                                <div class="input-group">
                                    <!-- mostrar imagen -->
                                   <img style="width:150px; height:150px;" src="{{ $empresa->images->url }}" class="img-fluid mb-2" />
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

                </div>
            </div>
            <!-- /.card -->


            <!-- /.card -->
            <div class="card card-success">
                <div class="card-header">
                    <h3 class="card-title">Dirección</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Region</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="region" name="region" >
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Comuna</label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="comuna" name="comuna" >
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Direccion </label>
                                <div class="input-group">
                                    <input class="form-control" type="text" id="direccion" name="direccion" >
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

                </div>
            </div>
            <!-- /.card -->

            <!-- /.card-body -->
            <div class="card-footer">
                <a class="btn btn-danger" href="{{ route('cancelar','admin.empresa.index') }}">Cancelar</a>
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
