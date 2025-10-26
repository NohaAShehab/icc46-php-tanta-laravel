<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Button extends Component
{
    public $url;
    public $type;
    public $size;
    public $icon;
    public $method;
    public $confirm;
    
    /**
     * Create a new component instance.
     */
    public function __construct(
        $url = '#', 
        $type = 'primary', 
        $size = 'md', 
        $icon = null,
        $method = 'GET',
        $confirm = null
    ) {
        $this->url = $url;
        $this->type = $type;
        $this->size = $size;
        $this->icon = $icon;
        $this->method = $method;
        $this->confirm = $confirm;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.button');
    }
}
