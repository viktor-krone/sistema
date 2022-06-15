<?php

namespace App\Exports;

use App\Cliente;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ClientesExport implements FromView
{
    /**
    * @return \Illuminate\Support\FromView
    */
    public function view(): View
    {
        return view('export.clientes', [
            'clientes' => Cliente::all()
        ]);
    }
}
