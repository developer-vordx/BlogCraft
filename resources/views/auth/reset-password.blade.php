@extends('layouts.app')

@section('title', 'Login')

@section('content')
<body class="bg-gray-100 font-sans">
<div class="flex flex-col items-center justify-center min-h-screen p-4">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6 sm:p-10">

        <!-- Logo -->
        <div class="flex flex-col items-center mb-8">
            <div class="mb-4">
                <h1 class="text-3xl font-bold text-orange-600">BlogCraft</h1>
            </div>

            <h2 class="mt-4 text-xl font-bold text-gray-700">Reset Password</h2>
            <p class="text-sm text-gray-600 text-center mt-2">
                Set a new password for your account.
            </p>
        </div>
        @include('layouts.errors')
        <!-- Form -->
        <form class="space-y-5" action="{{ route('password.update') }}" method="post" >
            @csrf
            <input type="hidden" name="token" value="{{ $token }}">

            <input type="password" name="password" placeholder="New Password*" required class="w-full p-3 border rounded-md" />
            @error('password')
            <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
            @enderror
            <input type="password"  name="password_confirmation" placeholder="Confirm Password*" required class="w-full p-3 border rounded-md" />

            <ul class="text-sm mt-2 text-red-500 space-y-1 ml-2">
                <li>❗ At least 8 characters</li>
                <li>❗ At least one uppercase letter</li>
                <li>❗ At least one number</li>
            </ul>

            <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-md font-medium hover:bg-orange-600 mt-4">
                Reset Password
            </button>
        </form>

    </div>
</div>
</body>
@endsection
