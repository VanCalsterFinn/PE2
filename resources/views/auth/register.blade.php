@extends('layouts.app')

@section('content')
    <div class="flex justify-center py-20 w-full">
        <div class="flex justify-center items-center border-2 border-grey p-6 rounded-lg w-1/5">
            <form action="{{ route('register') }}" method="POST" class="w-full">
                @csrf   
                <div class="mb-4">
                    <label for="name" class="sr-only">Name</label>
                    <input type="text" name="name" id="name" placeholder="Your name"
                    class="w-full bg-gray-100 border-2 p-2 rounded-lg @error("name")
                        border-red-500
                    @enderror" value="{{ old('name') }}">
                    @error('name')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="username" class="sr-only">Username</label>
                    <input type="text" name="username" id="username" placeholder="Your username"
                    class="w-full bg-gray-100 border-2 p-2 rounded-lg @error("username")
                        border-red-500
                    @enderror" value="{{ old('username') }}">
                    @error('username')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="email" class="sr-only">Email</label>
                    <input type="text" name="email" id="email" placeholder="Your email"
                    class="w-full bg-gray-100 border-2 p-2 rounded-lg @error("email")
                        border-red-500
                    @enderror" value="{{ old('email') }}">
                    @error('email')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="sr-only">Password</label>
                    <input type="password" name="password" id="password" placeholder="Your password"
                    class="w-full bg-gray-100 border-2 p-2 rounded-lg @error("password")
                        border-red-500
                    @enderror" value="">
                    @error('password')
                        <div class="text-red-500 mt-2 text-sm">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password_confirmation" class="sr-only">Confirm password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Confirm your password"
                    class="w-full bg-gray-100 border-2 p-2 rounded-lg" value="">
                </div>
                <div class="">
                    <button type="submit" class="bg-blue-700 rounded w-48 h-8 text-white w-full">Register</button>
                </div>
            </form>
        </div>
    </div>
@endsection