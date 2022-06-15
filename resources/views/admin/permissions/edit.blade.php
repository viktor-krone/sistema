@extends('plantilla.admin')


@section('titulo', 'Editar Permiso')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.permissions.index')}}">Permisos</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apipermiso">
    <form action="{{ route('admin.permissions.update',$model->id)}}" method="POST">
      @csrf
      @method('PUT')



      <span style="display:none;" id="editar">{{ $editar }}</span>
      <span style="display:none;" id="nombretemp">{{ $model->name }}</span>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administración de Permisos</h3>

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

                        <input v-model="display_name"
                        @blur="getPermiso"
                        @focus = "div_aparecer= false"
                        class="form-control" type="text" name="display_name" id="display_name" value="{{ $model->display_name }}">

                        <label for="slug">Codigo Interno</label>
                        <input readonly
                        v-model="generarSLug"
                        class="form-control" type="text" name="name" id="name" value="{{ $model->name }} ">

                        <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                           @{{ div_mensajeslug }}
                        </div>
                        <br v-if="div_aparecer">
                        <label for="descripcion">Descripción</label>
                        <textarea class="form-control" name="description" id="description" cols="30" rows="5">  {{ $model->description }}  </textarea>

                    </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('cancelar','admin.permissions.index') }}">Cancelar</a>
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
