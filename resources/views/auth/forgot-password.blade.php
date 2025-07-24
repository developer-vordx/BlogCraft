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

            <h2 class="mt-4 text-xl font-bold text-gray-700">Forgot Password</h2>
            <p class="text-sm text-gray-600 text-center mt-2">
                Enter your registered email and we'll send you instructions to reset your password.
            </p>
        </div>
        @include('layouts.errors')
        <!-- Form -->
        <form class="space-y-5" action="{{ route('password.email') }}" method="post">
            @csrf
            <input type="email" name="email" placeholder="Email*" value="{{ old('email') }}"
                   class="w-full p-3 border rounded-md @error('email') border-red-500 @enderror" required />
            @error('email')
            <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
            @enderror
            <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-md font-medium hover:bg-orange-600">
                Send Reset Link
            </button>

            <div class="text-center text-sm mt-4">
                <a href="/login" class="text-blue-600 hover:underline">Back to Login</a>
            </div>
        </form>

    </div>
</div>
</body>
@endsection
