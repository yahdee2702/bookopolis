<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class AdminLayout extends Component
{
    public $title;
    public $navTitle;
    public $selected;

    public function render(): View
    {
        return view("layouts.admin");
    }
}
