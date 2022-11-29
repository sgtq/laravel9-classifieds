<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Country;
use App\Models\Listing;
use Illuminate\Http\Request;
use Spatie\QueryBuilder\AllowedFilter;
use Spatie\QueryBuilder\QueryBuilder;

class ListingController extends Controller
{
    public function index(Request $request)
    {
        $listings = QueryBuilder::for(Listing::class)
            ->allowedFilters([
                'title',
                AllowedFilter::exact('country', 'country_id'),
                AllowedFilter::exact('category', 'category_id'),
                AllowedFilter::scope('price', 'max_price'),
            ])->get();

        return view('frontend.all-listings', compact('listings'));
    }
}
