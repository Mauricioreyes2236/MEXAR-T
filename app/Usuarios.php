<?php

namespace App;

use App\Transformer\UsuariosTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Usuarios extends Model
{
    use SoftDeletes;

    public $transformer = UsuariosTransformer::class;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_u',
        'ap_u',
        'am_u',
        'telefono',
        'direccion',
        'email'
    ];
}
