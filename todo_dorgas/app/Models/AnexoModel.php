<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AnexoModel extends Model
{
    use HasFactory;
    public $table ="Anexos";
    public $timestamps = false;
    protected $primaryKey = "ID";
    protected $fillable = [
        'Camara_comercio' ,
        'Rut' ,
        'Cc_representante' ,
        'Estados_financieros' ,
        'Referencia_comercial' ,
        'ICA' ,
        'Contribuyente' ,
        'Autoretenedor_f' ,
        'Autoretenedor_ICA' ,
        'Brochure' ,
        'Certificado_bancario' ,
        'SG_SST' ,
        'SS',
        'user_id' ,
    ];
}
