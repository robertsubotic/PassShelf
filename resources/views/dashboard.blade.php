<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.header')
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Welcome, {{ auth()->user()->name }}</h1>
        <div class="mb-6">
            <button class="bg-emerald-500 text-white px-4 py-2 rounded hover:bg-emerald-600">+ Add Password</button>
        </div>
        <h2 class="text-lg font-semibold mb-2">Your Passwords</h2>
        <ul class="divide-y divide-gray-200">
            <li class="py-2 flex justify-between">
                <span>Gmail</span>
                <span class="text-gray-500">••••••••</span>
            </li>
            <li class="py-2 flex justify-between">
                <span>Facebook</span>
                <span class="text-gray-500">••••••••</span>
            </li>
        </ul>
        <div class="mt-6">
            <button onclick="location.href='{{ route('signout') }}'" class="text-sm text-gray-500 hover:text-emerald-600">Sign Out</button>
        </div>
    </div>
</body>
</html>