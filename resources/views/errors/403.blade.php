<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.header')
</head>
<body class="bg-gray-50 min-h-screen flex items-center justify-center">
    <div class="text-center">
        <h1 class="text-6xl font-bold text-gray-800 mb-2">403</h1>
        <h2 class="text-2xl font-semibold text-gray-700 mb-4">Access Forbidden</h2>
        <p class="text-gray-600 mb-6">
            You don't have permission to access this resource.
        </p>
        
        <button onclick="history.back()" 
                class="bg-emerald-500 text-white py-3 px-6 rounded-lg hover:bg-emerald-600 transition font-semibold">
            Go Back
        </button>
    </div>
</body>
</html>