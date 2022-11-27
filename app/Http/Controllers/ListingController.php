<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingStoreRequest;
use App\Models\Condition;
use App\Models\Listing;
use Illuminate\Support\Str;
use Illuminate\View\View;

class ListingController extends Controller
{
    public function index()
    {
        $listings = Listing::where('user_id', auth()->user()->id)->paginate(15);
        return view('listings.index', compact('listings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View
     */
    public function create(): View
    {
        $conditions = Condition::all();
        return view('listings.create', compact( 'conditions', ));
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

            $listing = Listing::create([
                'user_id' => auth()->user()->id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
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
//                'is_published' => $request->is_published ?? 0,
                'image_featured' => $featured_image_path,
                'image2' => $image2_path ?? NULL,
                'image3' => $image3_path ?? NULL,
            ]);

            if ($listing) {
                return redirect()->route('dashboard')
                    ->with('message', 'Listing saved');
            }

            return back()->with('message', 'An error has occurred when saving New Listing');
        }

        return back()->with('message', 'Please include a featured Image');
    }

    public function destroy($listing)
    {
        //
    }
}
