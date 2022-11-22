<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ChildCategory;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChildCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $childCategories = ChildCategory::paginate(10);
        return view('admin.childcategories.index', compact('childCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $subCategories = SubCategory::all();
        return view('admin.childcategories.create', compact('subCategories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('public/childcategories');

            ChildCategory::create([
                'sub_category_id' => $request->category_id,
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $path,
            ]);

            return redirect()->route('childcategories.index')
                ->with('message', 'Child Category created');
        }

        return back()
            ->with('message', 'Please select a file');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  ChildCategory $childCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ChildCategory $childCategory)
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return view('admin.childcategories.edit', compact('categories', 'subCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  ChildCategory $childCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChildCategory $childCategory)
    {
        $updateItem = [
            'category_id' => $request->category_id,
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'image' => $childCategory->image,
        ];

        if ($request->hasFile('image')) {
            Storage::delete($childCategory->image);
            $updateItem['image'] = $request->file('image')->store('public/childcategories');
        }

        if ($childCategory->update($updateItem)) {
            return redirect()->route('childcategories.index')
                ->with('message', 'Child Category updated');
        }

        return redirect()->route('childcategories.index')
            ->with('message', 'An error has happened when updating Child Category');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ChildCategory $childCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ChildCategory $childCategory)
    {
        $childCategory->delete();
        return back()
            ->with('message', 'Child Category deleted');
    }

    private function lists()
    {
        $categories = Category::all();
        $subCategories = SubCategory::all();
        return compact('categories', 'subCategories');
    }
}
