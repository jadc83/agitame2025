<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class Comentario extends Model
{
    protected $fillable = ['user_id', 'contenido', 'comentable_type', 'comentable_id'];

    public function comentable()
    {
        return $this->morphTo();
    }

    public function comentarios(): MorphMany
    {
        return $this->morphMany(Comentario::class, 'comentable')->with('comentarios');
    }

    public function usuario()
    {
        return $this->belongsTo(User::class);
    }

    use HasFactory;
}
