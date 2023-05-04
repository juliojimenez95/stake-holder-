<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaisModel extends Model
{
    use HasFactory;
    public $table ="PAISES";
    public $timestamps = false;
   // protected $primaryKey = "ID";
    protected $fillable = [

        'ID',
        'Pais'

    ];
}
