<?php

namespace App;

use App\Transformer\TalleresTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Talleres extends Model
{
    use SoftDeletes;

    public $transformer = TalleresTransformer::class;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_t',
        'direccion',
        'telefono',
        'id_artesano'
    ];
}
