<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    protected $fillable = ['name'];

    // Dizendo que esta Categoria TEM VÁRIOS Posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
