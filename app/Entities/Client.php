<?php

namespace CodeProject\Entities;

use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    //Fillable serve para permitir inser��o de dados em massa (Array) no banco
    protected $fillable = [
        'name',
        'responsible',
        'email',
        'phone',
        'address',
        'obs'
    ];
}
