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

    public function mount($selectedCategory = null, $selectedSubCategory = null)
    {
        $this->categories = Category::all();
        $this->selectedCategory = $selectedCategory;
        $this->selectedSubCategory = $selectedSubCategory;

        $this->updatedSelectedCategory();
    }

    public function updatedSelectedCategory()
    {
        if (!is_null($this->selectedCategory)) {
            $this->subCategories = SubCategory::where('category_id', $this->selectedCategory)->get();
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
