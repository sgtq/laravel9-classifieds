<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('New Listing/Ad') }}
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
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Create new Listing/Ad</h3>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('listings.store') }}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="category" class="block text-sm font-medium text-gray-700">
                                                    Sub Category
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="subcategory_id" id="subcategory_id" multiple
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        @foreach ($sub_categories as $subCategory)
                                                        <option value="{{ $subCategory->id }}">{{ $subCategory->category->name.' - '.$subCategory->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('subcategory_id')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="title" class="block text-sm font-medium text-gray-700">
                                                    Title
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="title" id="title"
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                           placeholder="Title">
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
                                                    ></textarea>
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
                                                           />
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
                                                    <input type="checkbox" name="price_negotiable" id="price_negotiable"
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 block border-gray-300"
                                                    />
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
                                                        <option value="{{ $condition->id }}">{{ $condition->name }}</option>
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
                                                <label for="location" class="block text-sm font-medium text-gray-700">
                                                    Location
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="location" id="location"
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                           placeholder="Location" />
                                                </div>
                                                @error('location')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="country_id" class="block text-sm font-medium text-gray-700">
                                                    Country
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="country_id" id="country_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        <!--/*
                                                        <option value="">Please select one...</option>
                                                        */-->
                                                        @foreach ($countries as $country)
                                                        <option value="{{ $country->id }}">{{ $country->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('country_id')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="country_id" class="block text-sm font-medium text-gray-700">
                                                    State
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="state_id" id="state_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        <!--/*
                                                        <option value="">Please select one...</option>
                                                        */-->
                                                        @foreach ($states as $state)
                                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('state_id')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="city_id" class="block text-sm font-medium text-gray-700">
                                                    City
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <select name="city_id" id="city_id"
                                                            class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                                                        <option value="">Please select one...</option>
                                                        @foreach ($cities as $city)
                                                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                @error('city_id')
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
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                                </div>
                                                @error('phone')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Featured Image
                                            </label>
                                            <div class="mt-1 flex items-center">
                                                <input type="file" id="image_featured" name="image_featured"
                                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                            </div>
                                            @error('image_featured')
                                            <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Image 2
                                            </label>
                                            <div class="mt-1 flex items-center">
                                                <input type="file" id="image2" name="image2"
                                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                            </div>
                                            @error('image2')
                                            <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-gray-700">
                                                Image 3
                                            </label>
                                            <div class="mt-1 flex items-center">
                                                <input type="file" id="image3" name="image3"
                                                       class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300" />
                                            </div>
                                            @error('image3')
                                            <span class="text-red-500">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="px-4 py-3 bg-gray-50 sm:px-6">
                                            <button type="submit"
                                                    class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                                Save
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
