<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Comentario extends Component
{
    public $comentario;

    public function __construct($comentario)
    {
        $this->comentario = $comentario;
    }

    public function render()
    {
        return view('components.comentario');
    }
}
