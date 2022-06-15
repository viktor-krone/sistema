@extends('plantilla.admin')


@section('titulo', 'Ver Empresa')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.empresa.index')}}">Empresas</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apiempresa">
    <form >
      @csrf

      <span style="display:none;" id="editar">{{ $editar }}</span>
      <span style="display:none;" id="nombretemp">{{ $empresa->rut}}</span>
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
        <div class="card-body">


                    <div class="form-group">
                        <label for="nombre">Rut</label>
                        <input v-model="rut_empresa"
                            @blur="getEmpresa"
                            @focus = "div_aparecer= false"
                        class="form-control" type="text" name="rut" id="rut" value="{{ $empresa->rut_empresa }} " readonly>

                        <label for="razon">Razon</label>
                        <input class="form-control" type="text" name="razon" id="razon" value="{{ $empresa->razon }}" readonly>

                        <label for="fantasia">Fantasia</label>
                        <input class="form-control" type="text" name="fantasia" id="fantasia" value="{{ $empresa->fantasia }}" readonly>

                        <label for="telefono">Telefono</label>
                        <input class="form-control" type="text" name="telefono" id="telefono" value="{{ $empresa->telefono }}" readonly>

                    </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('cancelar','admin.empresa.index') }}">Cancelar</a>

            <a class="btn btn-outline-success float-right" href="{{ route('admin.empresa.edit',$empresa->rut_empresa) }}">Editar</a>





        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </form>
</div>


 @endsection
