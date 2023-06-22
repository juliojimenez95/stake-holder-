<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
    use HasFactory;
    public $table ="CLIENTES";
    public $timestamps = false;
    protected $primaryKey = "ID";
    protected $fillable = [
        'Nombre  ',
        'Nit',
        'TipoNit',
        'DV',
        'tipo_s',
        'Regimen',
        'Movil',
        'BirthDay',
        'BirthMonth',
        'Mail',
        'pagina_web',
        'tamano',
        'Direccion_pj',
        'FechaIngreso',
        'Contacto',
        'Credito',
        'Referencia',
        'ReferenciaTelefono1',
        'ReferenciaTelefono2',
        'Cupo',
        'Plazo',
        'Saldo',
        'Bloqueo',
        'Medio',
        'Observaciones',
        'Institucional',
        'Retenedor',
        'RetenedorModo',
        'Notificacion',
        'Enabled',
        'Natural',
        'Nombre1',
        'Nombre2',
        'Apellido1',
        'Apellido2',
        'ActividadEconomica',
        'GranContribuyente',
        'URL',
        'Sexo',
        'password'

    ];
}
