<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::middleware('auth:api')->get('/otra', function () {
    $user = Auth::user();
    dd($user);
    return "otra ruta supuestamente protegida";
});

Route::post('/IngresarContactoPagina', 'PaginaController@IngresarContactoPagina')->name('IngresarContactoPagina');

Route::group(['middleware' => 'auth:api'], function () {
    Route::apiResource('cliente','API\ClienteController')->names('api.cliente');

    Route::apiResource('empresa','API\EmpresaController')->names('api.empresa');
    Route::apiResource('category','API\CategoryController')->names('api.category');
    Route::apiResource('bodega','API\BodegaController')->names('api.bodega');
    Route::apiResource('sucursal','API\SucursalController')->names('api.sucursal');
    Route::apiResource('trabajador','API\TrabajadorController')->names('api.trabajador');
    Route::apiResource('cargo','API\CargoController')->names('api.cargo');

    Route::apiResource('permiso','API\PermissionController')->names('api.permiso');
    Route::apiResource('role','API\RoleController')->names('api.rol');
    Route::apiResource('user','API\UserController')->names('api.user');
    Route::apiResource('vendedor','API\VendedorController')->names('api.vendedor');
    Route::apiResource('departamento','API\DepartamentoController')->names('api.departamento');


    Route::apiResource('proveedor','API\ProveedorController')->names('api.proveedor');


    Route::apiResource('product','API\ProductController')->names('api.product');
    Route::apiResource('sku','API\SkuController')->names('api.sku');
    Route::apiResource('image','API\ImageController')->names('api.image');


    Route::delete('/eliminarimagen/{id}','API\ProductController@eliminarimagen')->name('api.eliminarimagen');

    Route::post('/cotizacion', 'API\DocumentoController@cotizacion')->name('cotizacion');
    Route::put('/actualizarCotizacion', 'API\DocumentoController@updateEstadoCotizacion')->name('actualizarCotizacion');

    Route::post('/notaventa', 'API\DocumentoController@notaventa')->name('notaventa');

    Route::post('/factura', 'API\DocumentoController@factura')->name('factura');

    Route::post('/movimiento', 'API\MovimientoController@movimiento')->name('movimiento');



    Route::get('/autocomplete', 'API\AutocompleteController@autocomplete')->name('autocomplete');
    Route::get('/autocompleteCliente', 'API\AutocompleteController@autocompleteCliente')->name('autocompleteCliente');
    Route::get('/autocompleteProducto', 'API\AutocompleteController@autocompleteProducto')->name('autocompleteProducto');
    Route::get('/autocompleteSku', 'API\AutocompleteController@autocompleteSku')->name('autocompleteSku');
});
