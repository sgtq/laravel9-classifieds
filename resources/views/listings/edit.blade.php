<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Listing/Ad') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="overflow-hidden sm:rounded-lg bg-gray-200 m-2 p-2">
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit new Listing/Ad</h3>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('listings.update', $listing->id) }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        @livewire('dependent-category', ['selectedCategory' => $listing->category_id, 'selectedSubCategory' => $listing->subcategory_id])
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Title
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="title" id="title"
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                           placeholder="Title" value="{{ $listing->title }}" />
                                                </div>
                                                @error('title')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="description" class="block text-sm font-medium text-gray-700">
                                                    Description
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <textarea name="description" name="description"
                                                              class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                    >{{ $listing->description }}</textarea>
                                                </div>
                                                @error('description')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="price" class="block text-sm font-medium text-gray-700">
                                                    Price
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="number" name="price" id="price"
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                           value="{{ $listing->price }}" />
                                                </div>
                                                @error('price')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="price_negotiable" class="block font-medium text-gray-700">
                                                    Price Negotiable?
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="price_negotiable" id="price_negotiable"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 block border-gray-300"
                                                    >
                                                        <option value="0" {{ !$listing->price_negotiable ? 'selected' : '' }}>Non Negotiable</option>
                                                        <option value="1" {{ $listing->price_negotiable ? 'selected' : '' }}>Negotiable</option>
                                                    </select>
                                                </div>
                                                @error('price_negotiable')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="condition_id" class="block text-sm font-medium text-gray-700">
                                                    Condition
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="condition_id" id="condition_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        <option value="">Please select one...</option>
                                                        @foreach ($conditions as $condition)
                                                        <option value="{{ $condition->id }}"
                                                                {{ $condition->id === $listing->condition->id ? 'selected' : '' }}
                                                        >
                                                            {{ $condition->name }}
                                                        </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('condition_id')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="phone" class="block text-sm font-medium text-gray-700">
                                                    Phone
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="phone" id="phone"
                                                           value="{{ $listing->phone }}"
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                                </div>
                                                @error('phone')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="location" class="block text-sm font-medium text-gray-700">
                                                    Location
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="location" id="location"
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                           placeholder="Location" value="{{ $listing->location }}" />
                                                </div>
                                                @error('location')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        @livewire('dependent-country', [
                                            $listing->country_id,
                                            $listing->state_id,
                                            $listing->city_id
                                        ])
                                        @livewire('image-preview', [
                                            $listing->image_featured,
                                            $listing->image2,
                                            $listing->image3
                                        ])
                                        <div class="px-4 py-3 bg-gray-50 sm:px-6">
                                            <button type="submit"
                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Update
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
