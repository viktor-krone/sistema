<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {
        /*$cat = new Product();
        $cat->nombre        ='Mujer';
        $cat->slug          ='mujer';
        $cat->descripcion   ='Ropa de Mujer';
        $cat->save();
        return $cat;
        */

        //return Product::all();
        return Product::with('images')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->get();
    }


    public function show($slug)
    {
        $producto = Product::where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->first();

        if ($producto) {
            return 'Slug existe';
        }
        else {
            return 'Slug Disponible';
        }

    }


    public function eliminarimagen($id)
    {

        //return "se va a eliminar el registro ".$id;
        $image = Image::find($id);
        $archivo = substr($image->url,1);
        $eliminar = File::delete($archivo);
        $image->delete();

        return "eliminado id:".$id. ' '.$eliminar;
    }

    public function productosMasVendidos(){

    }







}
