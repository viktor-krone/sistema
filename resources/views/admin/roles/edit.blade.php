@extends('plantilla.admin')


@section('titulo', 'Editar Rol')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.roles.index')}}">Roles</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection

@section('contenido')



<div id="apirole">
    <form action="{{ route('admin.roles.update',$model->id)}}" method="POST">
      @csrf
      @method('PUT')



      <span style="display:none;" id="editar">{{ $editar }}</span>
      <span style="display:none;" id="nombretemp">{{ $model->name }}</span>
      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Administración de Roles</h3>

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
                        @blur="getRol"
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

                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <div class="form-group">
                                <label class="control-label">Permisos :</label>
                                <select name="permission_id[]" id="permission_id" class="form-control select2"  multiple='multiple'>
                                    <option value="">Seleccione una opción...</option>
                                    @foreach($permissions as $index => $name )
                                      <option value="{{ $index }}" @if(in_array($index, $permission_id)){{'selected'}}@endif>{{ $name }}</option>
                                    @endforeach
                                </select>


                            </div>
                        </div>
                    </div>


        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            <a class="btn btn-danger" href="{{ route('cancelar','admin.roles.index') }}">Cancelar</a>
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
