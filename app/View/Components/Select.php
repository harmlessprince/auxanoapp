<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Select extends Component
{
    /**
     * The select option type.
     *
     * @var string
     */
    public string $type;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = '')
    {
       $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.select');
    }
}
