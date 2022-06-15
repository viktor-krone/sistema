@extends('plantilla.admin')


@section('titulo', 'Administración de roles')

@section('breadcrumb')
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')



<!-- DataTales Example -->
<div class="card shadow mb-4">
  <div class="card-header py-3">
    <div class="row col-12">
      <div class="col-6">
        <h6 class="m-0 font-weight-bold text-primary btn-icon-split align-bottom">Lista de Roles</h6>
      </div>
      <div class="col-6">
          @can('crear-roles')
        <a href="{{ route('admin.roles.create') }}" class="btn btn-success btn-icon-split float-right">
          <span class="icon text-white-50">
            <i class="fas fa-plus"></i>
          </span>
          <span class="text">Nuevo Rol</span>
        </a>
        @endcan

      </div>
    </div>
  </div>

  <div class="card-body">
    <div>
      <table id="datatable-responsive" class="table table-striped  dt-responsive">
        <thead>
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th>Código</th>
            <th>Descripción</th>
            <th>Acciones</th>
          </tr>
        </thead>

        <tbody>
            @foreach ($roles as $index => $item)

                @if($item->name == 'super-administrador')

                @else
                    <tr>
                      <td>{{$index + 1}}</td>
                      <td>{{ $item->name }}</td>
                      <td>{{ $item->display_name }}</td>
                      <td>{{ $item->description }}</td>
                      <td class="d-flex justify-content-center">
                        @can('editar-roles')
                            <a href="{{ route('admin.roles.edit', ['role' => $item->id]) }}" class="btn btn-info btn-circle btn-sm" title="Editar" style="margin:1px">
                                <span class="icon">
                                  <i class="fas fa-pen-alt"></i>
                                </span>
                            </a>
                        @endcan
                        @can('eliminar-roles')
                            <a href="" class="btn btn-danger btn-circle btn-sm" title="Eliminar" style="margin:1px">
                                <span class="icon">
                                    <i class="fas fa-trash"></i>
                                </span>
                            </a>
                        @endcan
                      </td>
                    </tr>
                @endif

            @endforeach
        </tbody>
      </table>

    </div>
  </div>
</div>

@stop
