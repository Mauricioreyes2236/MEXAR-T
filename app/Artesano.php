<?php

namespace App;

use App\Transformer\ArtesanoTransformer;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artesano extends Model
{
    use SoftDeletes;

    public $transformer = ArtesanoTransformer::class;
    protected $dates = ['deleted_at'];

    protected $fillable = [
        'nombre_a',
        'ap_a',
        'am_a',
        'edad',
        'telefono',
        'email'
    ];
}
