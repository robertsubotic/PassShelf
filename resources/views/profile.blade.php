<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.header')
</head>
<body class="bg-gray-50 min-h-screen">
    <a href="{{ route('dashboard') }}" 
        class="text-emerald-600 hover:underline items-center mx-auto block w-max mt-2">
        Back to Dashboard
    </a>
    <div class="max-w-2xl mx-auto mt-4 p-6 bg-white rounded shadow">
        <div class="text-center mb-6">
            <div class="mb-4">
                <img 
                    src="https://www.gravatar.com/avatar/{{ md5(strtolower(trim($user->name))) }}?s=120&d=identicon&r=pg" 
                    alt="Profile Picture" 
                    class="w-30 h-30 rounded-full mx-auto border-4 border-gray"
                />
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">{{ $user->name }}</h1>
            <p class="text-gray-600 text-sm">Member since {{ $user->created_at->format('F j, Y') }}</p>
        </div>

        <div class="bg-gray-50 rounded-lg p-6">
            <h2 class="text-lg font-semibold text-gray-800 mb-4">Profile Information</h2>
            
            <div class="space-y-3">
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600 font-medium">Name:</span>
                    <span class="text-gray-800">{{ $user->name }}</span>
                </div>
                
                <div class="flex justify-between items-center py-2 border-b border-gray-200">
                    <span class="text-gray-600 font-medium">Account Created:</span>
                    <span class="text-gray-800">{{ $user->created_at->format('F j, Y \a\t g:i A') }}</span>
                </div>
                
                <div class="flex justify-between items-center py-2">
                    <span class="text-gray-600 font-medium">Member for:</span>
                    <span class="text-gray-800">{{ $user->created_at->diffForHumans() }}</span>
                </div>
            </div>
        </div>

        <div class="mt-6 text-center">
            @auth
                @if(auth()->user()->id === $user->id)
                    <a href="{{ route('account') }}" 
                        class="inline-block bg-emerald-500 text-white px-6 py-2 rounded-lg hover:bg-emerald-600 transition">
                        Edit Profile
                    </a>
                @endif
            @endauth
        </div>
    </div>
</body>
</html>