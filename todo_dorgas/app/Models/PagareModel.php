<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PagareModel extends Model
{
    use HasFactory;
    public $table ="pagare";
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $fillable = [
        'pagare  ',
        'archivo',
        'user_id'

    ];
}
