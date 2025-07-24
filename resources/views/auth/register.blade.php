@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="flex flex-col items-center justify-center min-h-screen p-4">
        <div class="bg-white w-full max-w-2xl rounded-2xl shadow-xl p-6 sm:p-10">

            <!-- Logo & Progress Bar Section -->
            <div class="flex flex-col items-center w-full mb-8">
                <div class="mb-4">
                    <h1 class="text-3xl font-bold text-orange-600">BlogCraft</h1>
                </div>

                <div class="w-full">
                    <div class="flex justify-between text-xs sm:text-sm font-medium text-gray-700 mb-2">
                        <div class="flex items-center space-x-1 text-orange-600">
                            <div class="w-2 h-2 bg-orange-600 rounded-full"></div>
                            <span>Registration/Login</span>
                        </div>
                        <div>Email</div>
                    </div>
                    <div class="w-full h-2 bg-gray-200 rounded-full">
                        <div class="h-full bg-orange-500 rounded-full" style="width: 33%;"></div>
                    </div>
                </div>
            </div>

            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-2xl font-bold">REGISTRATION</h2>
                <a href="{{ route('login') }}" class="bg-orange-500 text-white px-4 py-2 rounded hover:bg-orange-600">LOGIN</a>
            </div>

            <!-- Success / Error Messages -->
            @include('layouts.errors')

            <!-- Form -->
            <form class="space-y-4" action="{{ route('submit.register') }}" method="post">
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
                    <input type="password" name="password" placeholder="Password*" value="{{ old('password') }}"
                           class="w-full p-3 border rounded-md @error('password') border-red-500 @enderror" required />
                    @error('password')
                    <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                    <ul class="text-sm mt-2 text-red-500 space-y-1 ml-2">
                        <li>❗ contains at least one uppercase letter</li>
                        <li>❗ contains at least one digit character</li>
                        <li>❗ contains at least one special character</li>
                        <li>❗ contains at least 8 characters</li>
                    </ul>
                </div>

                <!-- Password Confirmation -->
                <div>
                    <input type="password" name="password_confirmation"  value="{{ old('password_confirmation') }}" placeholder="Confirm Password*"
                           class="w-full p-3 border rounded-md" required />
                </div>

                <!-- Name fields -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="first_name" placeholder="First Name*" value="{{ old('first_name') }}"
                               class="p-3 border rounded-md @error('first_name') border-red-500 @enderror" required />
                        @error('first_name')
                        <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="last_name" placeholder="Last Name*" value="{{ old('last_name') }}"
                               class="p-3 border rounded-md @error('last_name') border-red-500 @enderror" required />
                        @error('last_name')
                        <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Phone fields -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="country_code" placeholder="Country Code*" value="{{ old('country_code') }}"
                               class="p-3 border rounded-md @error('country_code') border-red-500 @enderror" required />
                        @error('country_code')
                        <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="phone" placeholder="Phone*" value="{{ old('phone') }}"
                               class="p-3 border rounded-md @error('phone') border-red-500 @enderror" required />
                        @error('phone')
                        <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Address fields -->
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    <div>
                        <input type="text" name="country" placeholder="Country*" value="{{ old('country') }}"
                               class="p-3 border rounded-md @error('country') border-red-500 @enderror" required />
                        @error('country')
                        <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="city" placeholder="City*" value="{{ old('city') }}"
                               class="p-3 border rounded-md @error('city') border-red-500 @enderror" required />
                        @error('city')
                        <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="state" placeholder="State*" value="{{ old('state') }}"
                               class="p-3 border rounded-md @error('state') border-red-500 @enderror" required />
                        @error('state')
                        <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <input type="text" name="zip" placeholder="Zip*" value="{{ old('zip') }}"
                               class="p-3 border rounded-md @error('zip') border-red-500 @enderror" required />
                        @error('zip')
                        <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Address -->
                <div>
                    <input type="text" name="address" placeholder="Address*" value="{{ old('address') }}"
                           class="w-full p-3 border rounded-md @error('address') border-red-500 @enderror" required />
                    @error('address')
                    <p class="text-sm text-red-500 mt-1 ml-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Agreements -->
                <div class="space-y-3 text-sm text-gray-700 mt-4">
                    <label class="flex items-start space-x-2">
                        <input type="checkbox" name="terms" class="mt-1" {{ old('terms') ? 'checked' : '' }} required />
                        <span>I agree with the <a href="#" class="text-blue-600 underline">Terms</a> of BlogCraft</span>
                    </label>
                    <label class="flex items-start space-x-2">
                        <input type="checkbox" name="privacy" class="mt-1" {{ old('privacy') ? 'checked' : '' }} required />
                        <span>I agree with the <a href="#" class="text-blue-600 underline">Privacy Policy</a></span>
                    </label>
                    <label class="flex items-start space-x-2">
                        <input type="hidden" name="sharing" value="1" />

                    </label>
                </div>

                <!-- Submit -->
                <button type="submit" class="w-full mt-6 bg-gray-400 text-white py-3 rounded-md font-medium hover:bg-gray-500">
                    NEXT
                </button>
            </form>

        </div>
</div>

@endsection
