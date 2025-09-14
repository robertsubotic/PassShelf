<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        @include('partials.header')
    </head>
    <body class="antialiased bg-gray-50">
        <!-- Navigation -->
        <nav class="bg-white shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between h-16">
                    <div class="flex items-center">
                        <span class="text-2xl font-bold text-emerald-500">PassShelf</span>
                    </div>

                    <div class="flex items-center">
                        @if (Route::has('login'))
                            @auth
                                <a href="{{ url(path: '/home') }}" class="text-gray-700 hover:text-emerald-500 px-3 py-2 rounded-md text-sm font-medium">Dashboard</a>
                            @else
                                asdf
                                <a href="{{ route('login') }}" class="text-gray-700 hover:text-emerald-500 px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                                @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md text-white bg-emerald-600 hover:bg-emerald-700">Register</a>
                                @endif
                            @endauth
                        @endif
                        @if (Route::has('login'))
                            asdf
                            @auth
                                <div>AUTH BLOCK</div>
                            @else
                                <div>ELSE BLOCK</div>
                            @endauth
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        <!-- Hero Section -->
        <div class="relative bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto">
                <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-2xl lg:w-full lg:pb-28 xl:pb-32">
                    <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">

                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block">Secure Your Passwords</span>
                            <span class="block text-emerald-500">With PassShelf</span>
                        </h1>
                        <p class="mt-3 text-base text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                            Your personal password manager that helps you keep your digital life secure and organized. Store, generate, and access your passwords safely from anywhere.
                        </p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-start">
                            <div class="rounded-md shadow">
                            <!--

                            -->
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <a href="#features" class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-emerald-700 bg-emerald-100 hover:bg-emerald-200 md:py-4 md:text-lg md:px-10">
                                    Learn More
                                </a>
                            </div>
                        </div>
                    </main>
                </div>
            </div>

            <!-- Features Section -->
            <div class="py-12 bg-white" id="features">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="lg:text-center">
                        <h2 class="text-base text-emerald-500 font-semibold tracking-wide uppercase">Features</h2>
                        <p class="mt-2 text-3xl leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">
                            Everything you need to manage your passwords
                        </p>
                    </div>

                    <div class="mt-10">
                        <dl class="space-y-10 md:space-y-0 md:grid md:grid-cols-3 md:gap-x-8 md:gap-y-10">
                            <div class="relative">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-emerald-500 text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Secure Storage</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Your passwords are encrypted and stored securely using industry-standard encryption.
                                </dd>
                            </div>

                            <div class="relative">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-emerald-500 text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Password Generator</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Generate strong, unique passwords with our built-in password generator.
                                </dd>
                            </div>

                            <div class="relative">
                                <dt>
                                    <div class="absolute flex items-center justify-center h-12 w-12 rounded-md bg-emerald-500 text-white">
                                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                    <p class="ml-16 text-lg leading-6 font-medium text-gray-900">Cross-Platform Access</p>
                                </dt>
                                <dd class="mt-2 ml-16 text-base text-gray-500">
                                    Access your passwords from any device, anytime, anywhere.
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <footer class="bg-white">
                <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 md:flex md:items-center md:justify-between lg:px-8">
                    <div class="flex justify-center space-x-6 md:order-2">
                        <span class="text-base text-gray-500">&copy; 2025 PassShelf. All rights reserved.</span>
                    </div>
                </div>
            </footer>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
