<article class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden">
    @if (!empty($post->featured_image))
        <img src="{{ asset($post->featured_image) }}" alt="Post Image" class="w-full h-48 object-cover">
    @else
        <div class="h-48 bg-gradient-to-br from-orange-100 to-orange-200"></div>
    @endif

    <div class="p-6">
        <div class="flex items-center justify-between mb-3">
            <div class="flex items-center text-sm text-gray-500">
                <span>{{ $post->created_at->diffForHumans() }}</span>
                <span class="mx-2">•</span>
                <span> {{$post->getEstimatedReadingTime()}} min read </span>
                <span class="mx-2">•</span>
                <span class="px-2 py-1 bg-orange-100 text-orange-600 rounded-full text-xs">{{ $post->category->name }}</span>
            </div>
            <div class="flex items-center space-x-2">
                <!-- Buttons -->
            </div>
        </div>
        <a href="{{ route('posts.show', $post) }}">
            <h3 class="text-xl font-semibold text-gray-900 mb-3 hover:text-orange-500 transition-colors cursor-pointer">
                {{ $post->title }}
            </h3>
        </a>

        <p class="text-gray-600 mb-4">
            {{ \Illuminate\Support\Str::words(strip_tags($post->content), 20, '...') }}
        </p>
        <div class="flex items-center justify-between">
            <div class="flex items-center">
                <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center mr-3">
                    <span class="text-white text-xs font-semibold">JD</span>
                </div>
                <span class="text-sm text-gray-600">{{ $post->user->first_name }}</span>
            </div>
            <div class="flex items-center space-x-4 text-sm text-gray-500">
                <!-- Icons -->
            </div>
        </div>
    </div>
</article>
