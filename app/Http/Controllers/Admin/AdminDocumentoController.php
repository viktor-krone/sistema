<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Documento;
use App\Vendedor;
use App\Product;
use App\Repositories\DocumentoRepository;

class AdminDocumentoController extends Controller
{

    //private $_client;
    //private $_product;
    private $_documento;
    public function __construct(
        //ClientRepository $client,
        //ProductRepository $product,
        DocumentoRepository $documento
    ) {
        $this->middleware('auth');
        //$this->_client = $client;
        //$this->_product = $product;
        $this->_documento = $documento;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $cotizaciones = $this->_documento->getCotizacion();

        return view(
            'admin.cotizacion.index', [
                'model' => $cotizaciones
            ]
        );
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function listaDocTributarios(Request $request)
    {

        $doc_tributarios = $this->_documento->getDocTributarios();

        return view(
            'admin.documentos.listar', [
                'model' => $doc_tributarios
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
        $vendedores = Vendedor::where('empresa_id', auth()->user()->empresa_id)
            ->get();


        return view('admin.cotizacion.create',compact('vendedores') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function crea_factura()
    {
        $vendedores = Vendedor::where('empresa_id', auth()->user()->empresa_id)
            ->get();


        return view('admin.documentos.crea_factura',compact('vendedores') );
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
        $documento = $this->_documento->get($id);

        return view('admin.cotizacion.show', [
                'model' => $documento
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
