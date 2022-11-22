<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SubcategoryStoreRequest;
use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $subCategories = SubCategory::paginate(12);
        return view('admin.subcategories.index', compact('subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(SubCategory $subCategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.create', compact('subCategory', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SubcategoryStoreRequest $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/subcategories');

            SubCategory::create([
                'category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'description' => $request->description,
                'image' => $path,
            ]);

            return redirect()->route('subcategories.index')->with('success', 'Subcategory created');
        }

        $this->banner('warning', 'Please select a file.');
        return back()->with('warning', 'Please select a file');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subcategory)
    {
        $categories = Category::all();
        return view('admin.subcategories.edit', compact('subcategory', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subcategory)
    {
        $updateItem = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'description' => $request->description,
            'image' => $subcategory->image,
        ];

        if ($request->hasFile('image')) {
            Storage::delete($subcategory->image);
            $updateItem['image'] = $request->file('image')->store('public/subcategories');
        }

        if ($subcategory->update($updateItem)) {
            return redirect()->route('subcategories.index')->with('message', 'Subcategory updated');
        }

        return redirect()->route('subcategories.index')->with('message', 'An error has happened when updating Subcategory');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  SubCategory $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        $subCategory->delete();
        return back()->route('admin.subcategories.index')
            ->with('success', 'Subcategory has been deleted');
    }
}
