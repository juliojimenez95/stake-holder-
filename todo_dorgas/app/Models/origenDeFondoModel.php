<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class origenDeFondoModel extends Model
{
    use HasFactory;
    public $table ="origenDeFondos";
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $fillable = [
        'archivo',
        'user_id'

    ];
}
