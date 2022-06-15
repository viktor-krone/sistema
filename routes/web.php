<?php
//use App\Product;
use App\Category;
use App\Image;


//para hacer las pruebas con las imagenes.
Route::get('/prueba', function () {
    //20 eliminar todas las imagenes
    $product = Product::with('images','category')->orderby('id','desc')->get();
    return $product;
});

/*Route::get('/test', function () {
    throw new Exception('Mi primer error!');
});*/

//mostrar resultados
Route::get('/resultados', function () {
   $image = App\Image::orderBy('id','Desc')->get();
   return  $image;
});

Route::get('/', function () {
    return view('tienda.index');
});

use Spatie\Activitylog\Models\Activity;
Route::get('/log', function () {
    return Activity::all()->last();
});


Auth::routes(
    ['register' => false]
);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@plantillaAdmin')->name('admin');



/*Route::get('/admin', function () {
    return view('plantilla.admin');
})->name('admin');*/

Route::get('/admin/log', 'Admin\AdminEmpresaController@log')->name('admin.log');

Route::resource('admin/empresa', 'Admin\AdminEmpresaController')->names('admin.empresa');
Route::resource('admin/category', 'Admin\AdminCategoryController')->names('admin.category');
Route::resource('admin/trabajador', 'Admin\AdminTrabajadorController')->names('admin.trabajador');

//inventario
Route::get('/admin/movimiento/create', 'Admin\AdminMovimientoController@create')
    ->name('admin.movimiento.create');
Route::get('/admin/informe/stock', 'Admin\AdminInventarioController@informeStock')
    ->name('admin.informe.stock');
Route::get('/admin/informe/stockBodega/{producto} ', 'Admin\AdminInventarioController@informeStockBodega')
    ->name('admin.informe.stockBodega');
Route::resource('admin/movimiento', 'Admin\AdminMovimientoController')
    ->names('admin.movimiento');



Route::get('/admin/cotizacion/create', 'Admin\AdminDocumentoController@create')
    ->name('admin.cotizacion.create');
Route::resource('admin/cotizacion', 'Admin\AdminDocumentoController')
    ->names('admin.cotizacion');


Route::get('/admin/notaventa/create', 'Admin\AdminDocNotaVentaController@create')
    ->name('admin.notaventa.create');
Route::resource('admin/notaventa', 'Admin\AdminDocNotaVentaController')
    ->names('admin.notaventa');

Route::get('/admin/documentos', 'Admin\AdminDocumentoController@listaDocTributarios')
    ->name('admin.documentos.listar');

Route::get('/admin/factura/create', 'Admin\AdminDocumentoController@crea_factura')
    ->name('admin.documentos.crea_factura');

//muestra formulario de trabajadores con dias de ausencia
Route::get('/admin/vacacion', 'Admin\AdminVacacionController@index')->name('admin.vacacion');

Route::get('/admin/vacacion/{trabajador_id}', 'Admin\AdminVacacionController@create')->name('admin.vacacion.create');
Route::post('/admin/vacacion/store', 'Admin\AdminVacacionController@store')->name('admin.vacacion.store');

//anticipo
Route::get('/admin/anticipo', 'Admin\AdminAnticipoController@index')->name('admin.anticipo');

Route::get('/admin/anticipo/{trabajador_id}', 'Admin\AdminAnticipoController@create')->name('admin.anticipo.create');
Route::post('/admin/anticipo/store', 'Admin\AdminAnticipoController@store')->name('admin.anticipo.store');



Route::resource('admin/roles', 'Admin\AdminRoleController', ['except' => ['show']])->names('admin.roles');
Route::resource('admin/permissions', 'Admin\AdminPermissionController', ['except' => ['show']])->names('admin.permissions');

//remuneraciones
Route::resource('admin/departamento', 'Admin\AdminDepartamentoController')->names('admin.departamento');
Route::resource('admin/haber', 'Admin\AdminHaberController')->names('admin.haber');

//Route::get('/admin/cotizacion/create', 'Admin\AdminDocumentoController@create')
//    ->name('admin.cotizacion.create');
Route::resource('admin/liquidacion', 'Admin\AdminLiquidacionController')
    ->names('admin.liquidacion');




Route::resource('admin/bodega', 'Admin\AdminBodegaController')->names('admin.bodega');
Route::resource('admin/sucursal', 'Admin\AdminSucursalController')->names('admin.sucursal');
Route::resource('admin/cargo', 'Admin\AdminCargoController')->names('admin.cargo');
Route::resource('admin/user', 'Admin\AdminUserController')->names('admin.user');


Route::resource('admin/vendedor', 'Admin\AdminVendedorController')->names('admin.vendedor');

Route::resource('admin/cliente', 'Admin\AdminClienteController')->names('admin.cliente');
Route::resource('admin/proveedor', 'Admin\AdminProveedorController')->names('admin.proveedor');
Route::resource('admin/product', 'Admin\AdminProductController')->names('admin.product');
Route::resource('admin/sku', 'Admin\AdminSkuController')->names('admin.sku');


Route::get('cancelar/{ruta}', function($ruta) {
    return redirect()->route($ruta)->with('cancelar','Acción Cancelada!');
})->name('cancelar');


//exportadores
Route::get('admin/clientes/export', 'Admin\AdminClienteController@export');
Route::get('admin/usuarios/export', 'Admin\AdminUserController@export');
Route::get('admin/vendedores/export/', 'Admin\AdminVendedorController@export');
