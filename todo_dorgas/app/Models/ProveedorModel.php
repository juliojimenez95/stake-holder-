<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProveedorModel extends Model
{
    use HasFactory;
    public $table ="PROVEEDORES";
    public $timestamps = false;
    protected $primaryKey = "ID";
    protected $fillable = [
        'TipoID',
        'DV',
        'Nombre',
        'Regimen',
        'GranContribuyente',
        'ActividadEconomica',
        'Direccion',
        'Ciudad',
        'Departamento',
        'Pais',
        'Ciudad',
        'tipo_s',
        'Telefono1',
        'Telefono2',
        'Fax',
        'Movil',
        'Mail',
        'FechaIngreso',
        'Contacto',
        'Credito',
        'Cupo',
        'Plazo',
        'Saldo',
        'Enabled'
    ];
}
