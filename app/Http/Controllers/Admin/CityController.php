<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CityStoreRequest;
use App\Models\City;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CityController extends Controller
{
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create(Request $request): View
    {
        $state_id = $request->state_id;
        $states = State::all();
        return view('admin.cities.create', compact('states', 'state_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CityStoreRequest $request): RedirectResponse
    {
        if ($city = City::create($request->validated())) {
            return redirect()->route('states.edit', $request->state_id)
                ->with('message', 'City saved');
        }

        return back()->with('message' , 'An error has ocurred when saving City');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  City $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        $states = State::where('state_id', $city->state->id);
        return view('admin.cities.edit', compact('city'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
