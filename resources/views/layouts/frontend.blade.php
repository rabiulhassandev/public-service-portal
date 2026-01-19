<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- SEO Meta Tags -->
    <title>@yield('title', settings('site_title', 'Hello UNO')) - {{ settings('site_tagline', 'Public Service Portal') }}</title>
    <meta name="description" content="@yield('meta_description', settings('site_description', 'Welcome to Hello UNO, the official public service portal for Satkania Upazila. Submit complaints, track status, and access government services transparently.'))">
    <meta name="keywords" content="@yield('meta_keywords', settings('site_keywords', 'Hello UNO, Satkania, Upazila, Public Service, Complaint, Governance, Bangladesh, Digital Service'))">
    <meta name="author" content="{{ settings('site_author', 'Satkania Upazila Administration') }}">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:title" content="@yield('title', settings('site_title', 'Hello UNO')) - {{ settings('site_tagline', 'Public Service Portal') }}">
    <meta property="og:description" content="@yield('meta_description', settings('site_description', 'Welcome to Hello UNO, the official public service portal for Satkania Upazila.'))">
    <meta property="og:image" content="@yield('meta_image', asset('images/logo.png'))">

    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url()->current() }}">
    <meta property="twitter:title" content="@yield('title', settings('site_title', 'Hello UNO')) - {{ settings('site_tagline', 'Public Service Portal') }}">
    <meta property="twitter:description" content="@yield('meta_description', settings('site_description', 'Welcome to Hello UNO, the official public service portal for Satkania Upazila.'))">
    <meta property="twitter:image" content="@yield('meta_image', asset('images/logo.png'))">

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('favicon.ico') }}">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <!-- load bangla font -->
    @if(app()->getLocale() == 'bn')
        <link href="{{ asset('fonts/SolaimanLipi/font.css') }}" rel="stylesheet">
    @endif
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <style>
        .glass-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }
        @keyframes pulse-slow {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.1); }
        }
        .animate-pulse-slow {
            animation: pulse-slow 6s infinite ease-in-out;
        }
        @keyframes fade-in-up {
            0% { opacity: 0; transform: translateY(20px); }
            100% { opacity: 1; transform: translateY(0); }
        }
        .animate-fade-in-up {
            animation: fade-in-up 0.8s ease-out forwards;
            opacity: 0; /* Start hidden */
        }
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-bounce-slow {
            animation: bounce-slow 3s infinite ease-in-out;
        }
        .perspective-1000 {
            perspective: 1000px;
        }
        .rotate-y-12 {
            transform: rotateY(-12deg);
        }
        .rotate-x-6 {
            transform: rotateX(6deg);
        }
    </style>
    @stack('styles')
</head>
<body class="antialiased font-sans text-gray-800 bg-gray-50">

    <!-- Header -->
    <header class="absolute top-0 w-full z-50 transition-all duration-300" x-data="{ mobileMenuOpen: false }">
        <div class="container mx-auto px-6 py-4">
            <div class="bg-white/10 backdrop-blur-md rounded-2xl px-6 py-3 flex justify-between items-center border border-white/20 shadow-lg relative">
                <div class="flex items-center gap-3">
                    <div class="w-10 h-10 flex items-center justify-center overflow-hidden">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                    </div>
                    <div class="hidden sm:block">
                        <h1 class="text-white font-bold text-lg leading-none tracking-wide">{{ settings('site_title', 'Hello UNO') }}</h1>
                        <!-- <p class="text-white text-xs font-light tracking-wider">Public Service Portal</p> -->
                    </div>
                </div>

                <!-- Desktop Nav -->
                <nav class="hidden lg:flex items-center gap-8 text-sm font-medium text-white/90">
                    <a href="{{ url('/') }}" class="hover:text-white transition-colors relative group">
                        {{ settings('nav_home', 'Home') }}
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('about') }}" class="hover:text-white transition-colors relative group">
                        {{ settings('nav_about', 'About') }}
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
                    </a>
                    <a href="{{ (Auth::user()->role ?? null) === 'admin' ? route('admin.complaints.index') : route('complaints.create') }}" class="hover:text-white transition-colors relative group">
                        {{ settings('nav_complaints', 'Complaints') }}
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('gallery') }}" class="hover:text-white transition-colors relative group">
                        {{ settings('nav_gallery', 'Gallery') }}
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
                    </a>
                    <a href="{{ route('contact') }}" class="hover:text-white transition-colors relative group">
                        {{ settings('nav_contact', 'Contact') }}
                        <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-white transition-all group-hover:w-full"></span>
                    </a>
                </nav>

                <div class="hidden lg:flex items-center gap-4">
                    <!-- Language Switcher -->
                    <div class="relative group">
                        <button class="flex items-center gap-2 text-white/90 hover:text-white text-sm font-medium bg-white/10 px-3 py-1.5 rounded-lg border border-white/10 transition-all hover:bg-white/20">
                            @if(app()->getLocale() == 'en')
                                <span>🇺🇸 EN</span>
                            @else
                                <span>🇧🇩 BN</span>
                            @endif
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 opacity-70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <div class="absolute right-0 mt-1 w-32 bg-white rounded-xl shadow-xl border border-gray-100 overflow-hidden hidden group-hover:block transform origin-top-right transition-all z-50">
                            <a href="{{ url('/lang/en') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-bd-green">English</a>
                            <a href="{{ url('/lang/bn') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-emerald-50 hover:text-bd-green">বাংলা</a>
                        </div>
                    </div>

                    @auth
                        @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                           class="bg-white text-bd-green px-5 py-2 rounded-lg text-sm font-bold shadow-lg hover:bg-emerald-50 transition-all transform hover:-translate-y-0.5">
                            {{ settings('nav_admin', 'Admin Panel') }}
                        </a>
                        @endif
                    @else
                        <a href="{{ route('login') }}"
                           class="bg-white text-red-500 px-5 py-2 rounded-lg text-sm font-bold shadow-lg hover:bg-emerald-50 transition-all transform hover:-translate-y-0.5">
                            {{ settings('nav_login', 'Login') }}
                        </a>
                    @endauth
                </div>

                <!-- Mobile Menu Button -->
                <button @click="mobileMenuOpen = !mobileMenuOpen" class="lg:hidden text-white focus:outline-none">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
            </div>
        </div>

        <!-- Mobile Menu Overlay -->
        <div x-show="mobileMenuOpen"
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             @click.away="mobileMenuOpen = false"
             class="lg:hidden absolute top-24 left-0 w-full px-6 z-40">
            <div class="bg-white/95 backdrop-blur-xl rounded-2xl shadow-2xl border border-white/50 overflow-hidden">
                <div class="p-6 flex flex-col gap-4">
                    <a href="{{ url('/') }}" class="text-gray-800 font-medium hover:text-white transition-colors py-2 border-b border-gray-100">
                        {{ settings('nav_home', 'Home') }}
                    </a>
                    <a href="{{ route('about') }}" class="text-gray-800 font-medium hover:text-white transition-colors py-2 border-b border-gray-100">
                        {{ settings('nav_about', 'About') }}
                    </a>
                    <a href="{{ (Auth::user()->role ?? null) === 'admin' ? route('admin.complaints.index') : route('complaints.create') }}" class="text-gray-800 font-medium hover:text-white transition-colors py-2 border-b border-gray-100">
                        {{ settings('nav_complaints', 'Complaints') }}
                    </a>
                    <a href="{{ route('gallery') }}" class="text-gray-800 font-medium hover:text-white transition-colors py-2 border-b border-gray-100">
                        {{ settings('nav_gallery', 'Gallery') }}
                    </a>
                    <a href="{{ route('contact') }}" class="text-gray-800 font-medium hover:text-white transition-colors py-2 border-b border-gray-100">
                        {{ settings('nav_contact', 'Contact') }}
                    </a>

                    <!-- Mobile Language Switcher -->
                    <div class="flex gap-4 py-2">
                        <a href="{{ url('/lang/en') }}" class="flex-1 text-center py-2 rounded-lg {{ app()->getLocale() == 'en' ? 'bg-bd-green text-white' : 'bg-gray-100 text-gray-600' }}">English</a>
                        <a href="{{ url('/lang/bn') }}" class="flex-1 text-center py-2 rounded-lg {{ app()->getLocale() == 'bn' ? 'bg-bd-green text-white' : 'bg-gray-100 text-gray-600' }}">বাংলা</a>
                    </div>

                    @auth
                        @if(Auth::user()->role === 'admin')
                        <a href="{{ route('admin.dashboard') }}" class="bg-bd-green text-white text-center py-3 rounded-xl font-bold hover:bg-bd-green-dark transition">
                            {{ settings('nav_admin', 'Admin Panel') }}
                        </a>
                        @endif
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="w-full bg-red-50 text-red-600 text-center py-3 rounded-xl font-bold hover:bg-red-100 transition">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="bg-bd-green text-white text-center py-3 rounded-xl font-bold hover:bg-bd-green-dark transition">
                            {{ settings('nav_login', 'Login') }}
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </header>

    @yield('content')

    <!-- Footer -->
    <footer class="bg-gray-950 text-white pt-20 pb-10 border-t border-gray-900">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-12 mb-16">
                <!-- Brand -->
                <div class="col-span-1 md:col-span-2">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-10 h-10 flex items-center justify-center overflow-hidden">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-full h-full object-contain">
                        </div>
                        <div>
                            <h4 class="text-xl font-bold">{{ settings('footer_brand', 'Upazila Administration') }}</h4>
                            <p class="text-gray-500 text-xs uppercase tracking-wider">{{ settings('footer_subbrand', 'Government of Bangladesh') }}</p>
                        </div>
                    </div>
                    <p class="text-gray-400 text-sm leading-relaxed max-w-md mb-8">
                        {{ settings('footer_about', 'Serving with transparency...') }}
                    </p>
                    <div class="flex gap-4">
                        <a href="{{ settings('facebook_link', '#') }}" class="w-10 h-10 rounded-full bg-gray-900 flex items-center justify-center text-gray-400 hover:bg-bd-green hover:text-white transition-all">
                            <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true"><path fill-rule="evenodd" d="M22 12c0-5.523-4.477-10-10-10S2 6.477 2 12c0 4.991 3.657 9.128 8.438 9.878v-6.987h-2.54V12h2.54V9.797c0-2.506 1.492-3.89 3.777-3.89 1.094 0 2.238.195 2.238.195v2.46h-1.26c-1.243 0-1.63.771-1.63 1.562V12h2.773l-.443 2.89h-2.33v6.988C18.343 21.128 22 16.991 22 12z" clip-rule="evenodd"></path></svg>
                        </a>
                    </div>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-lg font-bold text-white mb-6">{{ settings('footer_quick_links', 'Quick Links') }}</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li><a href="{{ url('/') }}" class="hover:text-bd-green-light transition flex items-center gap-2"><span class="w-1.5 h-1.5 bg-bd-green rounded-full"></span> {{ settings('nav_home', 'Home') }}</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-bd-green-light transition flex items-center gap-2"><span class="w-1.5 h-1.5 bg-bd-green rounded-full"></span> {{ settings('nav_about', 'About Us') }}</a></li>
                        <li><a href="#" class="hover:text-bd-green-light transition flex items-center gap-2"><span class="w-1.5 h-1.5 bg-bd-green rounded-full"></span> {{ settings('nav_complaints', 'Complaints') }}</a></li>
                        <li><a href="{{ route('gallery') }}" class="hover:text-bd-green-light transition flex items-center gap-2"><span class="w-1.5 h-1.5 bg-bd-green rounded-full"></span> {{ settings('nav_gallery', 'Gallery') }}</a></li>
                        <li><a href="{{ route('contact') }}" class="hover:text-bd-green-light transition flex items-center gap-2"><span class="w-1.5 h-1.5 bg-bd-green rounded-full"></span> {{ settings('nav_contact', 'Contact') }}</a></li>
                    </ul>
                </div>

                <!-- Contact Info -->
                <div>
                    <h4 class="text-lg font-bold text-white mb-6">{{ settings('service_3_title', 'Contact Us') }}</h4>
                    <ul class="space-y-4 text-gray-400 text-sm">
                        <li class="flex items-start gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-bd-green mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span>{{ settings('footer_address', 'Upazila Administration Office, Main Road') }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-bd-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                            <span>{{ settings('contact_phone', '+880 1XXX-XXXXXX') }}</span>
                        </li>
                        <li class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-bd-green" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span>{{ settings('contact_email', 'info@upazila.gov.bd') }}</span>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="border-t border-gray-900 pt-8 flex flex-col md:flex-row justify-between items-center gap-4">
                <p class="text-gray-600 text-sm">
                    &copy; {{ date('Y') }} Upazila Administration. All rights reserved.
                </p>
                <div class="flex gap-6 text-sm text-gray-600">
                    <a href="#" class="hover:text-white transition">Privacy Policy</a>
                    <a href="#" class="hover:text-white transition">Terms of Service</a>
                </div>
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
