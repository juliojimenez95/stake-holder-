<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class actividad_economicaModel extends Model
{
    use HasFactory;
    public $table ="ACTIVIDAD_ECONOMICA";
    public $timestamps = false;
    protected $primaryKey = "Actividad";
    protected $fillable = [
        'CREE'
    ];
}
