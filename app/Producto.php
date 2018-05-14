<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
  protected $table = "productos";
  protected $fillable = ['name','imagen','descripcion','precio','cantidad'];

  public function order_item()
     {
         return $this->hasOne('App\OrderItem');
     }
}
