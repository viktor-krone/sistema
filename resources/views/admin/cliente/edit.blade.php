@extends('plantilla.admin')


@section('titulo', 'Editar Cliente')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.cliente.index')}}">Cliente</a></li>
  <li class="breadcrumb-item active">@yield('titulo')</li>
@endsection


@section('estilos')
  <!-- Select2 -->
 <link rel="stylesheet" href="/adminlte/plugins/select2/css/select2.min.css">
 <link rel="stylesheet" href="/adminlte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css">
<!-- Ekko Lightbox -->
<link rel="stylesheet" href="/adminlte/plugins/ekko-lightbox/ekko-lightbox.css">
@endsection

@section('scripts')

 <!-- Select2 -->
<script src="/adminlte/plugins/select2/js/select2.full.min.js"></script>

<script src="/adminlte/ckeditor/ckeditor.js"></script>

<!-- Ekko Lightbox -->
<script src="/adminlte/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script>

  window.data = {

    editar:'Si',

    datos: {
        "rut": "{{ $cliente->rut }}",
        "razon": "{{ $cliente->razon }}",
        "email": "{{ $cliente->email }}"
    }
  }





  $(function () {
    //Initialize Select2 Elements
    $('#category_id').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });



    //uso de lightbox
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });








  });

</script>

@endsection


@section('contenido')


<div id="apicliente">




<form action="{{ route('admin.cliente.update',$cliente->id) }}" method="POST" enctype="multipart/form-data" >
@csrf
@method('PUT')

<!-- Main content -->
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->


        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Datos del Cliente</h3>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">

                            <label>Rut</label>
                            <input class="form-control" type="text" id="rut" name="rut" value="{{ $cliente->rut }}" readonly>

                            <label>Razon</label>
                            <input class="form-control" type="text" id="razon" name="razon" value="{{ $cliente->razon }}">

                            <label>Email</label>
                            <input class="form-control" type="text" id="email" name="email" value="{{ $cliente->email }}">

                        </div>
                        <!-- /.form-group -->

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">

                            <label>Giro</label>
                            <input class="form-control" type="text" id="giro" name="giro" value="{{ $cliente->giro }}">

                            <label>Fantasia</label>
                            <input class="form-control" type="text" id="fantasia" name="fantasia" value="{{ $cliente->fantasia }}" >

                            <label>web</label>
                            <input class="form-control" type="text" id="web" name="web" value="{{ $cliente->web }}" >

                        </div>
                        <!-- /.form-group -->

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->


            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
        </div>
        <!-- /.card -->



        <div class="card card-success">
            <div class="card-header">
                <h3 class="card-title">Sección de Dirección</h3>


            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6">
                        <div class="form-group">

                            <label>Dirección</label>

                            <div class="input-group">
                                <input class="form-control" type="text" id="direccion" name="direccion" value="{{ $cliente->direccion }}">
                            </div>

                        </div>
                        <!-- /.form-group -->

                    </div>
                    <!-- /.col -->



                    <div class="col-md-3">
                        <div class="form-group">

                            <label>Comuna</label>
                            <div class="input-group">
                                <input class="form-control" type="text" id="comuna_id" name="comuna_id" value="{{ $cliente->comuna_id }}">
                            </div>
                        </div>
                        <!-- /.form-group -->
                    </div>
                    <!-- /.col -->

                </div>
                <!-- /.row -->


            </div>
            <!-- /.card-body -->
            <div class="card-footer">

            </div>
        </div>
        <!-- /.card -->











        <div class="card card-danger">
            <div class="card-header">
                <h3 class="card-title">Administración</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">




                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">

                            <a class="btn btn-danger" href="{{ route('cancelar','admin.cliente.index') }}">Cancelar</a>
                            <input type="submit" value="Guardar" class="btn btn-primary">

                        </div>
                        <!-- /.form-group -->

                    </div>
                    <!-- /.col -->





                </div>
                <!-- /.row -->




            </div>



            <!-- /.card-body -->
            <div class="card-footer">

            </div>
        </div>
        <!-- /.card -->






    </div><!-- /.container-fluid -->
</section>
<!-- /.content -->


    </form>
  </div>

 @endsection
