@extends('admin.layouts.app')

@section('title', 'User Details')

@section('content')
    <div class="flex-1 p-8">
        <h1 class="text-3xl font-bold text-gray-900 mb-6">Tenants Details</h1>

        <div class="bg-white shadow rounded-lg p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <h2 class="text-gray-600 font-semibold"> Name</h2>
                    <p class="text-lg text-gray-800">{{ $tenant->name }}</p>
                </div>

                <div>
                    <h2 class="text-gray-600 font-semibold">Slug</h2>
                    <p class="text-lg text-gray-800">{{ $tenant->slug }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Tenant</h2>
                    <p class="text-lg text-gray-800">{{ $tenant->name ?? '—' }}</p>
                </div>
                <div>
                    <h2 class="text-gray-600 font-semibold">Total Posts</h2>
                    <p class="text-lg text-gray-800">{{ $tenant->posts->count() }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection
