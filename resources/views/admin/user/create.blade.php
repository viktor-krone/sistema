@extends('plantilla.admin')


@section('titulo', 'Crear Categoría')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.user.index')}}">Usuarios</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')

<div id="apiuser">
    <form action="{{ route('admin.user.store') }}" method="POST">
        @csrf

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Administración de Usuarios</h3>

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
                            <label>Rut</label>
                            <div class="input-group">
                                <input v-model="rut"
                                @blur="getUser"
                                @focus = "div_aparecer= false"
                                class="form-control" type="text" id="rut" name="rut" value="{{ ($model->rut) ?? old('rut') }}">
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nombre</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="name" name="name" value="{{ ($model->name) ?? old('name') }}" >
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Apellido Paterno</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="apellidoPaterno" name="apellidoPaterno" value="{{ ($model->apellidPaterno) ?? old('apellidPaterno') }}">
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
                                <input class="form-control" type="text" id="apellidoMaterno" name="apellidoMaterno" value="{{ ($model->apellidMaterno) ?? old('apellidMaterno') }}">
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->

                    <div class="col-md-6">
                        <div class="form-group">
                            <label>E-mail</label>
                            <div class="input-group">
                                <!--input class="form-control" type="text" id="email" name="email" value="{{ ($model->email) ?? old('email') }}" -->
                                <input type="text" value="{{ ($model->email) ?? old('email') }}" class="form-control" name="email" id='email' placeholder="Ej: hola@mundo.com" autocomplete="off"/>
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>

                    <div class="row">

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Contraseña</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="password" name="password" value="{{ ($model->password) ?? old('password') }}">
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Confirmar Contraseña</label>
                                <div class="input-group">
                                    <input class="form-control" type="password" id="confirm_password" name="confirm_password" value="">
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>

                    </div>
                    <!-- /.col -->

                    <div class="row">
                        <div class="col-md-6 col-sm-6 col-xs-12">
                            <div class="form-group">
                            <label class="control-label">Role :</label>
                            <select name="role_id" id="role_id" class="form-control select2" >
                                <option value="">Seleccione una opción...</option>
                                @foreach($roles as $index => $name )
                                    <option value="{{ $index }}" @if( $user->hasRole(Str::slug($name))) selected="selected" @endif>{{ $name }}</option>
                                @endforeach
                            </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Imagen</label>
                                <div class="input-group">
                                    <input class="form-control" type="file" id="imagen" name="imagen"  >
                                </div>
                            </div>
                            <!-- /.form-group -->
                        </div>
                    </div>

                </div>
                <!-- /.row -->




            </div>
            <!-- /.card-body -->

            <div class="card-footer">
                <a class="btn btn-danger" href="{{ route('cancelar','admin.user.index') }}">Cancelar</a>
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
