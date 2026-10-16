<?php

namespace InfernalMedia\LaravelFaviconGenerator\View\Components;

use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class FaviconMeta extends Component
{
    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('favicon-generator::components.favicon-meta');
    }
}
