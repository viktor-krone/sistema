@extends('plantilla.admin')


@section('titulo', 'Crear Movimiento')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.movimiento.index')}}">Movimiento inventario</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="apimovimiento">
    <form action="#" method="POST">
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
                                        <i class="fas fa-globe"></i> Movimiento
                                        <small class="float-right">Fecha: 2020-02-25</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">

                                    <div class="form-group">
                                        <label>Bodega</label>
                                        <select class="form-control" id="bodega_id" name="bodega_id" v-model="bodega_id">
                                            <option>Seleccione</option>
                                            @foreach ($bodegas as $bodega)
                                                <option value="{{ $bodega->id }}">{{ $bodega->nombre }}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                </div>
                                <div class="col-sm-4 invoice-col">

                                    <div class="form-group">
                                        <label>Tipo</label>
                                        <select class="form-control" id="tipo_id" name="tipo_id" v-model="tipo_id">
                                            <option value="1">Ingreso</option>
                                            <option value="2">Egreso</option>
                                        </select>

                                    </div>

                                </div>
                                <!-- /.col -->
                                <div class="col-sm-4 invoice-col">
                                    <div class="form-group">
                                        <label>Fecha</label>
                                        <input type="date" id="fecha" name="fecha" class="form-control" v-model="fecha">
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->











                            <!-- Table row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped" id="productTable">
                                        <thead>
                                            <form id="frmCadastro">
                                                <tr>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>ID</label>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Codigo</label>
                                                                <input type="text" id="codigo" name="codigo" class="form-control" data-type='codigo' placeholder="Codigo" v-model="fillSku.slug">

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input id="product" class="form-control" type="text" placeholder="Nombre del producto" v-model="fillSku.nombre"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Cantidad</label>
                                                                <input class="form-control" type="text" placeholder="Cantidad" v-model="fillSku.cantidad"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Precio</label>
                                                                <input class="form-control" type="text" placeholder="Precio" v-model="fillSku.precio_actual" />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Costo</label>
                                                                <input class="form-control" type="text" placeholder="Precio" v-model="fillSku.costo"  />
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Sub-total</label>
                                                                <input type="text" id="subtotalLinea" name="subtotalLinea" class="form-control" readonly>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-xs-1">
                            					            <button class="btn btn-primary form-control" v-on:click.prevent="addProductToDetail()">
                            					                <i class="glyphicon glyphicon-plus"></i>
                            					            </button>
                            					        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                        </thead>
                                        <tr v-for="detail in details">
                                            <td>
                                                <button class="btn btn-danger btn-xs btn-block" v-on:click.prevent="removeProductFromDetail(detail)">X</button>
                                            </td>
                                            <td>@{{ detail.slug }}</td>
                                            <td>@{{ detail.nombre }}</td>
                                            <td>detalle largo</td>
                                            <td class="text-center">@{{ detail.cantidad }}</td>
            					            <td class="text-right">@{{ detail.precio }}</td>
            					            <td class="text-right">@{{ detail.costo }}</td>
            					            <td class="text-right">@{{ detail.total.toFixed(0) }}</td>
                                        </tr>



                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->











                            <!-- Table row -->
                            <!--div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>Codigo #</th>
                                                <th>Producto</th>
                                                <th>Descripcion</th>
                                                <th>Cantidad</th>
                                                <th>Valor</th>
                                                <th>Sub-Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>ps2-cd</td>
                                                <td>Call of Duty</td>
                                                <td>El snort testosterone trophy driving gloves handsome</td>
                                                <td>1</td>
                                                <td>$ 25.000</td>
                                                <td>$ 25.000</td>
                                            </tr>
                                            <tr>
                                                <td>nfs-01</td>
                                                <td>Need for Speed IV</td>
                                                <td>Wes Anderson umami biodiesel</td>
                                                <td>2</td>
                                                <td>$ 50.000</td>
                                                <td>$ 100.000</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div-->
                            <!-- /.row -->

                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">

                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <!--p class="lead">Amount Due 2/22/2014</p-->

                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th>Total:</th>
                                                <td>$ @{{ total.toFixed(0) }}</td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->

                            <!-- this row will not appear when printing -->
                            <div class="row no-print">
                                <div class="col-12">
                                    <a class="btn btn-danger" href="{{ route('cancelar','admin.category.index') }}">Cancelar</a>

                                    <!--a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a-->
                                    <!--button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button-->
                                    <button v-if="details.length > 0 " v-on:click.prevent="save" type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Genera PDF
                                    </button>

                                    <!--div class="card-footer">
                                        <a class="btn btn-danger" href="{{ route('cancelar','admin.category.index') }}">Cancelar</a>

                                        <input type="submit" value="Guardar" class="btn btn-primary float-right">
                                    </div-->

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
