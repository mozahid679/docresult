<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Result</title>
    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet"
        integrity="sha512-iecdLmaskl7CVkqkXNQ/ZmCULaMxtR+... (truncated for brevity) ..." crossorigin="anonymous"
        referrerpolicy="no-referrer" />

    <!-- Styles / Scripts -->
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @else
    @endif
</head>

<body class="flex flex-col items-center bg-gradient-to-br from-green-50 to-blue-50 text-[#1b1b18] lg:justify-center">
    <header class="not-has-[nav]:hidden mb-8 w-full max-w-full text-sm lg:max-w-full">

        <div class="flex items-center justify-around bg-indigo-400 p-2">
            <a class="flex flex-col items-center space-x-3" href="/">
                <img class="h-12 w-12" src="img/logo.png" alt="govt">
                <p class="pt-2">স্বাস্থ্য ও পরিবার কল্যাণ মন্ত্রানালয়</p>
            </a>
            <div class="p-2 text-center text-black">
                <h2 class="mb-2 text-xl font-semibold text-gray-950">স্বাস্থ্য শিক্ষা অধিদপ্তর</h2>
                <h2 class="mb-2 text-lg font-semibold text-gray-950">স্বাস্থ্য শিক্ষা ও পরিবার কল্যাণ বিভাগ</h2>
                <p class="text-sm text-gray-950">স্বাস্থ্য ও পরিবার কল্যাণ মন্ত্রানালয় </p>
            </div>
            <div class="flex items-center justify-around bg-indigo-400 py-2">
                <p class="text-black">গণপ্রজাতন্ত্রী বাংলাদেশ</p>
            </div>
        </div>
        @if (Route::has('login'))
            <nav class="border-b border-white bg-white/10 shadow-sm backdrop-blur-md print:hidden">
                <div
                    class="container flex items-center justify-end px-4 py-2 md:justify-center lg:mx-auto lg:justify-center lg:px-8">
                    <!-- Desktop Navigation Menu -->
                    <div class="hidden items-center space-x-2 md:flex lg:space-x-8">
                        @php
                            $currentPath = request()->path();
                            $activeClass =
                                'text-indigo-600 font-semibold lg:text-lg text-md border-b-3 border-indigo-600';
                            $inactiveClass = 'text-gray-700 lg:text-lg text-md hover:text-indigo-600';
                        @endphp

                        <a class="{{ in_array($currentPath, ['/', '/*']) ? $activeClass : $inactiveClass }} transition-colors duration-200"
                            href="/">
                            ফলাফল
                        </a>

                        {{-- <a class="{{ in_array($currentPath, ['introduction', 'introduction/*']) ? $activeClass : $inactiveClass }} transition-colors duration-200"
                            href="/introduction">
                            পরিচিতি
                        </a> --}}

                    </div>


                    <!-- Auth Buttons -->
                    {{-- <div class="hidden items-center space-x-4 md:flex">
                        @auth
                            <a class="font-semibold text-green-600 transition-colors duration-200 hover:text-green-700"
                                href="{{ url('/dashboard') }}">
                                Admin Panel
                            </a>
                            <!-- Authentication -->
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <a class="cursor-pointer font-semibold text-green-600 transition-colors duration-200 hover:text-green-700"
                                    :href="route('logout')"
                                    onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        @else
                            <a class="inline-block rounded-lg border border-green-600 px-4 py-2 text-sm font-semibold leading-normal text-green-600 transition-colors duration-200 hover:bg-green-50"
                                href="{{ route('login') }}">
                                Log in
                            </a>

                            @if (Route::has('register'))
                                <a class="inline-block rounded-lg bg-green-600 px-4 py-2 text-sm font-semibold leading-normal text-black transition-colors duration-200 hover:bg-green-700"
                                    href="{{ route('register') }}">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </div> --}}

                    <!-- Mobile Menu Button -->
                    <div class="md:hidden">
                        <button class="p-2 text-gray-700 hover:text-green-600" id="mobile-menu-button">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M4 6h16M4 12h16M4 18h16"></path>
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile Menu -->
                <div class="hidden border-t border-gray-200 bg-white md:hidden" id="mobile-menu">
                    <div class="container mx-auto px-2 py-2">
                        <a class="block font-bold text-gray-700 transition-colors duration-200 hover:text-green-600"
                            href="/">
                            ফলাফল
                        </a>
                        {{-- <a class="block py-2 font-bold text-gray-700 transition-colors duration-200 hover:text-green-600"
                            href="/introduction">
                            পরিচিতি
                        </a> --}}
                    </div>
                </div>
            </nav>

            <script>
                // Mobile menu functionality
                document.getElementById('mobile-menu-button').addEventListener('click', function() {
                    const mobileMenu = document.getElementById('mobile-menu');
                    mobileMenu.classList.toggle('hidden');
                });

                // Close mobile menu when clicking outside
                document.addEventListener('click', function(event) {
                    const mobileMenu = document.getElementById('mobile-menu');
                    const mobileMenuButton = document.getElementById('mobile-menu-button');

                    if (mobileMenu && mobileMenuButton && !mobileMenu.contains(event.target) && !mobileMenuButton.contains(
                            event.target)) {
                        mobileMenu.classList.add('hidden');
                    }
                });

                // Smooth scrolling for navigation links
                document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                    anchor.addEventListener('click', function(e) {
                        e.preventDefault();
                        const target = document.querySelector(this.getAttribute('href'));
                        if (target) {
                            target.scrollIntoView({
                                behavior: 'smooth',
                                block: 'start'
                            });
                            // Close mobile menu after clicking
                            const mobileMenu = document.getElementById('mobile-menu');
                            if (mobileMenu) {
                                mobileMenu.classList.add('hidden');
                            }
                        }
                    });
                });

                // Navbar background on scroll
                window.addEventListener('scroll', function() {
                    const nav = document.querySelector('nav');
                    if (window.scrollY > 100) {
                        nav.classList.add('bg-white', 'shadow-lg');
                        nav.classList.remove('bg-white/95');
                    } else {
                        nav.classList.remove('bg-white', 'shadow-lg');
                        nav.classList.add('bg-white/95');
                    }
                });
            </script>
        @endif
    </header>
