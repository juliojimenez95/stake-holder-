<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionFinancieraModel extends Model
{
    use HasFactory;
    public $table ="InformacionFinanciera";
    public $timestamps = true;
    protected $primaryKey = "ID";
    protected $fillable = [
        'Activo',
        'Pasivo',
        'Patrimonio',
        'IngresosTotales',
        'EgresosTotales',
        'CantidadPersonas' ,
        'user_id'
    ];
}
