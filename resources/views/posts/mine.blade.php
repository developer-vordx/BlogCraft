@extends('layouts.inside')

@section('title', 'Mine Posts')

@section('content')

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">My Posts</h1>
                <p class="text-gray-600 mt-2">Manage and edit your published content</p>
            </div>
            <a href="{{ route('posts.create') }}" class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-colors font-medium inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                New Post
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- My Post 1 -->

            @foreach($posts as $post)

                    <article id="article-{{$post->id}}" class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden">
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
                                <span> {{$post->getEstimatedReadingTime()}} min read</span>
                                <span class="mx-2">•</span>
                                <span class="px-2 py-1 bg-orange-100 text-orange-600 rounded-full text-xs">{{ $post->category->name }}</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <a href="{{ route('posts.edit', $post) }}" class="p-1 text-gray-400 hover:text-orange-500 transition-colors">
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
                                <span class="text-sm text-gray-600">{{$post->user->first_name}}</span>
                            </div>
                            <div class="flex items-center space-x-4 text-sm text-gray-500">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    {{$post->views->count()}}
                                </div>
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                                    </svg>
                                    {{$post->likes->count()}}
                                </div>
                            </div>
                            </div>
                        </div>
                    </article>

            @endforeach

            <!-- Empty State for demonstration -->
            <div class="col-span-full text-center py-12 bg-white rounded-xl shadow-sm">
                <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Ready to write more?</h3>
                <p class="text-gray-600 mb-6">Create more amazing content to share with your audience!</p>
                <a href="{{ route('posts.create') }}" class="bg-orange-500 text-white px-6 py-3 rounded-lg hover:bg-orange-600 transition-colors font-medium inline-flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                    </svg>
                    Create New Post
                </a>
            </div>
        </div>
    </div>

    <script>
        function deletePost(id) {
            if (!confirm('Are you sure you want to delete this post? This action cannot be undone.')) {
                return;
            }

            const article = document.getElementById(`article-${id}`);

            fetch(`/posts/${id}/delete`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                    'Accept': 'application/json'
                }
            })
                .then(async response => {
                    if (!response.ok) {
                        const data = await response.json();
                        throw new Error(data.message || 'Failed to delete post.');
                    }

                    // Fade out and remove the article
                    article.style.opacity = '0.5';
                    setTimeout(() => {
                        article.remove();
                        alert('Post deleted successfully!');
                    }, 300);
                })
                .catch(error => {
                    alert(error.message || 'An error occurred.');
                    article.style.opacity = '1'; // Reset opacity on error
                });
        }
    </script>

@endsection

