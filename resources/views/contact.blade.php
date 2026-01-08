@extends('layouts.frontend')

@section('title', settings('contact_title', 'Contact Us - Satkania Upazila'))
@section('meta_description', settings('contact_meta_desc', 'Get in touch with Satkania Upazila Administration. Find our address, phone number, and email for support.'))
@section('meta_keywords', settings('contact_meta_keywords', 'Contact Satkania UNO, Address, Phone, Email, Support, Location'))

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="padding: 40px 10px;">
        <div class="absolute inset-0 bg-[#006A4E]">
            <img 
                src="{{ asset('images/gallery-bg.jpg') }}" 
                alt="Contact Background" 
                class="w-full h-full object-cover opacity-30"
            >
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30"></div>
        
        <div class="relative h-full flex items-center justify-center text-center px-6 pt-20">
            <div class="max-w-3xl">
                <h2 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg animate-fade-in-up">{{ settings('page_contact_heading', 'Contact Us') }}</h2>
                <p class="text-xl text-white/90 drop-shadow-md animate-fade-in-up" style="animation-delay: 0.2s">{{ settings('page_contact_subtitle', 'We are here to help') }}</p>
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
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d261.76688841085877!2d92.05685521586118!3d22.07430183640559!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ad110014de8687%3A0x1fa49e486d629343!2sUpzila%20Conference%20Room!5e0!3m2!1sen!2shk!4v1767902308949!5m2!1sen!2shk" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>

                <!-- Contact Info (Right) -->
                <div class="w-full lg:w-1/2">
                    <div class="bg-white p-8 md:p-12 rounded-3xl shadow-xl border border-gray-100 h-full flex flex-col justify-center">
                        <h3 class="text-3xl font-bold text-gray-800 mb-8">{{ settings('contact_details_title', 'Get in Touch') }}</h3>
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
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">{{ settings('visit_us_title', 'Visit Us') }}</h4>
                                    <p class="text-gray-600 leading-relaxed">{{ settings('visit_us_address', 'Upazila Administration Office') }}</p>
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
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">{{ settings('call_us_title', 'Call Us') }}</h4>
                                    <p class="text-gray-600 leading-relaxed">{{ settings('contact_phone', '+880 1XXX-XXXXXX') }}<br><span class="text-sm text-gray-500">{{ settings('call_us_hours', 'Sun-Thu, 9am-5pm') }}</span></p>
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
                                <div>
                                    <h4 class="text-xl font-bold text-gray-800 mb-2">{{ settings('email_us_title', 'Email Us') }}</h4>
                                    <p class="text-gray-600 leading-relaxed">{{ settings('contact_email', 'info@upazila.gov.bd') }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
