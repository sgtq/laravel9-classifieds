<?php

namespace App\Http\Controllers;

use App\Http\Requests\ListingStoreRequest;
use App\Models\Condition;
use App\Models\Listing;
use Illuminate\Http\Request;
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
     * @param  Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
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
                'city_id' => $request->city_id ?: NULL,
                'phone' => $request->phone,
                'published' => $request->published ?? 0,
                'image_featured' => $featured_image_path,
                'image2' => $image2_path ?? NULL,
                'image3' => $image3_path ?? NULL,
            ]);

            if ($listing) {
                return redirect()->route('listings.index')
                    ->with('message', 'Listing saved');
            }

            return redirect()->back()->with('message', 'An error has occurred when saving New Listing');
        }

        return redirect()->back()->with('message', 'Please include a featured Image');
    }

    public function edit(Listing $listing)
    {
        $conditions = Condition::all();
        return view('listings.edit', compact('listing', 'conditions'));
    }

    public function update(Request $request, Listing $listing)
    {
        if ($request->hasFile('image_featured')) {
            Storage::delete($listing->image_featured);
            $featured_image_path = $request->file('image_featured')->store('public/listings');
        }
        if ($request->hasFile('image2')) {
            Storage::delete($listing->image2);
            $image2_path = $request->file('image2')->store('public/listings');
        }
        if ($request->hasFile('image3')) {
            Storage::delete($listing->image3);
            $image3_path = $request->file('image3')->store('public/listings');
        }

        $listing->fill([
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
            'city_id' => $request->city_id ?: NULL,
            'phone' => $request->phone,
            'published' => $request->published ?? 0,
            'image_featured' => $featured_image_path ?? $listing->image_featured,
            'image2' => $image2_path ?? $listing->image2,
            'image3' => $image3_path ?? $listing->image3,
        ]);

        if ($listing->update()) {
            return redirect()->route('listings.index')
                ->with('message', 'Listing saved');
        }

        return back()->with('message', 'An error has occurred when saving New Listing');
    }

    public function destroy($listing)
    {
        //
    }
}
