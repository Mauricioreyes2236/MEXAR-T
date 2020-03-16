<?php

namespace App;

use App\Transformer\VentasTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Ventas extends Model
{
    use SoftDeletes;

    public $transformer = VentasTransformer::class;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'id_usuario',
        'id_artesano',
        'id_producto'
    ];
}
