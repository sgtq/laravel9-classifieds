<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Condition;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ConditionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $conditions = Condition::paginate(10);
        return view('admin.conditions.index', compact('conditions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.conditions.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Condition::create($request->validated())) {
            return redirect()->route('admin.conditions.index')
                ->with('message', 'Condition saved');
        }

        return redirect()->back()->with('message', 'An error has ocurred while saving Condition');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function edit(Condition $condition): View
    {
        return view('admin.conditions.edit', compact('condition'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Condition $condition): RedirectResponse
    {
        if ($condition->update($request->validated())) {
            return redirect()->route('admin.conditions.index')
                ->with('message', 'Condition updated');
        }

        return redirect()->back()->with('message', 'An error has ocurred while updating Condition');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Condition  $condition
     * @return \Illuminate\Http\Response
     */
    public function destroy(Condition $condition)
    {
        $condition->delete();
        return redirect()->back()->with('message', 'Condition deleted');
    }
}
