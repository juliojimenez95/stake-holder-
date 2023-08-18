<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionBancariaModel extends Model
{
    use HasFactory;
    public $table ="InformacionBancaria";
    public $timestamps = true;
    protected $primaryKey = "ID";
    protected $fillable = [
        'Banco' ,
        'TipoCuenta' ,
        'Cuenta' ,
        'Ciudad' ,
        'Departamento' ,
        'Pais' ,
        'Banco2' ,
        'TipoCuenta2' ,
        'Cuenta2' ,
        'Ciudad2' ,
        'Departamento2' ,
        'Pais2' ,
        'user_id'
    ];
}
