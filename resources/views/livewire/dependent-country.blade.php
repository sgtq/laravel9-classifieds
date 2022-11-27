<div class="grid grid-cols-12 gap-6">
    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-3 sm:col-span-2">
            <label for="country_id" class="block text-sm font-medium text-gray-700">
                Country
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <select wire:model="selectedCountry" name="country_id"
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                    <option value="">Please select one...</option>
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
    @if (!is_null($selectedCountry))
    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-3 sm:col-span-2">
            <label for="state_id" class="block text-sm font-medium text-gray-700">
                State
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <select wire:model="selectedState" name="state_id"
                        class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300">
                    <option value="">Please select one...</option>
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
    @endif
    @if (!is_null($selectedState))
    <div class="grid grid-cols-6 gap-6">
        <div class="col-span-3 sm:col-span-2">
            <label for="city_id" class="block text-sm font-medium text-gray-700">
                City
            </label>
            <div class="mt-1 flex rounded-md shadow-sm">
                <select name="city_id"
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
    @endif
</div>
