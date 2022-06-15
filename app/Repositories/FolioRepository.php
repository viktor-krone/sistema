<?php

namespace App\Repositories;

use App\Folio;

class FolioRepository {

    private $model;

    public function __construct(){
        $this->model = new Folio();
    }

    public function getFolio($tipo) {

        $folio = $this->model->where('tipo_id', $tipo)
            ->where('empresa_id', auth()->user()->empresa_id)
            ->value('folio');

        $folio++;

        $this->model
        ->updateOrInsert(
            [
                'empresa_id' => auth()->user()->empresa_id,
                'tipo_id' => $tipo
            ],
            ['folio' => $folio]
        );

        return $folio;
    }
}
