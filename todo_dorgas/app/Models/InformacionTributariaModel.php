<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionTributariaModel extends Model
{
    use HasFactory;
    public $table ="InformacionTributaria";
    public $timestamps = false;
    protected $primaryKey = "ID";
    protected $fillable = [
        'ResponsableImpuesto' ,
        'SujetoRetencion' ,
        'Declarar' ,
        'RST' ,
        'Estampillas' ,
        'Observacion1',
        'GContribuyente' ,
        'Observacion2',
        'AutorretenedorF' ,
        'observacion3',
        'AutorretenedorICA' ,
        'observacion4',
        'Email' ,
        'Cliente_id'  ,
    ];
}
