<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AutorizacionModel extends Model
{
    use HasFactory;
    public $table ="Autorizacion";
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $fillable = [
        'Autorizacion_datos' ,
        'Autorizacion_riesgos' ,
        'Declaracion_fondos' ,
        'Cumplimiento_etico' ,
        'Cumplimiento_anticorrupcion' ,
        'user_id' ,
    ];
}
