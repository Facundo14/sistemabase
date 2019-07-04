<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Date\Date;

class Empresa extends Model
{
    protected $fillable = [
        'nombre', 'leyenda', 'leyenda_factura', 'cuit', 'direccion', 'telefono', 'email', 'responsable', 'activo', 'user_id'
    ];

    public function getCreatedAtAttribute($date){
         return new Date($date);
    }
}
