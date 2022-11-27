<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingStoreRequest;
use App\Models\Category;
use App\Models\City;
use App\Models\Condition;
use App\Models\Country;
use App\Models\Listing;
use App\Models\State;
use App\Models\SubCategory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ListingController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $sub_categories = SubCategory::all();
        $conditions = Condition::all();
        $countries = Country::all();
        $states = State::where('is_active', 1)->select('id', 'name')->get();
        $cities = City::all();

        return view('listings.create',
            compact( 'sub_categories', 'conditions', 'countries', 'states', 'cities')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ListingStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ListingStoreRequest $request)
    {
        if ($request->hasFile('image_featured')) {
            $featured_image_path = $request->file('image_featured')->store('public/listings');
            if ($request->hasFile('image2')) {
                $image2_path = $request->file('image2')->store('public/listings');
            }
            if ($request->hasFile('image3')) {
                $image3_path = $request->file('image3')->store('public/listings');
            }

            $validated = [
                'user_id' => auth()->user()->id,
//                'sub_category_id' => $request->sub_category_id,
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'price' => $request->price,
                'price_negotiable' => $request->price_negotiable ?? 0,
                'condition_id' => $request->condition_id,
                'location' => $request->location,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id ?: NULL,
                'city_id' => $request->state_id ?: NULL,
                'phone' => $request->phone,
                'published' => $request->published ?? 0,
                'image_featured' => $featured_image_path,
                'image2' => $image2_path ?? NULL,
                'image3' => $image3_path ?? NULL,
            ];

            if (Listing::create($validated)) {
                return redirect()->route('dashboard')
                    ->with('message', 'Listing saved');
            }

            return back()->with('message', 'An error has occurred when saving New Listing');
        }

        return back()->with('message', 'Please include a featured Image');
    }
}
