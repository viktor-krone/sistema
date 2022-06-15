@extends('plantilla.admin')


@section('titulo', 'Crear Cotizacion')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.cotizacion.index')}}">Cotizacion</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="apiliquidacion">
    <form action="{{ route('admin.liquidacion.store') }}" method="POST">
        @csrf


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">

                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Liquidacion
                                        <small class="float-right">Fecha: 2020-02-25</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-6 invoice-col">

                                    <div class="form-group">
                                        <label>Trabajador</label>
                                         <input id="trabajador" class="form-control typeahead" type="text" placeholder="Trabajador" />

                                    </div>

                                    <div class="form-group">
                                        <label>RUT</label>
                                        <input class="form-control" type="text" placeholder="Rut" readonly v-model="fillTrabajador.rut" />
                                    </div>
                                    <div class="form-group">
                                        <label>Razon</label>
                                        <input class="form-control" type="text" placeholder="Nombre" readonly v-model="fillTrabajador.nombre" />
                                    </div>


                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="date" id="fecha" name="fecha" class="form-control" v-model="fecha">
                                    </div>

                                    <div class="form-group">
                                        <label>Trabajador</label>
                                        <select class="form-control" id="trabajador" name="trabajador" v-model="trabajador" >
                                            <option>Seleccione</option>
                                            @foreach ($trabajadores as $trabajador)
                                                <option value="{{ $trabajador->id }}">{{ $trabajador->nombre }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->


                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a class="btn btn-danger" href="{{ route('cancelar','admin.liquidacion.index') }}">Cancelar</a>

                                    <!--button v-if="details.length > 0 && fillClient.id > 0" v-on:click.prevent="save" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Genera Liquidacion
                                    </button-->
                                    <input
                                    type="submit" value="Genera Liquidacion" class="btn btn-primary float-right" style="margin-right: 5px;">

                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->






</form>
</div>


@endsection
