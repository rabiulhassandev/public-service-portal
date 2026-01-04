@extends('layouts.frontend')

@section('title', settings('home_title', 'Home - Satkania Upazila Public Service'))
@section('meta_description', settings('home_meta_desc', 'Official public service portal for Satkania Upazila. Submit complaints, track applications, and access government services online.'))
@section('meta_keywords', settings('home_meta_keywords', 'Satkania, Upazila, Complaint, Service, Government, Bangladesh'))

@section('content')
    <!-- Hero Section -->
    <section class="relative min-h-[90vh] flex items-center pt-24 pb-12 overflow-hidden">
        <!-- Mesh Gradient Background -->
        <div class="absolute inset-0 bg-[#006a4e]">
            <div class="absolute top-0 left-1/2 -translate-x-1/2 w-full h-full max-w-7xl opacity-40">
                <div class="absolute top-[-10%] left-[-10%] w-[50%] h-[50%] rounded-full bg-bd-green-dark blur-[120px] animate-pulse-slow"></div>
                <div class="absolute bottom-[-10%] right-[-10%] w-[50%] h-[50%] rounded-full bg-bd-green blur-[120px] animate-pulse-slow" style="animation-delay: 2s;"></div>
                <div class="absolute top-[20%] right-[20%] w-[30%] h-[30%] rounded-full bg-bd-red blur-[100px] animate-pulse-slow" style="animation-delay: 4s;"></div>
            </div>
            <div class="absolute inset-0 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')] opacity-10"></div>
            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-[#006a4e]/50 to-[#006a4e]"></div>
        </div>

        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <!-- Text Content -->
                <div class="w-full md:w-1/2 text-center md:text-left">
                    <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/20 text-white text-sm mb-8 backdrop-blur-md animate-fade-in-up" style="animation-delay: 0.1s;">
                        <span class="relative flex h-3 w-3">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-bd-green-light opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-3 w-3 bg-bd-green"></span>
                        </span>
                        {{ settings('hero_badge', 'Satkania Upazila') }}
                    </div>
                    <h2 class="text-5xl md:text-6xl lg:text-7xl font-bold text-white mb-8 leading-tight tracking-tight animate-fade-in-up" style="animation-delay: 0.2s;">
                        {{ settings('hero_title_prefix', 'Serving with') }} <br>
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-emerald-200 via-teal-200 to-cyan-200">{{ settings('hero_title_suffix', 'Transparency') }}</span>
                    </h2>
                    <p class="text-xl text-emerald-50/90 mb-10 leading-relaxed max-w-xl mx-auto md:mx-0 font-medium animate-fade-in-up" style="animation-delay: 0.3s;">
                        {{ settings('hero_desc', 'Your gateway to modern governance...') }}
                    </p>
                    <div class="flex flex-col sm:flex-row items-center gap-5 justify-center md:justify-start animate-fade-in-up" style="animation-delay: 0.4s;">
                        <a href="{{ route('complaints.create') }}" class="group w-full sm:w-auto px-8 py-4 bg-white text-[#006a4e] rounded-xl font-bold text-lg shadow-[0_20px_50px_rgba(0,0,0,0.15)] hover:shadow-[0_20px_50px_rgba(0,0,0,0.3)] hover:-translate-y-1 transition-all duration-300 flex items-center justify-center gap-2">
                            {{ settings('btn_submit', 'Submit Complaint') }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:translate-x-1 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                            </svg>
                        </a>
                        <a href="{{ route('complaints.track') }}" class="w-full sm:w-auto px-8 py-4 bg-white/10 text-white rounded-xl font-bold text-lg border border-white/20 hover:bg-white/20 backdrop-blur-sm transition-all flex items-center justify-center gap-2">
                            {{ settings('btn_track', 'Track Complaint') }}
                        </a>
                    </div>
                </div>
                
                <!-- Dashboard Preview Visual -->
                <div class="w-full md:w-1/2 relative hidden md:block perspective-1000 animate-fade-in-up" style="animation-delay: 0.5s;">
                    <div class="relative z-10 bg-white/90 backdrop-blur-xl rounded-2xl p-4 shadow-2xl transform rotate-y-12 rotate-x-6 hover:rotate-y-0 hover:rotate-x-0 transition-all duration-700 border border-white/40">
                        <!-- Fake Browser Bar -->
                        <div class="flex items-center gap-2 mb-4 px-2">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                            <div class="ml-4 flex-1 bg-gray-100 rounded-md h-6 w-full opacity-50"></div>
                        </div>
                        
                        <!-- Dashboard UI -->
                        <div class="bg-gray-50 rounded-xl p-6 border border-gray-100">
                            <!-- Header -->
                            <div class="flex justify-between items-center mb-8">
                                <div>
                                    <div class="h-4 w-32 bg-gray-200 rounded mb-2"></div>
                                    <div class="h-3 w-20 bg-gray-100 rounded"></div>
                                </div>
                                <div class="flex gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gray-200"></div>
                                    <div class="w-8 h-8 rounded-full bg-bd-green/20 text-bd-green flex items-center justify-center font-bold text-xs">JD</div>
                                </div>
                            </div>
                            
                            <!-- Stats Row -->
                            <div class="grid grid-cols-3 gap-4 mb-8">
                                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                                    <div class="w-8 h-8 rounded-lg bg-blue-50 text-blue-500 flex items-center justify-center mb-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path></svg>
                                    </div>
                                    <div class="h-6 w-12 bg-gray-100 rounded mb-1"></div>
                                    <div class="h-3 w-16 bg-gray-50 rounded"></div>
                                </div>
                                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                                    <div class="w-8 h-8 rounded-lg bg-emerald-50 text-bd-green flex items-center justify-center mb-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path></svg>
                                    </div>
                                    <div class="h-6 w-12 bg-gray-100 rounded mb-1"></div>
                                    <div class="h-3 w-16 bg-gray-50 rounded"></div>
                                </div>
                                <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100">
                                    <div class="w-8 h-8 rounded-lg bg-orange-50 text-orange-500 flex items-center justify-center mb-2">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                                    </div>
                                    <div class="h-6 w-12 bg-gray-100 rounded mb-1"></div>
                                    <div class="h-3 w-16 bg-gray-50 rounded"></div>
                                </div>
                            </div>
                            
                            <!-- Chart Area -->
                            <div class="bg-white p-4 rounded-xl shadow-sm border border-gray-100 h-32 flex items-end justify-between gap-2 px-4 pb-2">
                                <div class="w-full bg-emerald-50 rounded-t-sm h-[40%]"></div>
                                <div class="w-full bg-bd-green/20 rounded-t-sm h-[70%]"></div>
                                <div class="w-full bg-emerald-200 rounded-t-sm h-[50%]"></div>
                                <div class="w-full bg-emerald-300 rounded-t-sm h-[80%]"></div>
                                <div class="w-full bg-bd-green-light rounded-t-sm h-[60%]"></div>
                                <div class="w-full bg-bd-green rounded-t-sm h-[90%]"></div>
                            </div>
                        </div>

                        <!-- Floating Badge -->
                        <div class="absolute -bottom-6 -right-6 bg-white p-4 rounded-xl shadow-[0_20px_50px_rgba(0,0,0,0.2)] flex items-center gap-3 animate-bounce-slow border border-gray-100">
                            <div class="w-12 h-12 bg-bd-green/20 rounded-full flex items-center justify-center text-bd-green">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </div>
                            <div>
                                <p class="text-xs text-gray-400 font-bold uppercase tracking-wider">System Status</p>
                                <p class="text-emerald-800 font-bold">100% Operational</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="py-12 -mt-20 relative z-20">
        <div class="container mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Total Complaints -->
                <div class="bg-white p-8 rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 transform hover:-translate-y-2 transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 bg-blue-50 text-blue-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                        <span class="bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-lg">{{ settings('stats_total_label', 'Total') }}</span>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-800 mb-1">{{ $totalComplaints }}</h3>
                    <p class="text-gray-500 font-medium">{{ settings('stats_total_text', 'Complaints Filed') }}</p>
                </div>

                <!-- Resolved -->
                <div class="bg-white p-8 rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 transform hover:-translate-y-2 transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 bg-emerald-50 text-bd-green rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="bg-bd-green/20 text-bd-green text-xs font-bold px-2 py-1 rounded-lg">{{ settings('stats_resolved_label', 'Success') }}</span>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-800 mb-1">{{ $resolvedComplaints }}</h3>
                    <p class="text-gray-500 font-medium">{{ settings('stats_resolved_text', 'Successfully Resolved') }}</p>
                </div>

                <!-- Pending -->
                <div class="bg-white p-8 rounded-2xl shadow-xl shadow-gray-200/50 border border-gray-100 transform hover:-translate-y-2 transition-all duration-300 group">
                    <div class="flex items-start justify-between mb-6">
                        <div class="w-14 h-14 bg-orange-50 text-orange-600 rounded-2xl flex items-center justify-center group-hover:scale-110 transition-transform duration-300">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>
                        </div>
                        <span class="bg-orange-100 text-orange-700 text-xs font-bold px-2 py-1 rounded-lg">{{ settings('stats_pending_label', 'Active') }}</span>
                    </div>
                    <h3 class="text-4xl font-bold text-gray-800 mb-1">{{ $pendingComplaints }}</h3>
                    <p class="text-gray-500 font-medium">{{ settings('stats_pending_text', 'Under Processing') }}</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Features / Quick Links -->
    <section id="features" class="py-20">
        <div class="container mx-auto px-6">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">{{ settings('services_title', 'Digital Services') }}</h3>
                <p class="text-gray-600 text-lg">{{ settings('services_subtitle', 'Access our services quickly...') }}</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- File Complaint -->
                <div class="group relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-red-50 rounded-bl-full -mr-8 -mt-8 transition-all group-hover:scale-150 group-hover:bg-red-100"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-red-500 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-red-200 group-hover:rotate-6 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold text-gray-800 mb-3">{{ settings('service_1_title', 'File a Complaint') }}</h4>
                        <p class="text-gray-600 mb-8 leading-relaxed">{{ settings('service_1_desc', 'Submit your concerns...') }}</p>
                        <a href="{{ route('complaints.create') }}" class="inline-flex items-center gap-2 text-red-600 font-bold hover:gap-3 transition-all">
                            {{ settings('service_1_btn', 'Start Now') }} 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                    </div>
                </div>

                <!-- Photo Gallery -->
                <div class="group relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-blue-50 rounded-bl-full -mr-8 -mt-8 transition-all group-hover:scale-150 group-hover:bg-blue-100"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-blue-500 text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-blue-200 group-hover:rotate-6 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold text-gray-800 mb-3">{{ settings('service_2_title', 'Photo Gallery') }}</h4>
                        <p class="text-gray-600 mb-8 leading-relaxed">{{ settings('service_2_desc', 'Explore events...') }}</p>
                        <a href="{{ route('gallery') }}" class="inline-flex items-center gap-2 text-blue-600 font-bold hover:gap-3 transition-all">
                            {{ settings('service_2_btn', 'View Gallery') }} 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                    </div>
                </div>

                <!-- Contact Us -->
                <div class="group relative bg-white rounded-3xl p-8 shadow-lg hover:shadow-2xl transition-all duration-300 border border-gray-100 overflow-hidden">
                    <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-50 rounded-bl-full -mr-8 -mt-8 transition-all group-hover:scale-150 group-hover:bg-bd-green/20"></div>
                    
                    <div class="relative z-10">
                        <div class="w-16 h-16 bg-bd-green text-white rounded-2xl flex items-center justify-center mb-8 shadow-lg shadow-emerald-200 group-hover:rotate-6 transition-transform">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                            </svg>
                        </div>
                        <h4 class="text-2xl font-bold text-gray-800 mb-3">{{ settings('service_3_title', 'Contact Us') }}</h4>
                        <p class="text-gray-600 mb-8 leading-relaxed">{{ settings('service_3_desc', 'Need assistance?') }}</p>
                        <a href="{{ route('contact') }}" class="inline-flex items-center gap-2 text-bd-green font-bold hover:gap-3 transition-all">
                            {{ settings('service_3_btn', 'Get in Touch') }} 
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" /></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Mission Section -->
    <section class="py-24 bg-gray-900 relative overflow-hidden">
        <div class="absolute inset-0 opacity-10 bg-[url('https://www.transparenttextures.com/patterns/cubes.png')]"></div>
        <div class="container mx-auto px-6 relative z-10">
            <div class="flex flex-col md:flex-row items-center gap-16">
                <div class="w-full md:w-1/2">
                    <h3 class="text-bd-green-light font-bold tracking-wider uppercase mb-4">{{ settings('mission_label', 'Our Mission') }}</h3>
                    <h2 class="text-4xl md:text-5xl font-bold text-white mb-8 leading-tight">{{ settings('mission_title', 'Building a Prosperous Community Together') }}</h2>
                    <p class="text-gray-400 text-lg leading-relaxed mb-8">
                        {{ settings('mission_desc', 'We are committed to building...') }}
                    </p>
                    <div class="flex gap-4">
                        <div class="flex flex-col">
                            <span class="text-3xl font-bold text-white">100%</span>
                            <span class="text-gray-500 text-sm">{{ settings('transparency', 'Transparency') }}</span>
                        </div>
                        <div class="w-px h-12 bg-gray-700"></div>
                        <div class="flex flex-col">
                            <span class="text-3xl font-bold text-white">24/7</span>
                            <span class="text-gray-500 text-sm">{{ settings('support', 'Support') }}</span>
                        </div>
                    </div>
                </div>
                <div class="w-full md:w-1/2 relative">
                    <div class="absolute inset-0 bg-bd-green blur-3xl opacity-20 rounded-full"></div>
                    <div class="relative bg-gray-800 p-8 rounded-2xl border border-gray-700 shadow-2xl">
                        <blockquote class="text-xl text-gray-300 italic mb-6">
                            {{ settings('quote_text', 'Our administration is dedicated...') }}
                        </blockquote>
                        <div class="flex items-center gap-4">
                            <div class="w-12 h-12 bg-gray-700 rounded-full flex items-center justify-center text-gray-400">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-white font-bold">{{ settings('admin_title', 'Upazila Nirbahi Officer') }}</h4>
                                <p class="text-white text-sm">{{ settings('admin_role', 'Administration Head') }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
