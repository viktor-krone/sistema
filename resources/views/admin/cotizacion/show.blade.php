@extends('plantilla.admin')


@section('titulo', 'Ver Cotizacion')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.cotizacion.index')}}">Cotizacion</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apicategory">


    <div class="container">
	    <div class="row">
	        <div class="col-md-12">
	            <div class="panel panel-default">
					<div class="panel-body">
						<h2 class="page-header">
			                Comprobante # {{ str_pad($model->id, 7, 0, STR_PAD_LEFT) }}
			            </h2>
					    <div class="well well-sm">
					        <div class="row">
					            <div class="col-xs-4">
					                <input class="form-control typeahead" type="text" readonly value="{{ $model->cliente->razon }}" />
					            </div>
					            <div class="col-xs-2">
					                <input class="form-control" type="text" readonly value="{{ $model->cliente->rut }}" />
					            </div>
					            <div class="col-xs-6">
					                <input class="form-control" type="text" readonly value="{{ $model->cliente->direccion }}" />
					            </div>
					        </div>
					    </div>

					    <hr />

					    <table class="table table-striped">
					        <thead>
					        <tr>
					            <th>Producto</th>
					            <th style="width:100px;" class="text-center">Cantidad</th>
					            <th style="width:110px;" class="text-center">Precio</th>
					            <th style="width:110px;" class="text-center">Descuento</th>
					            <th style="width:120px;" class="text-center">Total</th>
					        </tr>
					        </thead>
					        <tbody>
					        @foreach($model->detalles as $d)
					        <tr>
					            <td>{{ $d->product->nombre }}</td>
					            <td class="text-center">{{ $d->cantidad }}</td>
					            <td class="text-right">{{ number_format($d->precio, 0, ",", ".") }}</td>
					            <td class="text-right">{{ number_format($d->valor_descuento, 0, ",", ".") }}</td>
					            <td class="text-right">{{ number_format($d->total, 0, ",", ".") }}</td>
					        </tr>
					        @endforeach
					        </tbody>
					        <tfoot>
                            <tr>
                                <td colspan="4" class="text-right"><b>Sub Total</b></td>
                                <td class="text-right">{{ number_format($model->subTotal, 0, ",", ".") }}</td>
                            </tr>
					        <tr>
					            <td colspan="4" class="text-right"><b>IVA</b></td>
					            <td class="text-right">{{ number_format($model->iva, 0, ",", ".") }}</td>
					        </tr>
					        <tr>
					            <td colspan="4" class="text-right"><b>Total</b></td>
					            <td class="text-right">{{ number_format($model->total, 0, ",", ".") }}</td>
					        </tr>
					        </tfoot>
					    </table>
					</div>
		    	</div>
	        </div>
	    </div>
	</div>





</div>


 @endsection
