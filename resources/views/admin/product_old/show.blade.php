@extends('plantilla.admin')


@section('titulo', 'Ver Producto')

@section('breadcrumb')
  <li class="breadcrumb-item"><a href="{{route('admin.product.index')}}">Productos</a></li>
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
      "nombre":"{{$producto->nombre}}",
      "precioanterior": "{{$producto->precio_anterior}}",
      "porcentajededescuento":"{{$producto->porcentaje_descuento}}"
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


<div id="apiproduct">




<form action="{{ route('admin.product.update',$producto->id) }}" method="POST" enctype="multipart/form-data" >
@csrf
@method('PUT')

  <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->


        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Datos del producto</h3>


          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">

                  <label>Nombre</label>
                  <input
                  readonly
                   v-model="nombre"
                   @blur="getProduct"
                   @focus = "div_aparecer= false"

                  class="form-control" type="text" id="nombre" name="nombre">

                  <label>Slug</label>
                  <input
                  readonly
                  v-model="generarSLug"

                  class="form-control" type="text" id="slug" name="slug" >

                  <div v-if="div_aparecer" v-bind:class="div_clase_slug">
                    @{{ div_mensajeslug }}
                 </div>
                 <br v-if="div_aparecer">

                </div>
                <!-- /.form-group -->

              </div>
              <!-- /.col -->
              <div class="col-md-6">
                <div class="form-group">




                  <label>Categoria</label>
                  <select disabled name="category_id" id="category_id" class="form-control " style="width: 100%;">
                    @foreach($categorias as $categoria)

                     @if ($categoria->nombre == $producto->category->nombre)
                        <option value="{{ $categoria->id }}" selected="selected">{{ $categoria->nombre }}</option>
                     @else
                        <option value="{{ $categoria->id }}">{{ $categoria->nombre }}</option>
                     @endif
                    @endforeach


                  </select>

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
              <div class="col-md-6">
                <div class="form-group">

                </div>
                <!-- /.form-group -->

              </div>
              <!-- /.col -->
              <div class="col-sm-6">
                    <!-- checkbox -->
                    <div class="form-group clearfix">
                      <div class="custom-control custom-checkbox">
                        <input disabled type="checkbox" class="custom-control-input" id="activo" name="activo"

                            @if($producto->activo=='Si')
                                checked
                            @endif

                        >
                        <label class="custom-control-label" for="activo">Activo</label>
                     </div>

                    </div>

                  </div>



       </div>
            <!-- /.row -->




       <div class="row">
              <div class="col-md-12">
                <div class="form-group">

                   <a class="btn btn-danger" href="{{ route('cancelar','admin.product.index') }}">Cancelar</a>

                   <a class="btn btn-outline-success" href="{{ route('admin.product.edit',$producto->slug) }}">Editar</a>

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
