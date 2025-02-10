<?php

namespace App\View\Components;

use Illuminate\View\Component;

class FormularioResponder extends Component
{
    public $comentableType;
    public $comentableId;

    public function __construct($comentableType = null, $comentableId = null)
    {
        $this->comentableType = $comentableType;
        $this->comentableId = $comentableId;
    }

    public function render()
    {
        return view('components.formulario-responder');
    }
}
