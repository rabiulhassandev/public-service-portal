@extends('layouts.frontend')

@section('title', settings('about_title', 'About Us - Satkania Upazila'))
@section('meta_description', settings('about_meta_desc', 'Learn about Satkania Upazila Administration, our mission, leadership, and commitment to public service.'))
@section('meta_keywords', settings('about_meta_keywords', 'About Satkania, UNO Profile, Administration, Leadership, Mission'))

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="padding: 40px 10px;">
        <div class="absolute inset-0 bg-[#006A4E]">
            <img 
                src="{{ asset('images/gallery-bg.jpg') }}" 
                alt="Gallery Background" 
                class="w-full h-full object-cover opacity-30"
            >
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30"></div>
        
        <div class="relative h-full flex items-center justify-center text-center px-6 pt-20">
            <div class="max-w-3xl">
                <h2 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg animate-fade-in-up">{{ settings('page_about_heading', 'About Us') }}</h2>
                <p class="text-xl text-white/90 drop-shadow-md animate-fade-in-up" style="animation-delay: 0.2s">{{ settings('page_about_subtitle', 'Dedicated to serving the people of our Upazila') }}</p>
            </div>
        </div>
    </section>

    <!-- Who We Are -->
    <section class="py-20 bg-white">
        <div class="container mx-auto px-6">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2">
                    <div class="relative">
                        <div class="absolute -top-4 -left-4 w-24 h-24 bg-bd-green/20 rounded-full blur-xl"></div>
                        <div class="absolute -bottom-4 -right-4 w-32 h-32 bg-teal-100 rounded-full blur-xl"></div>
                        <div class="relative bg-gray-100 rounded-2xl p-2 shadow-xl rotate-2 hover:rotate-0 transition-all duration-500">
                            <div class="bg-gray-200 rounded-xl h-96 w-full flex items-center justify-center text-gray-400">
                                <!-- Placeholder for Office Image -->
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                </svg>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2">
                    <h2 class="text-4xl font-bold text-gray-800 mb-6">{{ settings('page_about_serving_title', 'Serving the Community Since 1971') }}</h2>
                    <p class="text-gray-600 text-lg leading-relaxed mb-6">
                        {{ settings('page_about_serving_desc', 'The Upazila Administration is the primary administrative unit...') }}
                    </p>
                    <p class="text-gray-600 text-lg leading-relaxed mb-8">
                </div>
            </div>
        </div>
    </section>

    <!-- Leadership -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ settings('page_about_leadership_title', 'Our Leadership') }}</h2>
                <p class="text-gray-600 text-lg">{{ settings('page_about_leadership_subtitle', 'Meet the dedicated officials leading our administration.') }}</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- UNO -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all group">
                    <div class="h-64 bg-gray-200 flex items-center justify-center text-gray-400 group-hover:bg-bd-green/10 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-bold text-gray-800 mb-1">{{ settings('official_uno_name', 'Name of UNO') }}</h4>
                        <p class="text-bd-green font-medium mb-4">{{ settings('official_uno_designation', 'Upazila Nirbahi Officer') }}</p>
                        <p class="text-gray-500 text-sm">{{ settings('official_uno_desc', 'Leading the administration...') }}</p>
                    </div>
                </div>

                <!-- AC Land -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all group">
                    <div class="h-64 bg-gray-200 flex items-center justify-center text-gray-400 group-hover:bg-bd-green/10 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-bold text-gray-800 mb-1">{{ settings('official_acland_name', 'Name of AC Land') }}</h4>
                        <p class="text-bd-green font-medium mb-4">{{ settings('official_acland_designation', 'Assistant Commissioner (Land)') }}</p>
                        <p class="text-gray-500 text-sm">{{ settings('official_acland_desc', 'Ensuring efficient land management...') }}</p>
                    </div>
                </div>

                <!-- Vice Chairman -->
                <div class="bg-white rounded-2xl overflow-hidden shadow-lg hover:shadow-xl transition-all group">
                    <div class="h-64 bg-gray-200 flex items-center justify-center text-gray-400 group-hover:bg-bd-green/10 transition-colors">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                    </div>
                    <div class="p-6 text-center">
                        <h4 class="text-xl font-bold text-gray-800 mb-1">{{ settings('official_vc_name', 'Name of Vice Chairman') }}</h4>
                        <p class="text-emerald-600 font-medium mb-4">{{ settings('official_vc_designation', 'Upazila Vice Chairman') }}</p>
                        <p class="text-gray-500 text-sm">{{ settings('official_vc_desc', 'Representing the people...') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
