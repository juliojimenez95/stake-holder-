<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class personaExpuestaModel extends Model
{
    use HasFactory;
    public $table ="personaExpuesta";
    public $timestamps = false;
    protected $primaryKey = "ID";
    protected $fillable = [
        'Nombres'  ,
        'TipoNit'  ,
        'Nit',
        'Nacionalidad',
        'Cargo'  ,
        'PEP' ,
        'user_id' ,
    ];
}
