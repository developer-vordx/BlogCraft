<!-- Navigation Header -->

<nav class="bg-white shadow-sm border-b border-gray-200">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center h-16">
            <div class="flex items-center">
                <h1 class="text-xl font-bold text-gray-900">BlogCraft</h1>
                <span class="ml-3 px-2 py-1 bg-orange-100 text-orange-600 text-xs rounded-full font-medium">My Posts</span>
            </div>
            <div class="flex items-center space-x-4">

                <!-- User Profile Dropdown -->
                <div class="relative">
                    <button id="profile-btn" class="flex items-center space-x-2 p-2 rounded-lg hover:bg-gray-50 transition-colors">
                        <div class="w-8 h-8 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                            <span class="text-white text-sm font-semibold">{{\Illuminate\Support\Facades\Auth::user()->first_name}}</span>
                        </div>
                        <svg id="profile-chevron" class="w-4 h-4 text-gray-500 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>

                    <!-- Dropdown Menu -->
                    <div id="profile-dropdown" class="hidden absolute right-0 mt-2 w-64 bg-white rounded-xl shadow-lg border border-gray-200 py-2 z-50">
                        <!-- User Info -->
                        <div class="px-4 py-3 border-b border-gray-100">
                            <div class="flex items-center space-x-3">
                                <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-orange-600 rounded-full flex items-center justify-center">
                                    <span class="text-white font-semibold">{{\Illuminate\Support\Facades\Auth::user()->first_name}}</span>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-900">{{\Illuminate\Support\Facades\Auth::user()->first_name}}</p>
                                    <p class="text-sm text-gray-500">{{\Illuminate\Support\Facades\Auth::user()->email}}</p>
                                </div>
                            </div>
                        </div>

                        <!-- Menu Items -->
                        <div class="py-2">

                            <hr class="my-2 border-gray-100">
                            <form id="logout-form" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="w-full flex items-center px-4 py-2 text-red-600 hover:bg-red-50 transition-colors">
                                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                              d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                                    </svg>
                                    Logout
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>


