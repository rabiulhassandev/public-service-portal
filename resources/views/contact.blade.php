@extends('layouts.frontend')

@section('content')
    <!-- Hero Section -->
    <section class="relative h-[50vh] overflow-hidden">
        <div class="absolute inset-0 bg-bd-green">
            <img 
                src="{{ asset('images/gallery-bg.jpg') }}" 
                alt="Contact Background" 
                class="w-full h-full object-cover opacity-30"
            >
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30"></div>
        
        <div class="relative h-full flex items-center justify-center text-center px-6 pt-20">
            <div class="max-w-3xl">
                <h2 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg animate-fade-in-up">Contact Us</h2>
                <p class="text-xl text-white/90 drop-shadow-md animate-fade-in-up" style="animation-delay: 0.2s">We are here to help. Reach out to us for any queries, support, or feedback.</p>
            </div>
        </div>
    </section>

    <!-- Contact Content -->
    <section class="py-20 bg-gray-50">
        <div class="container mx-auto px-6">
            <div class="flex flex-col lg:flex-row gap-12 items-stretch">
                <!-- Map Section (Left) -->
                <div class="w-full lg:w-1/2 min-h-[400px]">
                    <div class="bg-gray-200 rounded-2xl h-full w-full overflow-hidden shadow-lg relative group border border-gray-300">
                        <div class="absolute inset-0 flex items-center justify-center bg-gray-300/50 group-hover:bg-gray-300/30 transition-colors">
                            <span class="text-gray-500 font-bold flex items-center gap-2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 20l-5.447-2.724A1 1 0 013 16.382V5.618a1 1 0 011.447-.894L9 7m0 13l6-3m-6 3V7m6 10l4.553 2.276A1 1 0 0121 18.382V7.618a1 1 0 01-.447-.894L15 4m0 13V4m0 0L9 7" />
                                </svg>
                                Google Map Integration
                            </span>
                        </div>
                    </div>
                </div>

                <!-- Contact Info (Right) -->
                <div class="w-full lg:w-1/2">
                    <div class="bg-white p-8 md:p-12 rounded-3xl shadow-xl border border-gray-100 h-full flex flex-col justify-center">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8">Get in Touch</h3>
                        <div class="space-y-8">
                            <!-- Visit Us -->
                            <div class="flex items-start gap-6">
                                <div class="w-14 h-14 bg-bd-green/10 rounded-2xl flex items-center justify-center text-bd-green shrink-0 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">Visit Us</h4>
                                    <p class="text-gray-600 leading-relaxed">Upazila Administration Office<br>Main Road, Satkania, Chattogram</p>
                                </div>
                            </div>
                            
                            <!-- Call Us -->
                            <div class="flex items-start gap-6">
                                <div class="w-14 h-14 bg-bd-green/10 rounded-2xl flex items-center justify-center text-bd-green shrink-0 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">Call Us</h4>
                                    <p class="text-gray-600 leading-relaxed">+880 1XXX-XXXXXX<br><span class="text-sm text-gray-500">Sun-Thu, 9am-5pm</span></p>
                                </div>
                            </div>

                            <!-- Email Us -->
                            <div class="flex items-start gap-6">
                                <div class="w-14 h-14 bg-bd-green/10 rounded-2xl flex items-center justify-center text-bd-green shrink-0 shadow-sm">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                    </svg>
                                </div>
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">Email Us</h4>
                                    <p class="text-gray-600 leading-relaxed">info@upazila.gov.bd<br>support@upazila.gov.bd</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
