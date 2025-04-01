<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class AppPostPreview extends Component
{
    public $apppost;
    /**
     * Create a new component instance.
     */
    public function __construct($apppost)
    {
        $this->apppost = $apppost;
    }
    

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.app-post-preview');
    }
}
