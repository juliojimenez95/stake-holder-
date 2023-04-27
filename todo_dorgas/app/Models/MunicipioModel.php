<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MunicipioModel extends Model
{
    use HasFactory;
    public $table ="MUNICIPIOS";
    public $timestamps = false;
    protected $primaryKey = "ID_Municipio";
    protected $fillable = [
        'Municipio  ',
        'Departamento',
        'Codigo'

    ];
}
