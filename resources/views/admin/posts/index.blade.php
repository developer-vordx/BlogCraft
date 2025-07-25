@extends('admin.layouts.app')

@section('title', 'Explore Posts')

@section('content')
    <div class="flex-1 p-8">
        <div class="flex items-center justify-between mb-8">
            <div>
                <h1 class="text-3xl font-bold text-gray-900">Explore Posts</h1>
                <p class="text-gray-600 mt-2">Discover amazing content from our community</p>
            </div>
            <div class="flex items-center space-x-4">
                <div class="relative">
                    <svg class="w-5 h-5 absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input type="text" placeholder="Search posts..." class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-colors">
                </div>
                <select class="px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-orange-500/20 focus:border-orange-500 transition-colors">
                    <option>All Categories</option>
                    <option>Writing Tips</option>
                    <option>SEO</option>
                    <option>Branding</option>
                    <option>Technology</option>
                    <option>Lifestyle</option>
                </select>
            </div>
        </div>

        <!-- Posts Container -->
        <div id="post-container" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach($posts as $post)
                @include('admin.posts.card', ['post' => $post])
            @endforeach
        </div>

        <!-- Load More -->
        @if ($posts->hasMorePages())
            <div class="text-center mt-12">
                <button id="load-more"
                        data-next-page="{{ $posts->currentPage() + 1 }}"
                        class="bg-orange-500 text-white px-8 py-3 rounded-lg font-medium hover:bg-orange-600 transition-colors">
                    Load More Posts
                </button>
            </div>
        @endif
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const loadMoreBtn = document.getElementById('load-more');

            if (loadMoreBtn) {
                loadMoreBtn.addEventListener('click', function () {
                    const nextPage = this.getAttribute('data-next-page');

                    fetch(`?page=${nextPage}`)
                        .then(response => response.text())
                        .then(html => {
                            const parser = new DOMParser();
                            const doc = parser.parseFromString(html, 'text/html');
                            const newPosts = doc.querySelectorAll('#post-container > *');
                            const postContainer = document.getElementById('post-container');

                            newPosts.forEach(post => postContainer.appendChild(post));

                            // Handle next page or remove button
                            const newLoadMore = doc.querySelector('#load-more');
                            if (newLoadMore) {
                                loadMoreBtn.setAttribute('data-next-page', newLoadMore.getAttribute('data-next-page'));
                            } else {
                                loadMoreBtn.remove();
                            }
                        })
                        .catch(error => {
                            console.error('Error loading more posts:', error);
                        });
                });
            }
        });
    </script>
@endsection

