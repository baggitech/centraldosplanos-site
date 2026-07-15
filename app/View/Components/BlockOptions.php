<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BlockOptions extends Component
{
    public function __construct(
        public bool $fullscreen = true,
        public bool $pin = false,
        public bool $refresh = false,
        public bool $collapse = false,
        public bool $close = false,
        public string $refreshMode = 'demo',
    ) {}

    public function render(): View|Closure|string
    {
        return view('components.block-options');
    }
}