<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Link extends Component
{
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

    public function typeClass()
    {
        if ($this->type === 'secondary') {
            return 'text-white bg-teal-600 active:bg-teal-600 hover:bg-teal-700 focus:shadow-outline-teal';
        }
        if ($this->type === 'primary') {
            return 'text-white bg-indigo-600 active:bg-indigo-600 hover:bg-indigo-700 focus:shadow-outline-indigo';
        }
        return 'text-white bg-purple-600 active:bg-purple-600 hover:bg-purple-700 focus:shadow-outline-purple';
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.link');
    }
}
