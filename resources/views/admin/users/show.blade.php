@extends('admin.layouts.app')

@section('title', 'User Details')

@section('content')
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">User Details</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-gray-600 font-semibold">First Name</h2>
                    <p class="text-lg text-gray-800">{{ $user->first_name }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Last Name</h2>
                    <p class="text-lg text-gray-800">{{ $user->last_name }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Email</h2>
                    <p class="text-lg text-gray-800">{{ $user->email }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Tenant</h2>
                    <p class="text-lg text-gray-800">{{ $user->tenant->name ?? '—' }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Total Posts</h2>
                    <p class="text-lg text-gray-800">{{ $user->posts->count() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
