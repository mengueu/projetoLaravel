<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'text', 'categorias_id'];

    // Dizendo que este Post PERTENCE A uma Categoria
    public function categoria() 
    {
        return $this->belongsTo(Categoria::class);
    }
}
