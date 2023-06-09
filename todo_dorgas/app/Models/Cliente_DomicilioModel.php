<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente_DomicilioModel extends Model
{
    use HasFactory;
    public $table ="CLIENTES_DOMICILIOS";
    public $timestamps = false;
    protected $fillable = [
        "Telefono",
        'ID_Cliente'
    ];
}
