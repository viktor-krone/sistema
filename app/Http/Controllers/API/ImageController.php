<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Product;
use App\Image;
use Illuminate\Support\Facades\File;

class ImageController extends Controller
{
    public function index()
    {
        /*$cat = new Product();
        $cat->nombre        ='Mujer';
        $cat->slug          ='mujer';
        $cat->descripcion   ='Ropa de Mujer';
        $cat->save();
        return $cat;
        */

        return Image::all();
    }


    public function show($slug)
    {
        //

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








}
