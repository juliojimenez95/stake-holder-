<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'TBL_USUARIOS_STAKE';

    protected $fillable = [
        'name',
        'email',
        'password',
        'rol',
        'comentario',
        'aprovado',
        'aprovado2',
        'aprovado3',
        'PEP',
        'ManejoRP'  ,
        'Observacion1'  ,
        'EjercidoPPOP'  ,
        'Observacion2'  ,
        'Reconocimiento'  ,
        'Observacion3'  ,
        'VincuPExpuesta'  ,
        'Observacion4'  ,
        'ObligacionTE'  ,
        'Observacion5',
        'OrganizacionI'  ,
        'Observacion6'  ,
        'ObligacionP',
        'Observacion7'  ,

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
