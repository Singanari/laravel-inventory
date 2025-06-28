@extends('layout')
@section('title', 'Login')
@section('content')
<div class="flex items-center justify-center min-h-[70vh] bg-gradient-to-br from-blue-200 to-blue-400">
    <div class="bg-white shadow-lg rounded-lg p-8 w-full max-w-md">
        <h2 class="text-2xl font-bold mb-6 text-center text-blue-700">Login Inventaris Gudang</h2>
        @if(session('status'))
            <div class="mb-4 text-red-600">{{ session('status') }}</div>
        @endif
        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="mb-4">
                <label for="email" class="block text-gray-700">Email</label>
                <input id="email" type="email" name="email" class="mt-1 block w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500" required autofocus>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-gray-700">Password</label>
                <input id="password" type="password" name="password" class="mt-1 block w-full rounded border-gray-300 focus:border-blue-500 focus:ring-blue-500" required>
            </div>
            <div class="mb-4 flex items-center">
                <input type="checkbox" name="remember" id="remember" class="mr-2">
                <label for="remember" class="text-gray-600">Ingat saya</label>
            </div>
            <button type="submit" class="w-full bg-blue-700 text-white py-2 rounded hover:bg-blue-800 font-semibold">Login</button>
        </form>
        <div class="mt-4 text-center">
            <a href="{{ route('register') }}" class="text-blue-700 hover:underline">Belum punya akun? Daftar</a>
        </div>
    </div>
</div>
@endsection 