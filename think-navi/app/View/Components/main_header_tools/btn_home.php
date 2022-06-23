<?php

namespace App\View\Components\main_header_tools;

use Illuminate\View\Component;

class btn_home extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main_header_tools.btn_home');
    }
}
