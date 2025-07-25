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
                <a href="{{ route('admin.posts.edit', $post) }}" class="p-1 text-gray-400 hover:text-orange-500 transition-colors">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                    </svg>
                </a>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <button class="p-1 text-gray-400 hover:text-red-500 transition-colors" onclick="deletePost({{$post->id}})">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                    </svg>
                </button>
            </div>
        </div>
        <a href="{{ route('admin.posts.show', $post) }}">
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
