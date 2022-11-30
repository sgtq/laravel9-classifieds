<?php

namespace App\View\Components;

use App\Models\Listing;
use Illuminate\View\Component;

class MainFeatured extends Component
{
    public $featured_ads;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->featured_ads = Listing::where('is_featured', 1)->get();
        $this->featured_ads = Listing::inRandomOrder()->limit(6)->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-featured');
    }
}
