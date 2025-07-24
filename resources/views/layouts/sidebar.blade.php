<!-- Sidebar -->
<div class="w-64 bg-white h-screen shadow-sm">
    <div class="p-6">
        <nav class="space-y-2">

            <!-- Dashboard -->
            <a href="{{ route('dashboard') }}"
               class="w-full flex items-center px-4 py-3 text-left rounded-lg transition-colors
               {{ request()->routeIs('dashboard') ? 'bg-orange-50 text-orange-600 border-r-2 border-orange-500' : 'text-gray-600 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                </svg>
                Dashboard
            </a>

            <!-- Create Post -->
            <a href="{{ route('posts.create') }}"
               class="w-full flex items-center px-4 py-3 text-left rounded-lg transition-colors
               {{ request()->routeIs('posts.create') ? 'bg-orange-50 text-orange-600 border-r-2 border-orange-500' : 'text-gray-600 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                </svg>
                Create Post
            </a>

            <!-- All Posts -->
            <a href="{{ route('posts.index') }}"
               class="w-full flex items-center px-4 py-3 text-left rounded-lg transition-colors
               {{ request()->routeIs('posts.index') ? 'bg-orange-50 text-orange-600 border-r-2 border-orange-500' : 'text-gray-600 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                </svg>
                All Posts
            </a>

            <!-- My Posts -->
            <a href="{{ route('posts.mine') }}"
               class="w-full flex items-center px-4 py-3 text-left rounded-lg transition-colors
               {{ request()->routeIs('posts.mine') ? 'bg-orange-50 text-orange-600 border-r-2 border-orange-500' : 'text-gray-600 hover:bg-gray-50' }}">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                          d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                </svg>
                My Posts
            </a>

        </nav>
    </div>
</div>
