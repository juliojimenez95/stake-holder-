<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartamentoModel extends Model
{
    use HasFactory;
    public $table ="DEPARTAMENTOS";
    public $timestamps = false;
    protected $primaryKey = "ID";
    protected $fillable = [
        'Departamento',
        'ID_Pais'
    ];
}
