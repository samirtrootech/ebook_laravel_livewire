<?php

namespace App\View\Components;

use App\Traits\Strings;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Avatar extends Component
{
    use Strings;
    public string $src;
    public string $alt;
    public string $size;
    public function __construct($src, $alt, $size)
    {
        $this->src = $src;
        $this->alt = $this->getAvatarText($alt);
        $this->size = $this->getAvatarSize($size);
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.avatar');
    }
}
