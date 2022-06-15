<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    protected $table = 'stocks';
    protected $fillable = ['product_id', 'bodega_id', 'cantidad'];

    public function product(){
    	return $this->belongsTo('App\Product');
    }

    public function bodega(){
    	return $this->belongsTo('App\Bodega');
    }




    public function actualizar_stock($detalles, $bodega_id, $tipo_movimiento) {
        foreach ($detalles as $key => $d) {
            // code...
            $stock_anterior = 0;
            $stock = Stock::where('bodega_id', $bodega_id)
                ->where('product_id', $d->producto_id)
                ->get();

            if( !empty($stock[0]->cantidad) ){
                $stock_anterior = $stock[0]->cantidad;
            }else{

            }

            if ($tipo_movimiento == 1) {
                $nuevo_stock = $stock_anterior + $d->cantidad;
            }else{
                $nuevo_stock = $stock_anterior - $d->cantidad;
            }



/*            Stock::where('bodega_id', $bodega_id)
                ->where('producto_id', $d->producto_id)
                ->update(['cantidad' => $nuevo_stock]);
*/
            // If there's a flight from Oakland to San Diego, set the price to $99.
            // If no matching model exists, create one.
            Stock::updateOrCreate(
                ['product_id' => $d->producto_id, 'bodega_id' => $bodega_id],
                ['cantidad' => $nuevo_stock]
            );

        }
    }

    public static function stock_bodegas($producto) {
        $stock = Stock::where('product_id', $producto)
            ->get();

        return $stock;
    }

}
