<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RepresentanteLegalModel extends Model
{
    use HasFactory;
    public $table ="RepresentanteLegal";
    public $timestamps = false;
    protected $primaryKey = "ID";
    protected $fillable = [
        'Nombre1' ,
        'Nombre2'  ,
        'Apellido1' ,
        'Apellido2'  ,
        'TipoNit' ,
        'Nit' ,
        'Cargo' ,
        'Email' ,
        'Telefono' ,
        'ManejoRP'  ,
        'Observacion1'  ,
        'EjercidoPPOP'  ,
        'Observacion2'  ,
        'Reconocimiento'  ,
        'Observacion3'  ,
        'VincuPExpuesta'  ,
        'Observacion4'  ,
        'ObligacionTE'  ,
        'Observacion5',
        'OrganizacionI'  ,
        'Observacion6'  ,
        'ObligacionP',
        'Observacion7'  ,
        'user_id'  ,
    ];
}
