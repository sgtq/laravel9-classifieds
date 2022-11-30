<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="flex flex-col text-center w-full mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900">Popular Categories</h1>
        </div>
        <div class="flex flex-wrap -m-4 text-center">
            @foreach($categories as $category)
            <div class="p-4 md:w-1/4 sm:w-1/2 w-full">
                <div class="bg-gray-200 border-2 border-gray-200 px-4 py-6 rounded-lg">
                    <img src="{{ Storage::url($category->image) }}" class="text-indigo-500 w-12 h-12 mb-3 inline-block" />
                    <h2 class="title-font font-medium text-3xl text-gray-900">{{ $category->count }}</h2>
                    <p class="leading-relaxed">{{ $category->name }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
