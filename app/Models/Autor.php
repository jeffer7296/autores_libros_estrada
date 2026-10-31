<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    protected $fillable = ['nombres', 'nacionalidad', 'email'];

    public function libros()
    {
    return $this->hasMany(Libro::class, 'autor_id');
    }

}
