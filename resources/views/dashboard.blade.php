@extends('layouts.inside')

@section('title', 'Dashboard')

@section('content')

    <!-- Main Content -->
    <div class="flex-1 p-8">
        <!-- Welcome Section -->
        <div class="bg-gradient-to-r from-orange-500 to-orange-600 rounded-xl p-8 text-white mb-8">
            <h1 class="text-3xl font-bold mb-2">Welcome back, {{\auth()->user()->first_name}}!</h1>
            <p class="text-orange-100 mb-6">Ready to create amazing content? Let's see how your blog is performing.</p>
            <a href="{{ route('posts.create') }}" class="bg-white text-orange-500 px-6 py-3 rounded-lg font-semibold hover:bg-gray-50 transition-colors inline-flex items-center">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"/>
                </svg>
                Write New Post
            </a>
        </div>

        <!-- Stats Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Posts</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{$totalPosts}}</p>
                        <p class="text-sm mt-1 text-green-600">+3 this month</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-blue-500">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Views</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{$totalViews}}</p>
                        <p class="text-sm mt-1 text-green-600">+15.3%</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-green-500">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm hover:shadow-md transition-shadow">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Likes</p>
                        <p class="text-2xl font-bold text-gray-900 mt-1">{{$totalLikes}}</p>
                        <p class="text-sm mt-1 text-green-600">+12.1%</p>
                    </div>
                    <div class="w-12 h-12 rounded-lg flex items-center justify-center bg-red-500">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>
                        </svg>
                    </div>
                </div>
            </div>

        </div>

        <!-- Recent Activity & Quick Actions -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Recent Activity</h3>

                <div class="space-y-4">
                    @foreach($recentActivity as $recent)
                    <div class="flex items-center p-3 bg-gray-50 rounded-lg">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center mr-3">
                            {{$recent['icon']}}
                        </div>

                        <div>
                                <p class="font-medium text-gray-900">{{$recent['message']}}</p>
                                <p class="text-sm text-gray-500">{{$recent['time']}}</p>
                        </div>

                    </div>
                    @endforeach
                </div>
            </div>

            <div class="bg-white rounded-xl p-6 shadow-sm">
                <h3 class="text-xl font-semibold text-gray-900 mb-6">Quick Actions</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('posts.create') }}" class="p-4 bg-orange-50 hover:bg-orange-100 rounded-lg transition-colors text-left">
                        <svg class="w-8 h-8 text-orange-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                        </svg>
                        <p class="font-medium text-gray-900">New Post</p>
                        <p class="text-sm text-gray-500">Create content</p>
                    </a>
                    <a href="{{ route('posts.index') }}" class="p-4 bg-blue-50 hover:bg-blue-100 rounded-lg transition-colors text-left">
                        <svg class="w-8 h-8 text-blue-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"/>
                        </svg>
                        <p class="font-medium text-gray-900">Browse Posts</p>
                        <p class="text-sm text-gray-500">Discover content</p>
                    </a>
                    <a href="{{ route('posts.mine') }}" class="p-4 bg-green-50 hover:bg-green-100 rounded-lg transition-colors text-left">
                        <svg class="w-8 h-8 text-green-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                        </svg>
                        <p class="font-medium text-gray-900">My Posts</p>
                        <p class="text-sm text-gray-500">Manage content</p>
                    </a>
                    <a href="#" class="p-4 bg-purple-50 hover:bg-purple-100 rounded-lg transition-colors text-left">
                        <svg class="w-8 h-8 text-purple-500 mb-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"/>
                        </svg>
                        <p class="font-medium text-gray-900">Analytics</p>
                        <p class="text-sm text-gray-500">View stats</p>
                    </a>
                </div>
            </div>
        </div>
    </div>

@endsection

