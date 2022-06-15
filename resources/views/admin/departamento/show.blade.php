@extends('plantilla.admin')


@section('titulo', 'Ver Departamento')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.departamento.index')}}">Departamentos</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apidepartamento">
    <form >
      @csrf





      <span style="display:none;" id="editar">{{ $editar }}</span>
      <span style="display:none;" id="nombretemp">{{ $departamento->nombre}}</span>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administración de Departamentos</h3>

          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
              <i class="fas fa-minus"></i></button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fas fa-times"></i></button>
          </div>
        </div>
        <div class="card-body">



                    <div class="form-group">
                        <label for="nombre">Nombre</label>

                        <input v-model="nombre"

                            @blur="getDepartamento"
                            @focus = "div_aparecer= false"


                        class="form-control" type="text" name="nombre" id="nombre" value="{{ $departamento->nombre }} " readonly>



                        <label for="slug">Slug</label>

                        <input  v-model="generarSLug"  class="form-control" type="text" name="slug" id="slug" value="{{ $departamento->slug }} " readonly>



                        <label for="descripcion">Descripción</label>

                        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="5" readonly>  {{ $departamento->descripcion }}  </textarea>

                    </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('cancelar','admin.departamento.index') }}">Cancelar</a>

            <a class="btn btn-outline-success float-right" href="{{ route('admin.departamento.edit',$departamento->slug) }}">Editar</a>





        </div>
        <!-- /.card-footer-->
      </div>
      <!-- /.card -->
    </form>
</div>


 @endsection
