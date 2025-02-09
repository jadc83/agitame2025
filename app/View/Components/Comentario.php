<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use App\Models\Comentario as ComentarioModel; // ← Usa un alias

class Comentario extends Component
{
    public ComentarioModel $comentario; // ← Ahora se refiere al modelo correctamente

    public function __construct(ComentarioModel $comentario)
    {
        $this->comentario = $comentario;
    }

    public function render(): View|Closure|string
    {
        return view('components.comentario');
    }
}

