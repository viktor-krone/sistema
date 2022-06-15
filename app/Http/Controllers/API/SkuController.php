<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sku;
use App\Image;
use Illuminate\Support\Facades\File;

class SkuController extends Controller
{
    public function __construct() {
        $this->middleware('auth:api');
    }

    public function index()
    {

        //return Sku::all();
        return Sku::with('images')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->get();;
    }


    public function show($slug)
    {
        $sku = Sku::where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->first();

        if ($sku) {
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
