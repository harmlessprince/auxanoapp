<?php

namespace App\View\Components;

use Illuminate\View\Component;

class SideMenu extends Component
{
    public $url;
    public $title;
    public $active;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($url = 'home', $title='king', $active = false)
    {
        $this->url = $url;
        $this->title = $title;
        $this->active = $active;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.side-menu');
    }
}
