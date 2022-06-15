<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Bodega;
use App\Product;
use App\Stock;

class AdminInventarioController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informeStock(Request $request)
    {

        $productos = Product::where('empresa_id', auth()->user()->empresa_id)
            ->get();
        foreach ($productos as $key => $p) {
            // code...
            $p->stock_actual = $p->stocks()->sum('cantidad');

        }

        return view(
            'admin.inventario.informeStock', [
                'productos' => $productos
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function informeStockBodega(Request $request, $producto)
    {

        $stock = Stock::stock_bodegas($producto);

        return view(
            'admin.inventario.informeStockBodega', [
                'stock' => $stock
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodegas = Bodega::where('empresa_id', auth()->user()->empresa_id)
            ->get();

        return view('admin.movimiento.create', compact('bodegas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movimiento = $this->_movimiento->get($id);

        return view('admin.movimiento.show', [
                'model' => $movimiento
            ]
        );

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function edit($slug)
    {
        $cat= Category::where('slug',$slug)->firstOrFail();
        $editar = 'Si';

        return view('admin.category.edit',compact('cat','editar'));
    }*/

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function update(Request $request, $id)
    {
        $cat= Category::findOrFail($id);

        $request->validate([
            'nombre' => 'required|max:50|unique:categories,nombre,'.$cat->id,
            'slug' => 'required|max:50|unique:categories,slug,'.$cat->id,

        ]);

        $cat->fill($request->all())->save();

        //return $cat;

        return redirect()->route('admin.category.index')->with('datos','Registro actualizado correctamente!');
    }*/

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    /*public function destroy($id)
    {
        $cat= Category::findOrFail($id);
        $cat->delete();
        return redirect()->route('admin.category.index')->with('datos','Registro eliminado correctamente!');


    }*/
}
