<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Validator;

class Producto extends Model
{
    //
    protected $fillable =[
        'nombre',
        'descripcion',
        'cantidad',
        'precio',
        'codigo'
    ];

    public static function validar($datos)
    {
        return Validator::make(
            $datos,
            [
                'nombre' => 'required|string',
                'descripcion' => 'string',
                'cantidad' => 'required|integer',
                'precio' => 'required|numeric',
                'codigo' => 'required|string'
            ]
        );
    }

    
}
