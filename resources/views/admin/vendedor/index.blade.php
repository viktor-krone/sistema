@extends('plantilla.admin')

@section('titulo', 'Administración de Vendedores')

@section('breadcrumb')
    <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('contenido')

    <div id="confirmareliminar" class="row">

        <span style="display:none;" id="urlbase">{{route('admin.vendedor.index')}}</span>
        @include('custom.modal_eliminar')
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sección de vendedores</h3>

                    <div class="card-tools">
                        <form>
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="nombre" class="form-control float-right"
                                placeholder="Buscar"
                                value="{{ request()->get('nombre') }}"
                                >

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0" style="height: 300px;">
                    @can('crear-vendedores')
                    <a class=" m-2 float-right btn btn-primary" href="{{ route('admin.vendedor.create') }}">Crear</a>
                    @endcan
                    <table class="table table-head-fixed">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Rut</th>
                                <th>Nombre</th>
                                <th>Comision</th>
                                <th>Fecha creación</th>
                                <th>Fecha modificación</th>
                                <th colspan="3"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($vendedores as $vendedor)
                            <tr>
                                <td> {{ $vendedor->id }} </td>
                                <td> {{ $vendedor->rut }} </td>
                                <td> {{ $vendedor->nombre }} </td>
                                <td> {{ $vendedor->comision }} </td>
                                <td> {{ $vendedor->created_at }} </td>
                                <td> {{ $vendedor->updated_at }} </td>

                                <td>
                                    @can('ver-vendedores')
                                    <a class="btn btn-default"
                                    href="{{ route('admin.vendedor.show',$vendedor->id) }}">Ver</a>
                                    @endcan
                                </td>

                                <td>
                                    @can('editar-vendedores')
                                    <a class="btn btn-info"
                                    href="{{ route('admin.vendedor.edit',$vendedor->id) }}">Editar</a>
                                    @endcan
                                </td>

                                <td>
                                    @can('eliminar-vendedores')
                                    <a class="btn btn-danger"
                                    href="{{ route('admin.vendedor.index') }}"
                                    v-on:click.prevent="deseas_eliminar({{ $vendedor->id}})"
                                    >Eliminar</a>
                                    @endcan
                                </td>

                            </tr>
                            @endforeach


                        </tbody>
                    </table>
                    {{ $vendedores->appends($_GET)->links() }}
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
<!-- /.row -->



@endsection
