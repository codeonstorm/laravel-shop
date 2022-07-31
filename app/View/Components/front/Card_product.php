<?php

namespace App\View\Components\front;

use Illuminate\View\Component;

class Card_product extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $product;
    public $attr;
    public $imgs;
    public function __construct($product, $attr, $imgs)
    {
        $this->product=$product;
        $this->attr=$attr;
        $this->imgs=$imgs;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.front.card_product');
    }
}
