<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InformacionBancariaModel extends Model
{
    use HasFactory;
    public $table ="InformacionBancaria";
    public $timestamps = false;
    protected $primaryKey = "ID";
    protected $fillable = [
        'Banco' ,
        'TipoCuenta' ,
        'Cuenta' ,
        'Ciudad' ,
        'Departamento' ,
        'Pais' ,
        'Cliente_id'
    ];
}
