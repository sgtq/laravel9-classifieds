<?php

namespace App\View\Components;

use App\Models\Category;
use App\Models\Listing;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\View\Component;
use Spatie\QueryBuilder\QueryBuilder;

class MainCategories extends Component
{
    public $categories;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->categories = Listing::select([
                'listings.category_id AS id',
                DB::raw('COUNT(*) AS count'),
                'categories.name AS name',
                'categories.image AS image'
            ])
            ->leftJoin('categories', 'listings.category_id', '=', 'categories.id')
            ->groupBy('listings.category_id')
            ->limit(4)
            ->orderBy('count', 'DESC')
            ->get();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.main-categories');
    }
}
