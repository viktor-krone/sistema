<?php

namespace App\Exports;

use App\Vendedor;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class VendedoresExport implements FromView
{
    /**
    * @return \Illuminate\Support\FromView
    */
    public function view(): View
    {
        return view('export.vendedores', [
            'vendedores' => Vendedor::all()
        ]);
    }
}
