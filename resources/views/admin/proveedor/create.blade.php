@extends('plantilla.admin')

@section('titulo', 'Crear Proveedor')

@section('breadcrumb')
<li class="breadcrumb-item"><a href="{{route('admin.proveedor.index')}}">Proveedores</a></li>
<li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('estilos')
<!-- Select2 -->
<link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
<link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">

@endsection

@section('scripts')

<!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script src="/adminlte/ckeditor/ckeditor.js"></script>


@endsection


@section('contenido')


<div id="apiproveedor">

    <form action="{{ route('admin.proveedor.store') }}" method="POST" enctype="multipart/form-data" >
        @csrf
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- SELECT2 EXAMPLE -->


                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Datos del Proveedor</h3>

                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Rut</label>
                                    <input
                                    v-model="rut"
                                    @blur="getProveedor"
                                    @focus = "div_aparecer= false"
                                    class="form-control" type="text" id="rut" name="rut">

                                    <div v-if="div_aparecer" v-bind:class="div_clase_rut">
                                        @{{ div_mensajerut }}
                                    </div>
                                    <br v-if="div_aparecer">


                                    <label>Razon</label>
                                    <input class="form-control" type="text" id="razon" name="razon" >

                                    <label>Email</label>
                                    <input class="form-control" type="text" id="email" name="email">


                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="form-group">
                                                <label class="control-label">Tipo :</label>

                                                <select name="tipoClientes_id[]" id="tipoClientes_id" class="form-control select2"  multiple='multiple'>
                                                    <option value="">Seleccione una opci??n...</option>

                                                    @foreach($tipoClientes as $index => $valor )
                                                        <option value="{{ $index }}">
                                                            {{ $valor }}
                                                        </option>



                                                    @endforeach
                                                </select>


                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <!-- /.form-group -->

                            </div>
                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Giro</label>
                                    <input class="form-control" type="text" id="giro" name="giro">

                                    <label>Fantasia</label>
                                    <input class="form-control" type="text" id="fantasia" name="fantasia" >

                                    <label>web</label>
                                    <input class="form-control" type="text" id="web" name="web" >

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



                <div class="card card-success">
                    <div class="card-header">
                        <h3 class="card-title">Secci??n de Direcci??n</h3>


                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">

                                    <label>Direcci??n</label>

                                    <div class="input-group">
                                        <input class="form-control" type="text" id="direccion" name="direccion" >
                                    </div>

                                </div>
                                <!-- /.form-group -->

                            </div>
                            <!-- /.col -->



                            <div class="col-md-3">
                                <div class="form-group">

                                    <label>Comuna</label>
                                    <div class="input-group">
                                        <input class="form-control" type="text" id="comuna_id" name="comuna_id">
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











                <div class="card card-danger">
                    <div class="card-header">
                        <h3 class="card-title">Administraci??n</h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">




                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">

                                    <a class="btn btn-danger" href="{{ route('cancelar','admin.proveedor.index') }}">Cancelar</a>
                                    <input
                                    :disabled = "deshabilitar_boton==1"

                                    type="submit" value="Guardar" class="btn btn-primary">

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






            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->



    </form>
</div>

@endsection
