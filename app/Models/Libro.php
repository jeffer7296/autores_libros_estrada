<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    protected $fillable = ['autor_id', 'titulo', 'isbn', 'anio_publicacion', 'precio'];

    public function autor()
    {
    return $this->belongsTo(Autor::class, 'autor_id');
    }

}
