<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CountryStoreRequest;
use App\Models\Country;
use Illuminate\Http\Request;

class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::paginate(10);
        return view('admin.countries.index', compact('countries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.countries.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CountryStoreRequest $request)
    {
        $validated = $request->validated();
        if ($country = Country::create($validated)) {
            return redirect()->route('countries.edit', $country->id)
                ->with('message', 'Country created');
        }

        return back()
            ->with('message', 'An error ocurred when creating Country');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Country $country
     * @return \Illuminate\Http\Response
     */
    public function edit(Country $country)
    {
        return view('admin.countries.edit', compact('country'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CountryStoreRequest  $request
     * @param  Country $country
     * @return \Illuminate\Http\Response
     */
    public function update(CountryStoreRequest $request, Country $country)
    {
        if ($country->update($request->validated())) {
            return back()
                ->with('message', 'Country updated');
        }

        return back()
            ->with('message', 'An error ocurred when creating Country');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Country $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return back()
            ->with('message', 'Country deleted');
    }
}
