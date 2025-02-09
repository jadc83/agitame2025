<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public function comentarios()
    {
        return $this->morphMany(Comentario::class, 'comentable');
    }

    public function usuarios()
    {
        return $this->belongsTo(User::class);
    }
    use HasFactory;
}

