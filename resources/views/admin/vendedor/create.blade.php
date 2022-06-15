@extends('plantilla.admin')


@section('titulo', 'Crear Vendedor')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.vendedor.index')}}">Vendedor</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<div id="apivendedor">
    <form action="{{ route('admin.vendedor.store') }}" method="POST">
      @csrf

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administración de Vendedores</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">
            <div class="form-group">
                <label for="rut">Rut</label>
                <input v-model="rut"
                    @blur="getVendedor"
                    @focus = "div_aparecer= false"
                    class="form-control" type="text" name="rut" id="rut" >

                <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                   @{{ div_mensajeslug }}
                </div>
                <br>


                <label for="nombre">Nombre</label>
                <input v-model="nombre" class="form-control" type="text" name="nombre" id="nombre">

                <label for="slug">Comision</label>
                <input class="form-control" type="text" name="comision" id="comision" >

            </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">

          <a class="btn btn-danger" href="{{ route('cancelar','admin.category.index') }}">Cancelar</a>


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
