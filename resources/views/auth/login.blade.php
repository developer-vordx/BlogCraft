@extends('layouts.app')

@section('title', 'Login')

@section('content')
<body class="bg-gray-100 font-sans">

<div class="flex flex-col items-center justify-center min-h-screen p-4">
    <div class="bg-white w-full max-w-md rounded-2xl shadow-xl p-6 sm:p-10">

        <!-- Logo & Progress Bar -->
        <div class="flex flex-col items-center w-full mb-10">
            <!-- Logo -->
            <div class="mb-4">
                <h1 class="text-3xl font-bold text-orange-600">BlogCraft</h1>
            </div>

        </div>

        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold">LOGIN</h2>
            <a href="{{ route('register') }}" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">REGISTER</a>
        </div>

        @include('layouts.errors')

        <!-- Login Form -->
        <form class="space-y-5" action="{{ route('submit.login') }}" method="post">
            @csrf
            <!-- Email -->
            <div>
                <input type="email" name="email" placeholder="Email*" value="{{ old('email') }}"
                       class="w-full p-3 border rounded-md @error('email') border-red-500 @enderror" required />
                @error('email')
                <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Password -->
            <div>
                <input type="password" name="password" placeholder="Password*"
                       class="w-full p-3 border rounded-md @error('password') border-red-500 @enderror" required />
                @error('password')
                <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Remember & Forgot -->
            <div class="flex justify-between items-center text-sm text-gray-700">
                <label class="flex items-center space-x-2">
                    <input type="checkbox" />
                    <span>Remember me</span>
                </label>
                <a href="{{ route('password.request') }}" class="text-blue-600 hover:underline">Forgot Password?</a>
            </div>

            <!-- Submit -->
            <button type="submit" class="w-full bg-orange-500 hover:bg-orange-600 text-white py-3 rounded-md font-medium">
                LOGIN
            </button>
        </form>
    </div>
</div>

</body>

@endsection
