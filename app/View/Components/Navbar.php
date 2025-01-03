<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Navbar extends Component
{
    /**
     * The title property.
     *
     * @var string|null
     */

    /**
     * Create a new component instance.
     *
     * @param string|null $title
     */
    public function __construct()
    {
        //
    }
    

    /**
     * Get the view / contents that represent the component.
     *
     * @return View|Closure|string
     */
    public function render(): View|Closure|string
    {

        return view('components.navbar', [
            
        ]);
    }
}

