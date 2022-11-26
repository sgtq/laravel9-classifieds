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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $conditions = Condition::all();
        $countries = Country::all();
        $states = State::where('is_active', 1)->select('id', 'name')->get();
        $cities = City::all();

        return view('listings.create',
            compact('categories', 'sub_categories', 'conditions', 'countries', 'states', 'cities')
        );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  ListingStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(ListingStoreRequest $request): RedirectResponse
    {
        if ($request->hasFile('image_featured')) {
            $featured_image_path = $request->file('image_featured')->store('public/listings');
            if ($request->hasFile('image2')) {
                $image2_path = $request->file('image2')->store('public/listings');
            }
            if ($request->hasFile('image3')) {
                $image3_path = $request->file('image3')->store('public/listings');
            }

            $validated = $request->validated([
                'title' => $request->title,
                'slug' => Str::slug($request->title),
                'description' => $request->description,
                'price' => $request->price,
                'price_negotiable' => $request->price_negotiable,
                'condition_id' => $request->condition_id,
                'location' => $request->location,
                'country_id' => $request->country_id,
                'state_id' => $request->state_id ?: NULL,
                'phone' => $request->phone,
                'published' => $request->published,
                'image_featured' => $featured_image_path,
                'image2' => $image2_path ?? NULL,
                'image3' => $image3_path ?? NULL,
            ]);

            if (Listing::create($validated)) {
                return redirect()->route('listings.index')
                    ->with('message', 'Listing saved');
            }

            return redirect()->back()->with('message', 'An error has occurred when saving New Listing');
        }

        return redirect()->back()->with('message', 'Please include a featured Image');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function show(Listing $listing)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function edit(Listing $listing)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Listing $listing)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Listing  $listing
     * @return \Illuminate\Http\Response
     */
    public function destroy(Listing $listing)
    {
        //
    }
}
