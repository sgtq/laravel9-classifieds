<div class="grid grid-cols-6 gap-6">
    <div class="col-span-6 sm:col-span-3">
        <label for="category" class="block text-sm font-medium text-gray-700">
            Category
        </label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <select wire:model="selectedCategory" name="category_id"
                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>
        @error('category_id')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    @if (!is_null($selectedCategory))
    <div class="col-span-6 sm:col-span-6">
        <label for="category" class="block text-sm font-medium text-gray-700">
            Sub Category
        </label>
        <div class="mt-1 flex rounded-md shadow-sm">
            <select name="subcategory_id"
                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                @foreach ($subCategories as $subCategory)
                <option value="{{ $subCategory->id }}">{{ $subCategory->name }}</option>
                @endforeach
            </select>
        </div>
        @error('subcategory_id')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    @endif
</div>
