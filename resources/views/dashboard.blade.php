<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.header')
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <h1 class="text-2xl font-bold mb-4">Welcome, {{ auth()->user()->name }}</h1>
        <div class="mb-6">
            <form action="{{ route('password.store') }}" method="POST" class="flex flex-col space-y-3 bg-white p-4 rounded-xl shadow-md">
                @csrf
                <input 
                    type="text" 
                    name="service_name" 
                    placeholder="Service Name *"
                    maxlength="255" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                />
                <input 
                    type="text" 
                    name="username_email" 
                    placeholder="Username / Email"
                    maxlength="255" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                />
                <input 
                    type="password" 
                    name="password" 
                    placeholder="Password *" 
                    class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none"
                />
                <button 
                    type="submit" 
                    class="bg-emerald-500 text-white text-sm font-semibold py-2 rounded-lg hover:bg-emerald-600 transition"
                >
                    + Add Password
                </button>
            </form>        
        </div>

        @if (session('success'))
            <div class="bg-gray-100 text-green-800 px-4 py-2 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif
        
        @if ($errors->any())
            <div class="bg-red-100 text-red-700 px-4 py-2 rounded mb-4">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <h2 class="text-lg font-semibold mb-2">Your Passwords</h2>
        <div class="overflow-x-auto">
            <table class="min-w-full border border-gray-200 rounded-lg">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Service Name</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Username / Email</th>
                        <th class="px-4 py-2 text-left text-sm font-medium text-gray-700">Password</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($passwords as $password)
                        <tr>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                {{ $password->service_name }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                {{ $password->username_email ?? '-' }}
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                <div class="relative flex items-center">
                                    <input
                                        type="password"
                                        value="{{ Crypt::decryptString($password->password) }}"
                                        readonly
                                        class="border border-gray-300 rounded-lg px-2 py-1 text-sm text-gray-600 w-32 focus:outline-none"
                                    />
                                    <button
                                        type="button"
                                        class="left-32 text-gray-500 hover:text-gray-700 focus:outline-none"
                                        onclick="togglePassword(this)"
                                    >
                                        Show
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            <button onclick="location.href='{{ route('signout') }}'" class="text-sm text-gray-500 hover:text-emerald-600">Sign Out</button>
        </div>
    </div>
<script>
function togglePassword(button) {
    const input = button.previousElementSibling;
    if (input.type === "password") {
        input.type = "text";
        button.textContent = "Hide"; 
    } else {
        input.type = "password";
        button.textContent = "Show"; 
    }
}
</script>
</body>
</html>