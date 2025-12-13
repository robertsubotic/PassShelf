<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    @include('partials.header')
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="max-w-5xl mx-auto mt-10 p-6 bg-white rounded shadow">
        <div class="flex justify-between items-center mb-4">
        <h1 class="text-2xl font-bold">
            Welcome, {{ auth()->user()->name }}
        </h1>
        <div class="flex space-x-4">
            <a href="{{ route('profile', auth()->user()->id) }}" 
                class="text-emerald-600 hover:underline">
                View Profile
            </a>
            <a href="{{ route('account') }}" 
                class="text-emerald-600 hover:underline">
                Edit Account
            </a>
        </div>
        </div>
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
                <div class="flex items-center space-x-2">
                    <input 
                        type="password" 
                        name="password" 
                        id="password-input"
                        placeholder="Password *" 
                        class="border border-gray-300 rounded-lg px-3 py-2 text-sm focus:ring-emerald-500 focus:border-emerald-500 outline-none flex-1"
                    />
                    <button
                        type="button"
                        class="text-gray-500 hover:text-gray-700 focus:outline-none text-xs px-2 py-1 rounded"
                        onclick="togglePassword(this)"
                    >
                        Show
                    </button>
                    <button 
                        type="button"
                        onclick="generatePassword()"
                        class="text-xs bg-gray-200 hover:bg-gray-800 hover:text-white text-gray-700 px-2 py-1 rounded transition"
                        style="white-space: nowrap;"
                    >
                        Generate a Secure Password
                    </button>
                </div>
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
                @foreach ($errors->all() as $error)
                    {{ $error }}
                    <br />
                @endforeach
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
                        <tr id="row-{{ $password->id }}">
                            <td class="px-4 py-2 text-sm text-gray-800">
                                <span class="view-mode">{{ $password->service_name }}</span>
                                <input type="text" class="edit-mode hidden border border-gray-300 rounded-lg px-2 py-1 text-sm w-full" value="{{ $password->service_name }}" data-field="service_name" />
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                <span class="view-mode">{{ $password->username_email ?? '-' }}</span>
                                <input type="text" class="edit-mode hidden border border-gray-300 rounded-lg px-2 py-1 text-sm w-full" value="{{ $password->username_email }}" data-field="username_email" />
                            </td>
                            <td class="px-4 py-2 text-sm text-gray-800">
                                <div class="relative flex items-center">
                                    <div class="view-mode flex items-center">
                                        <input
                                            type="password"
                                            value="{{ Crypt::decryptString($password->password) }}"
                                            readonly
                                            class="border border-gray-300 rounded-lg px-2 py-1 text-sm text-gray-600 w-64 focus:outline-none"
                                        />
                                        <button
                                            type="button"
                                            class="left-32 text-gray-500 hover:text-gray-700 focus:outline-none"
                                            onclick="togglePassword(this)"
                                        >
                                            Show
                                        </button>
                                    </div>
                                    <input type="password" class="edit-mode hidden border border-gray-300 rounded-lg px-2 py-1 text-sm w-64" value="{{ Crypt::decryptString($password->password) }}" data-field="password" />
                                    <button
                                        type="button"
                                        class="ml-2 text-gray-500 hover:text-blue-500 focus:outline-none flex items-center edit-btn"
                                        title="Edit"
                                        onclick="enableEdit({{ $password->id }})"
                                    >
                                        <svg class="w-5 h-5 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z"/>
                                        </svg>
                                    </button>
                                    <button
                                        type="button"
                                        class="ml-2 text-gray-500 hover:text-green-500 focus:outline-none flex items-center save-btn hidden"
                                        title="Save"
                                        onclick="saveEdit({{ $password->id }})"
                                    >
                                        <svg class="w-5 h-5 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"/>
                                        </svg>
                                    </button>
                                    <button
                                        type="button"
                                        class="ml-2 text-gray-500 hover:text-gray-700 focus:outline-none flex items-center cancel-btn hidden"
                                        title="Cancel"
                                        onclick="cancelEdit({{ $password->id }})"
                                    >
                                        <svg class="w-5 h-5 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                            <path d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"/>
                                        </svg>
                                    </button>
                                    <form
                                        action="{{ route('password.delete', $password->id) }}"
                                        method="POST"
                                        class="inline delete-btn"
                                        onsubmit="return confirm('Are you sure you want to delete this password?')"
                                    >
                                        @csrf
                                        <button
                                            type="submit"
                                            class="ml-2 text-gray-500 hover:text-red-500 focus:outline-none flex items-center"
                                            title="Delete"
                                        >
                                            <svg class="w-5 h-5 transition-colors" fill="currentColor" viewBox="0 0 20 20">
                                                <path d="M6 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm4 0a1 1 0 012 0v6a1 1 0 11-2 0V8zm2-5a1 1 0 00-1-1h-4a1 1 0 00-1 1v1H4a1 1 0 100 2h12a1 1 0 100-2h-2V3zM5 6v10a2 2 0 002 2h6a2 2 0 002-2V6H5z"/>
                                            </svg>
                                        </button>
                                    </form>
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
function generatePassword() {
    const passwordInput = document.getElementById('password-input');

    const lower = "abcdefghijklmnopqrstuvwxyz";
    const upper = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    const digits = "0123456789";
    const symbols = "!@#$%^&*()_+-=[]{}|;:,.<>?";
    const allChars = lower + upper + digits + symbols;
    const length = 16;

    const getRandomChar = (charset) => charset[Math.floor(crypto.getRandomValues(new Uint32Array(1))[0] / (0xffffffff + 1) * charset.length)];

    let password = [
        getRandomChar(lower),
        getRandomChar(upper),
        getRandomChar(digits),
        getRandomChar(symbols)
    ];

    for (let i = password.length; i < length; i++) {
        password.push(getRandomChar(allChars));
    }

    for (let i = password.length - 1; i > 0; i--) {
        const j = Math.floor(crypto.getRandomValues(new Uint32Array(1))[0] / (0xffffffff + 1) * (i + 1));
        [password[i], password[j]] = [password[j], password[i]];
    }

    passwordInput.value = password.join('');

}

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

function enableEdit(id) {
    const row = document.getElementById(`row-${id}`);
    row.querySelectorAll('.view-mode').forEach(el => el.classList.add('hidden'));
    row.querySelectorAll('.edit-mode').forEach(el => el.classList.remove('hidden'));
    row.querySelector('.edit-btn').classList.add('hidden');
    row.querySelector('.save-btn').classList.remove('hidden');
    row.querySelector('.cancel-btn').classList.remove('hidden');
    row.querySelector('.delete-btn').classList.add('hidden');
}

function cancelEdit(id) {
    const row = document.getElementById(`row-${id}`);
    row.querySelectorAll('.view-mode').forEach(el => el.classList.remove('hidden'));
    row.querySelectorAll('.edit-mode').forEach(el => el.classList.add('hidden'));
    row.querySelector('.edit-btn').classList.remove('hidden');
    row.querySelector('.save-btn').classList.add('hidden');
    row.querySelector('.cancel-btn').classList.add('hidden');
    row.querySelector('.delete-btn').classList.remove('hidden');
}

function saveEdit(id) {
    if (!confirm('Are you sure you want to save these changes?')) {
        return;
    }

    const row = document.getElementById(`row-${id}`);
    const serviceName = row.querySelector('[data-field="service_name"]').value;
    const usernameEmail = row.querySelector('[data-field="username_email"]').value;
    const password = row.querySelector('[data-field="password"]').value;

    fetch(`/password/update/${id}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': '{{ csrf_token() }}'
        },
        body: JSON.stringify({
            service_name: serviceName,
            username_email: usernameEmail,
            password: password
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error updating password');
        }
    })
    .catch(error => {
        alert('Error updating password');
    });
}
</script>
</body>
</html>
