<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class BetForm extends Component
{
    public string $betRisk, $minPrize, $maxPrize;
    public function __construct($betRisk, $minPrize, $maxPrize)
    {
        $this->betRisk = $betRisk;
        $this->minPrize = $minPrize;
        $this->maxPrize = $maxPrize;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.bet-form');
    }
}
