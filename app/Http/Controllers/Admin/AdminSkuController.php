<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Sku;
use App\Product;
use App\Category;
use Illuminate\Support\Facades\File;

class AdminSkuController extends Controller
{

    public function __construct() {

        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $nombre = $request->get('nombre');

        $skus = Sku::with('images','category')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->where('slug','like',"%$nombre%")
            ->orderBy('nombre')
            ->paginate(10);

        return view('admin.sku.index',compact('skus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $estados_skus = $this->estados_skus();
        $categorias = Category::where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->get();
        $productos = Product::where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->get();

        return view('admin.sku.create',compact('categorias','estados_skus','productos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'producto_id' => 'required',
            'nombre' => 'required|unique:products,nombre',
            'slug' => 'required|unique:products,slug',
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $urlimagenes = [];
        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
            //dd ($imagenes);
            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/imagenes';
                $imagen->move($ruta , $nombre);
                $urlimagenes[]['url'] = '/imagenes/'.$nombre;
            }
            //return $urlimagenes;
        }

        $sku = new Sku;

        $sku->empresa_id   = auth()->user()->empresa_id;
        $sku->producto_id=             $request->producto_id;
        $sku->nombre=                  $request->nombre;
        $sku->slug=                    $request->slug;
        $sku->cantidad=                $request->cantidad;
        $sku->precio_anterior=         $request->precioanterior;
        $sku->precio_actual=           $request->precioactual;
        $sku->porcentaje_descuento=    $request->porcentajededescuento;
        $sku->descripcion_corta=       $request->descripcion_corta;
        $sku->descripcion_larga=       $request->descripcion_larga;
        $sku->especificaciones=        $request->especificaciones;
        $sku->datos_de_interes=        $request->datos_de_interes;
        $sku->estado=                  $request->estado;


        if ($request->activo) {
            $sku->activo= 'Si';
        }
        else {
            $sku->activo= 'No';
        }



        if ($request->sliderprincipal) {
            $sku->sliderprincipal= 'Si';
        }
        else {
            $sku->sliderprincipal= 'No';
        }


        $sku->save();


        $sku->images()->createMany($urlimagenes);

        //return $prod->images;

        return redirect()->route('admin.sku.index')->with('datos','Registro creado correctamente!');



        //return $request->all();


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $sku = Sku::with('images','category')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->where('slug',$slug)
            ->firstOrFail();

        $categorias = Category::where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->get();

        $estados_skus = $this->estados_skus();

        //dd($estados_skus);

        return view('admin.sku.show',compact('sku','categorias','estados_skus'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($slug)
    {
        $sku = Sku::with('images','category')->where('slug',$slug)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->firstOrFail();

        $categorias = Category::where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->get();
        $productos = Product::where('empresa_id', auth()->user()->empresa_id)
            ->orderBy('nombre')
            ->get();

        $estados_skus = $this->estados_skus();

        //dd($estados_skus);

        return view('admin.sku.edit',compact('sku','categorias','estados_skus','productos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'producto_id' => 'required'.$id,
            'nombre' => 'required|unique:skus,nombre,'.$id,
            'slug' => 'required|unique:skus,slug,'.$id,
            'imagenes.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ]);

        $urlimagenes = [];
        if ($request->hasFile('imagenes')) {
            $imagenes = $request->file('imagenes');
            foreach ($imagenes as $imagen) {
                $nombre = time().'_'.$imagen->getClientOriginalName();
                $ruta = public_path().'/imagenes';
                $imagen->move($ruta , $nombre);
                $urlimagenes[]['url'] = '/imagenes/'.$nombre;
            }
        }



        $sku = Sku::findOrFail($id);

        $sku->empresa_id   = auth()->user()->empresa_id;
        $sku->producto_id=             $request->producto_id;
        $sku->nombre=                  $request->nombre;
        $sku->slug=                    $request->slug;
        $sku->category_id=             $request->category_id;
        $sku->cantidad=                $request->cantidad;
        $sku->precio_anterior=         $request->precioanterior;
        $sku->precio_actual=           $request->precioactual;
        $sku->porcentaje_descuento=    $request->porcentajededescuento;
        $sku->descripcion_corta=       $request->descripcion_corta;
        $sku->descripcion_larga=       $request->descripcion_larga;
        $sku->especificaciones=        $request->especificaciones;
        $sku->datos_de_interes=        $request->datos_de_interes;
        $sku->estado=                  $request->estado;


        if ($request->activo) {
            $sku->activo= 'Si';
        }
        else {
            $sku->activo= 'No';
        }



        if ($request->sliderprincipal) {
            $sku->sliderprincipal= 'Si';
        }
        else {
            $sku->sliderprincipal= 'No';
        }


        $sku->save();


        $sku->images()->createMany($urlimagenes);

        //return $prod->images;

        return redirect()->route('admin.sku.edit',$sku->slug)->with('datos','Registro actualizado correctamente!');



        //return $request->all();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sku = Sku::with('images')
            ->where('empresa_id', auth()->user()->empresa_id)
            ->findOrFail($id);

        foreach($prod->images as $image) {
            $archivo = substr($image->url,1);
            File::delete($archivo);
            $image->delete();
        }

        //return $prod;
        $prod->delete();
        return redirect()->route('admin.sku.index')->with('datos','Registro eliminado correctamente!');

    }


    public function estados_skus(){


        return [
            '',
            'Nuevo',
            'En Oferta',
            'Popular'
        ];
    }





}
