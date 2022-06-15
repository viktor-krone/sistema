@extends('plantilla.admin')


@section('titulo', 'Crear Factura')

@section('breadcrumb')
    <li class="breadcrumb-item"><a href="{{route('admin.factura.index')}}">Factura</a></li>
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="apicotizacion">
    <form id="apifactura" action="#" @submit="checkForm" method="POST" >
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
                                        <i class="fas fa-globe"></i> Factura
                                        <small class="float-right">Fecha: 2020-02-25</small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>

                            <div class="alert alert-warning" role="alert" v-if="errors.length">
                                <b>Por favor, corrija el(los) siguiente(s) error(es):</b>
                                <ul>
                                    <li v-for="error in errors">@{{ error }}</li>
                                </ul>
                            </div>


                            <!-- info row -->
                            <div class="row invoice-info">
                                <div class="col-sm-6 invoice-col">
                                    <div class="form-group row">
                                        <label for="inputCliente" class="col-sm-2 col-form-label">Cliente</label>
                                        <div class="col-sm-10">
                                            <input id="client" class="form-control typeahead" type="text" placeholder="Cliente" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputRut" class="col-sm-2 col-form-label">RUT</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Rut" readonly v-model="fillClient.rut" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputRazon" class="col-sm-2 col-form-label">Razon</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Razon" readonly v-model="fillClient.razon" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputGiro" class="col-sm-2 col-form-label">Giro</label>
                                        <div class="col-sm-10">
                                            <input class="form-control" type="text" placeholder="Giro" readonly v-model="fillClient.giro" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputGiro" class="col-sm-2 col-form-label">Dirección</label>
                                        <div class="col-sm-10">
                                            -
                                        </div>
                                    </div>
                                </div>
                                <!-- /.col -->
                                <div class="col-sm-6 invoice-col">
                                    <div class="form-group row">
                                        <label for="inputFecha" class="col-sm-2 col-form-label">Fecha</label>
                                        <div class="col-sm-10">
                                            <input type="date" id="fecha" name="fecha" class="form-control" v-model="fecha">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputFormaPago" class="col-sm-2 col-form-label">Forma de pago</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="forma_pago" name="forma_pago" v-model="forma_pago">
                                                <option value="1">Contado</option>
                                                <option value="2">Transferencia</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputVendedor" class="col-sm-2 col-form-label">Vendedor</label>
                                        <div class="col-sm-10">
                                            <select class="form-control" id="vendedor" name="vendedor" v-model="vendedor" >
                                                @foreach ($vendedores as $vendedor)
                                                    <option value="{{ $vendedor->id }}">{{ $vendedor->nombre }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputCategoria" class="col-sm-2 col-form-label">Categoria</label>
                                        <div class="col-sm-10">
                                            <select class="form-control">
                                                <option>Desarrollo</option>
                                                <option>Operaciones</option>
                                                <option>Ventas</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label></label>
                                        -
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
                                                                <label>Codigo</label>
                                                                <input type="text" id="codigo" name="codigo" class="form-control" data-type='codigo' placeholder="Codigo" v-model="fillProduct.slug"
                                                                readonly>

                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Nombre</label>
                                                                <input id="product" class="form-control" type="text" placeholder="Nombre del producto" v-model="fillProduct.nombre"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Cantidad</label>
                                                                <input class="form-control" type="text" placeholder="Cantidad" v-model="fillProduct.cantidad"
                                                                v-on:change="calcularLinea"/>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Precio</label>
                                                                <input class="form-control" type="text" placeholder="Precio" v-model="fillProduct.precio_actual" v-on:change="calcularLinea" readonly />
                                                            </div>
                                                        </div>
                                                    </td>





                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group row">
                                                                <label>Descuento</label>
                                                                <input class="form-control sele input-sm" type="number" placeholder="Valor Descuento" v-model="fillProduct.valor_descuento" v-on:change="calcularLinea"/>
                                                            </div>
                                                        </div>
                                                    </td>






                                                    <td>
                                                        <div class="col-sm-12">
                                                            <div class="form-group">
                                                                <label>Sub-total</label>
                                                                <input type="text"  class="form-control" v-model="fillProduct.total" readonly>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="col-xs-1">
                            					            <button class="btn btn-primary form-control" v-on:click.prevent="addProductToDetail()">
                            					                <i class="glyphicon glyphicon-plus">+</i>
                            					            </button>
                            					        </div>
                                                    </td>
                                                </tr>
                                            </form>
                                        </thead>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
















                            <div class="row">
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-hover">
                  <thead>
                    <tr>
                      <th>Quitar</th>
                      <th>Codigo</th>
                      <th>Detalle</th>
                      <th>Detalle Largo</th>
                      <th>Cantidad</th>
                      <th>Precio</th>
                      <th>Descuento</th>
                      <th>Sub-total</th>
                    </tr>
                  </thead>
                  <tbody>
                      <tr v-for="detail in details">
                              <td>
                                  <button class="btn btn-danger btn-xs btn-block" v-on:click.prevent="removeProductFromDetail(detail)">X</button>
                              </td>

                          <td>@{{ detail.slug }}</td>
                          <td>@{{ detail.nombre }}</td>
                          <td>detalle largo</td>
                          <td class="text-center">@{{ detail.cantidad }}</td>
                          <td class="text-right">@{{ detail.precio_actual }}</td>
                          <td class="text-right">@{{ detail.valor_descuento }}</td>
                          <td class="text-right">@{{ detail.total.toFixed(0) }}</td>
                      </tr>

                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
















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
                                                <th style="width:50%">Subtotal:</th>
                                                <td>$ @{{ subTotal.toFixed(0) }}</td>
                                            </tr>
                                            <tr>
                                                <th>IVA (19%)</th>
                                                <td>$ @{{ iva.toFixed(0) }}</td>
                                            </tr>
                                            <tr>
                                                <th>Envio:</th>
                                                <td>$ 0</td>
                                            </tr>
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
                                    <a class="btn btn-danger" href="{{ route('cancelar','admin.factura.index') }}">Cancelar</a>

                                    <!--a href="invoice-print.html" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a-->
                                    <!--button type="button" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button-->
                                    <button v-if="details.length > 0 && fillClient.id > 0" v-on:click.prevent="save" type="submit" class="btn btn-primary float-right" style="margin-right: 5px;">
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
