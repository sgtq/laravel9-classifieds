<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StateStoreRequest;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::paginate(10);
        return view('admin.states.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $country_id = $request->country_id;
        $countries = Country::all();
        return view('admin.states.create', compact('countries', 'country_id'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StateStoreRequest  $request
     */
    public function store(StateStoreRequest $request)
    {
        if ($state = State::create($request->validated())) {
            return redirect()->route('states.edit', $state->id)->with('message', 'State saved');
        }

        return back()->with('message', 'Error when saving State');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  State $state
     */
    public function edit(State $state)
    {
        $countries = Country::all();

        return view('admin.states.edit', compact('state', 'countries'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  State $state
     */
    public function update(Request $request, State $state)
    {
        if ($state->update($request->validated())) {
            return redirect()->route('countries.edit', $state->country_id)
                ->with('message', 'State updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  State $state
     * @return \Illuminate\Http\Response
     */
    public function destroy(State $state)
    {
        $state->delete();
        return back()->with('message', 'State deleted');
    }
}
