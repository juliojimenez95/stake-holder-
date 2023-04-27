<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DomicilioModel extends Model
{
    use HasFactory;
    public $table ="DOMICILIOS";
    public $timestamps = false;
    protected $fillable = [
        'Direccion',
        'Telefono',
        'Pais',
        'Ciudad',
        'Departamento',
        'Domicilio',
        'ID_Ruta',
        'CodigoPostal',
        'Enabled'
    ];
}
