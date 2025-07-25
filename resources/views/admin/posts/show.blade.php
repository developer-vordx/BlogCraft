@extends('admin.layouts.app')

@section('title', $post->title)

@section('content')

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <div class="max-w-4xl mx-auto">
            <!-- Back Button -->
            <div class="mb-6">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-gray-600 hover:text-gray-900 transition-colors">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                    </svg>
                    Back to My Posts
                </a>
            </div>

            <!-- Post Header -->
            <article class="bg-white rounded-xl shadow-sm overflow-hidden">
                <!-- Feature Image -->
                <div class="h-80 overflow-hidden">
                    <img
                        src="{{ $post->featured_image ? asset( $post->featured_image) : 'https://images.pexels.com/photos/1181671/pexels-photo-1181671.jpeg?auto=compress&cs=tinysrgb&w=800&h=400&fit=crop' }}"
                        alt="{{ $post->title }}"
                        class="w-full h-full object-cover"
                    >
                </div>


                <!-- Post Content -->
                <div class="p-8">
                    <!-- Post Meta -->
                    <div class="flex items-center justify-between mb-6">
                        <div class="flex items-center space-x-4">
                            <span class="px-3 py-1 bg-orange-100 text-orange-600 rounded-full text-sm font-medium">{{$post->category->name}}</span>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a1 1 0 011-1h6a1 1 0 011 1v4m-6 0h6m-6 0a1 1 0 00-1 1v10a1 1 0 001 1h6a1 1 0 001-1V8a1 1 0 00-1-1"/>
                                </svg>
                                {{ $post->created_at->diffForHumans() }}
                            </div>
                            <div class="flex items-center text-sm text-gray-500">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span> {{$post->getEstimatedReadingTime()}} min read
                            </div>
                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="p-2 text-gray-400 hover:text-orange-500 transition-colors" title="Edit Post">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-red-500 transition-colors" title="Delete Post" onclick="deletePost()">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                            </button>
                        </div>
                    </div>

                    <!-- Post Title -->
                    <h1 class="text-4xl font-bold text-gray-900 mb-6 leading-tight">{{$post->title}}</h1>

                    <!-- Author Info -->
                    <div class="flex items-center mb-8 pb-6 border-b border-gray-200">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center mr-4">
                            <span class="text-white font-semibold">JD</span>
                        </div>
                        <div>
                            <p class="font-semibold text-gray-900">{{$post->user->first_name}}</p>
                            <p class="text-sm text-gray-500">Software Developer & Tech Enthusiast</p>
                        </div>
                    </div>

                    <!-- Post Content -->
                    <div class="prose prose-lg max-w-none">
                        {!! $post->content !!}
                    </div>

                    <!-- Post Stats -->
                    <div class="flex items-center justify-between pt-8 border-t border-gray-200 mt-8">
                        <div class="flex items-center space-x-6">
                            <!-- Like Button -->
                            <div class="flex items-center space-x-2">
                                <button onclick="toggleLike({{ $post->id }})" class="focus:outline-none">
                                    <svg id="like-icon" xmlns="http://www.w3.org/2000/svg"
                                         class="h-6 w-6 transition-colors {{ $hasLiked ? 'text-red-500 fill-red-500' : 'text-gray-500' }}"
                                         viewBox="0 0 20 20" fill="currentColor">
                                        <path d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 18.343l-6.828-6.829a4 4 0 010-5.656z" />
                                    </svg>
                                </button>
                                <span id="like-count">{{ $post->likes->count() }}</span>
                            </div>
                            <div class="flex items-center space-x-2 text-gray-500">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                <span>{{ $post->views->count() }}</span>
                            </div>

                        </div>
                        <div class="flex items-center space-x-2">
                            <button class="p-2 text-gray-400 hover:text-blue-500 transition-colors" title="Share on Twitter">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-blue-600 transition-colors" title="Share on LinkedIn">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447 20.452h-3.554v-5.569c0-1.328-.027-3.037-1.852-3.037-1.853 0-2.136 1.445-2.136 2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9 1.637-1.85 3.37-1.85 3.601 0 4.267 2.37 4.267 5.455v6.286zM5.337 7.433c-1.144 0-2.063-.926-2.063-2.065 0-1.138.92-2.063 2.063-2.063 1.14 0 2.064.925 2.064 2.063 0 1.139-.925 2.065-2.064 2.065zm1.782 13.019H3.555V9h3.564v11.452zM22.225 0H1.771C.792 0 0 .774 0 1.729v20.542C0 23.227.792 24 1.771 24h20.451C23.2 24 24 23.227 24 22.271V1.729C24 .774 23.2 0 22.222 0h.003z"/>
                                </svg>
                            </button>
                            <button class="p-2 text-gray-400 hover:text-green-500 transition-colors" title="Copy Link">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13.828 10.172a4 4 0 00-5.656 0l-4 4a4 4 0 105.656 5.656l1.102-1.101m-.758-4.899a4 4 0 005.656 0l4-4a4 4 0 00-5.656-5.656l-1.1 1.1"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </article>

            <!-- Related Posts Section -->
{{--            <div class="mt-12">--}}
{{--                <h2 class="text-2xl font-bold text-gray-900 mb-6">Related Posts</h2>--}}
{{--                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">--}}
{{--                    <!-- Related Post 1 -->--}}
{{--                    <article class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden">--}}
{{--                        <div class="h-40 overflow-hidden">--}}
{{--                            <img src="https://images.pexels.com/photos/265087/pexels-photo-265087.jpeg?auto=compress&cs=tinysrgb&w=400&h=200&fit=crop" alt="SEO Best Practices" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">--}}
{{--                        </div>--}}
{{--                        <div class="p-6">--}}
{{--                            <div class="flex items-center mb-3">--}}
{{--                                <span class="px-2 py-1 bg-blue-100 text-blue-600 rounded-full text-xs font-medium">SEO</span>--}}
{{--                                <span class="ml-3 text-sm text-gray-500">March 10, 2024</span>--}}
{{--                            </div>--}}
{{--                            <h3 class="text-lg font-semibold text-gray-900 mb-2 hover:text-orange-500 transition-colors cursor-pointer">--}}
{{--                                SEO Best Practices for 2024--}}
{{--                            </h3>--}}
{{--                            <p class="text-gray-600 text-sm">Learn the latest SEO strategies to improve your website's search engine rankings...</p>--}}
{{--                        </div>--}}
{{--                    </article>--}}

{{--                    <!-- Related Post 2 -->--}}
{{--                    <article class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow overflow-hidden">--}}
{{--                        <div class="h-40 overflow-hidden">--}}
{{--                            <img src="https://images.pexels.com/photos/3184291/pexels-photo-3184291.jpeg?auto=compress&cs=tinysrgb&w=400&h=200&fit=crop" alt="Brand Identity" class="w-full h-full object-cover hover:scale-105 transition-transform duration-300">--}}
{{--                        </div>--}}
{{--                        <div class="p-6">--}}
{{--                            <div class="flex items-center mb-3">--}}
{{--                                <span class="px-2 py-1 bg-purple-100 text-purple-600 rounded-full text-xs font-medium">Branding</span>--}}
{{--                                <span class="ml-3 text-sm text-gray-500">March 8, 2024</span>--}}
{{--                            </div>--}}
{{--                            <h3 class="text-lg font-semibold text-gray-900 mb-2 hover:text-orange-500 transition-colors cursor-pointer">--}}
{{--                                Building a Strong Brand Identity--}}
{{--                            </h3>--}}
{{--                            <p class="text-gray-600 text-sm">Discover the essential elements of creating a memorable brand that resonates...</p>--}}
{{--                        </div>--}}
{{--                    </article>--}}
{{--                </div>--}}
{{--            </div>--}}
        </div>
    </div>

    <script>

        // Like functionality
        let isLiked = false;
        function toggleLike() {
            const likeIcon = document.getElementById('like-icon');
            const likeCount = document.getElementById('like-count');

            if (isLiked) {
                likeIcon.classList.remove('fill-red-500', 'text-red-500');
                likeIcon.classList.add('text-gray-500');
                likeCount.textContent = {{ $post->likes->count() }};
                isLiked = false;
            } else {
                likeIcon.classList.remove('text-gray-500');
                likeIcon.classList.add('fill-red-500', 'text-red-500');
                likeCount.textContent = {{ $post->likes->count()+1 }};
                isLiked = true;
            }
        }

        // Delete post functionality
        function deletePost() {
            if (confirm('Are you sure you want to delete this post? This action cannot be undone.')) {
                alert('Post deleted successfully!');
                window.location.href = 'my-posts.html';
            }
        }

        function toggleLike(postId) {
            fetch(`/admin/posts/${postId}/like`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({})
            })
                .then(response => response.json())
                .then(data => {
                    const likeIcon = document.getElementById('like-icon');
                    const likeCount = document.getElementById('like-count');

                    if (data.liked) {
                        likeIcon.classList.add('fill-red-500', 'text-red-500');
                        likeIcon.classList.remove('text-gray-500');
                    } else {
                        likeIcon.classList.remove('fill-red-500', 'text-red-500');
                        likeIcon.classList.add('text-gray-500');
                    }

                    likeCount.textContent = data.total_likes;
                })
                .catch(error => console.error('Error:', error));
        }

        // Copy link functionality
        document.querySelector('[title="Copy Link"]').addEventListener('click', function() {
            navigator.clipboard.writeText(window.location.href).then(function() {
                alert('Link copied to clipboard!');
            });
        });
    </script>
@endsection

