<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Chart extends Component
{
    public $title;
    public $chartId;

    public function __construct($title, $chartId)
    {
        $this->title = $title;
        $this->chartId = $chartId;
    }

    public function render()
    {
        return view('dasawisma');
    }
}
