<section class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto">
        <div class="text-center mb-20">
            <h1 class="sm:text-3xl text-2xl font-medium title-font text-gray-900 mb-4">Browse Ads</h1>
            <p class="text-base leading-relaxed xl:w-2/4 lg:w-3/4 mx-auto text-gray-500s">
                Blue bottle crucifix vinyl post-ironic four dollar toast vegan taxidermy. Gastropub indxgo juice poutine, ramps microdosing banh mi pug.
            </p>
            <div class="flex mt-6 justify-center">
                <div class="w-16 h-1 rounded-full bg-indigo-500 inline-flex"></div>
            </div>
        </div>
        <div class="flex flex-wrap sm:-m-4 -mx-4 -mb-10 -mt-4 md:space-y-0 space-y-6">
        @foreach($featured_ads as $ad)
            <div class="p-4 md:w-1/3 flex flex-col text-center items-center">
                <div class="w-20 h-20 inline-flex items-center justify-center rounded-full bg-indigo-100 text-indigo-500 mb-5 flex-shrink-0">
                    <img src="{{ Storage::url($ad->image_featured) }}"
                         stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                         class="w-10 h-10" viewBox="0 0 24 24" />
                </div>
                <div class="flex-grow">
                    <h2 class="text-gray-900 text-lg title-font font-medium mb-3">{{ $ad->title }}</h2>
                    <p class="leading-relaxed text-base">{{ \Illuminate\Support\Str::limit($ad->description, 150, $end='...') }}</p>
                    <a href="{{ route('listings.show', $ad->id) }}" class="mt-3 text-indigo-500 inline-flex items-center">
                        Learn More
                        <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                             stroke-width="2" class="w-4 h-4 ml-2" viewBox="0 0 24 24">
                            <path d="M5 12h14M12 5l7 7-7 7"></path>
                        </svg>
                    </a>
                </div>
            </div>
        @endforeach
        </div>
        <a href="{{ route('all-listings') }}">
            <button class="flex mx-auto mt-16 text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">
                Browse All
            </button>
        </a>
    </div>
</section>
