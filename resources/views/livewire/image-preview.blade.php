<div>
    <div class="col-span-6 sm:col-span-3">
        <label class="block text-sm font-medium text-gray-700">
            Featured Image
        </label>
        <div class="mt-1 flex items-center">
            @if ($featuredImage)
            <div class="m-2 p-2">
                <img src="{{ $featuredImage->temporaryUrl() }}" width="80" height="80" />
            </div>
            @endif
            <input wire:model="featuredImage" type="file" id="image_featured" name="image_featured"
                   class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
        </div>
        @error('image_featured')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-span-6 sm:col-span-3">
        <label class="block text-sm font-medium text-gray-700">
            Image 2
        </label>
        <div class="mt-1 flex items-center">
            @if ($image2)
            <div class="m-2 p-2">
                <img src="{{ $image2->temporaryUrl() }}" width="80" height="80" />
            </div>
            @endif
            <input wire:model="image2" type="file" id="image2" name="image2"
                   class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
        </div>
        @error('image2')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
    <div class="col-span-6 sm:col-span-3">
        <label class="block text-sm font-medium text-gray-700">
            Image 3
        </label>
        <div class="mt-1 flex items-center">
            @if ($image3)
            <div class="m-2 p-2">
                <img src="{{ $image3->temporaryUrl() }}" width="80" height="80" />
            </div>
            @endif
            <input wire:model="image3" type="file" id="image3" name="image3"
                   class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
        </div>
        @error('image3')
        <span class="text-red-500">{{ $message }}</span>
        @enderror
    </div>
</div>
