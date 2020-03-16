<?php

namespace App;

use App\Transformer\ProductoTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    public $transformer = ProductoTransformer::class;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_p',
        'costo',
        'descripcion',
        'imagen'
    ];
}
