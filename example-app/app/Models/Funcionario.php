<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $fillable = ['nome','email'];
    public $timestamps = false;
}

// A Model serve para "visitar" o banco de dados. Recebe requisições do controller e responde com dados atualizados.
