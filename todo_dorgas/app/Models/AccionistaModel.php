<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccionistaModel extends Model
{
    use HasFactory;
    public $table ="Accionistas";
    public $timestamps = false;
    protected $primaryKey = "ID";
    protected $fillable = [
        'Nombres' ,
        'TipoNit'  ,
        'Nit'  ,
        'Participacion'  ,
        'Nacionalidad'  ,
        'PEP',
        'user_id' ,
    ];
}
