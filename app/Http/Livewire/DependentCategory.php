<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\SubCategory;
use App\Models\ChildCategory;
use Livewire\Component;

class DependentCategory extends Component
{
    public $categories;
    public $subCategories;
    public $childCategories;

    public $selectedCategory = null;
    public $selectedSubCategory = null;

    public function mount()
    {
        $this->categories = Category::all();
    }

    public function updatedSelectedCategory($category)
    {
        if (!is_null($this->selectedCategory)) {
            $this->subCategories = SubCategory::where('category_id', $category)->get();
        }
    }

    /*
    public function updatedSelectedSubcategory($subCategory)
    {
        if (!is_null($this->selectedSubCategory)) {
            $this->childCategories = ChildCategory::where('subcategory_id', $subCategory)->get();
        }
    }
    */

    public function render()
    {
        return view('livewire.dependent-category');
    }
}
