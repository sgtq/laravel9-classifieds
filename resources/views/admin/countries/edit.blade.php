<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Country') }}
        </h2>
    </x-slot>

    <div class="container mx-auto">
        <!-- This example requires Tailwind CSS v2.0+ -->
        <div class="flex flex-col">
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                    <div class="flex justify-start">
                        <a href="{{ route('countries.index') }}"
                           class="py-2 px-4 m-2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">Back</a>
                    </div>
                </div>
            </div>
            <div class="overflow-hidden sm:rounded-lg bg-gray-200 m-2 p-2">
                <div>
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Edit Category</h3>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('countries.update', $country->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="shadow sm:rounded-md sm:overflow-hidden">
                                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="name" class="block text-sm font-medium text-gray-700">
                                                    Name
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="name" id="name" value="{{ $country->name }}"
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                           placeholder="Name">
                                                </div>
                                                @error('name')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="grid grid-cols-3 gap-6">
                                            <div class="col-span-3 sm:col-span-2">
                                                <label for="name" class="block text-sm font-medium text-gray-700">
                                                    Code
                                                </label>
                                                <div class="mt-1 flex rounded-md shadow-sm">
                                                    <input type="text" name="country_code" id="country_code"
                                                           class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                                           placeholder="Country Code"  value="{{ $country->country_code }}">
                                                </div>
                                                @error('country_code')
                                                <span class="text-red-500">{{ $message }}</span>
                                                @enderror
                                            </div>
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
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                    <div class="flex justify-end">
                        <a href="{{ route('states.create', ['country_id' => $country->id]) }}"
                           class="py-2 px-4 m-2 bg-green-500 hover:bg-green-300 text-gray-50 rounded-md">New
                            State</a>
                    </div>
                </div>
            </div>
            <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="py-2 align-middle inline-block w-full sm:px-6 lg:px-8">
                    <div class="shadow overflow-hidden border-b border-gray-200 sm:rounded-lg">
                        <table class="w-full divide-y divide-gray-200">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Name
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Active
                                    </th>
                                    <th scope="col" class="relative px-6 py-3">
                                        <span class="sr-only">Actions</span>
                                    </th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($country->states as $state)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            {{ $state->name }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <form method="POST"
                                                  action="{{ route('states.status', $state->id) }}">
                                                @csrf
                                                @method('PUT')
                                                <a class="text-red-500 hover:text-red-900 px-2"
                                                   href="{{ route('states.status', $state->id) }}"
                                                   onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                    {{ !$state->is_active ? 'Activate' : 'Deactivate' }}
                                                </a>
                                            </form>
                                        </div>
                                    </td>
                                    <td class="flex px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <a href="{{ route('states.edit', $state->id) }}"
                                           class="text-indigo-600 hover:text-indigo-900 px-2">Edit</a>
                                        <form method="POST"
                                              action="{{ route('states.destroy', $state->id) }}">
                                            @csrf
                                            @method('DELETE')
                                            <a class="text-red-500 hover:text-red-900 px-2"
                                               href="{{ route('states.destroy', $state->id) }}"
                                               onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                                Delete
                                            </a>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
