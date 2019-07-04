<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Provincia extends Model
{
    protected $fillable = [
        'provincia, pais_id, fav'
    ];

    public $table = "provincias";

    public function pais()
    {
        return $this->belongsTo('App\Pais');
    }
}
