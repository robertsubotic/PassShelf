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
        <h1 class="text-2xl font-bold mb-4">Account Details</h1>
        <div class="mb-6">
            <form action="{{ route('account.edit') }}" method="POST" class="flex flex-col space-y-3 bg-white p-4 rounded-xl shadow-md">
                @csrf
                <input 
                    type="text" 
                    name="accout_name"
                    value="{{ auth()->user()->name }}"
                    placeholder="Account Name"
                    maxlength="255" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                    required
                />
                <input 
                    type="email" 
                    name="account_email"
                    value="{{ auth()->user()->email }}" 
                    placeholder="Email"
                    maxlength="255" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                    required
                />
                <input 
                    type="password" 
                    name="account_password" 
                    id="password-input"
                    placeholder="Verify Password" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none flex-1"
                    required
                />
                <button 
                    type="submit" 
                    class="bg-emerald-500 text-white text-sm font-semibold py-2 rounded-lg hover:bg-emerald-600 transition"
                >
                    Save Changes
                </button>
            </form>       
        </div>
    </div>
    <div class="max-w-2xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Password</h1>
        <div class="mb-6">
            <form action="{{ route('account.change_password') }}" method="POST" class="flex flex-col space-y-3 bg-white p-4 rounded-xl shadow-md">
                @csrf
 				<input 
                    type="password" 
                    name="current_password" 
                    id="password-input"
                    placeholder="Current Password" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none flex-1"
                    required
                />
                <input 
                    type="password" 
                    name="new_password" 
                    id="password-input"
                    placeholder="New Password" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none flex-1"
                    required
                />
                <input 
                    type="password" 
                    name="new_password_confirmation" 
                    id="password-input"
                    placeholder="Verify New Password" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none flex-1"
                    required
                />
                <button 
                    type="submit" 
                    class="bg-emerald-500 text-white text-sm font-semibold py-2 rounded-lg hover:bg-emerald-600 transition"
                >
                    Change Password
                </button>
            </form>       
        </div>
    </div>
    @if (session('success'))
        <div class="bg-gray-100 text-green-800 px-4 py-2 rounded text-center mt-4 mx-auto w-max">
            {{ session('success') }}
        </div>
    @endif
    
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 px-4 py-2 rounded text-center mt-4 mx-auto w-max">
            @foreach ($errors->all() as $error)
                {{ $error }}
                <br />
            @endforeach
        </div>
    @endif
</body>
</html>