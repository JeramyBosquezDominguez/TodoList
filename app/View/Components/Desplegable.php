<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Desplegable extends Component
{

    /**
     * Create a new component instance.
     */
    public function __construct(public array $colores, public string $selected)
    {

    }

    public function isSelected(string $opcion): bool 
    {
        return $opcion === ltrim($this->selected,"#") ; 
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.desplegable');
    }
}
