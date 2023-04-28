<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactoModel extends Model
{
    use HasFactory;
    public $table ="Contacto";
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
        'Telefono',
        'Cliente_id'  ,
    ];
}
