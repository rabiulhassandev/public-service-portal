@extends('layouts.frontend')

@section('title', settings('complaint_track_title', 'Track Complaint - Satkania Upazila'))
@section('meta_description', settings('complaint_track_meta_desc', 'Track the status of your submitted complaint using your mobile number. Check real-time updates.'))
@section('meta_keywords', settings('complaint_track_meta_keywords', 'Track Complaint, Complaint Status, Satkania Upazila, Check Status'))

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="padding: 40px 10px;">
        <div class="absolute inset-0 bg-[#006A4E]">
            <img 
                src="{{ asset('images/gallery-bg.jpg') }}" 
                alt="Track Background" 
                class="w-full h-full object-cover opacity-30"
            >
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30"></div>
        
        <div class="relative h-full flex items-center justify-center text-center px-6 pt-20">
            <div class="max-w-3xl">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 drop-shadow-lg animate-fade-in-up">{{ settings('page_complaint_track_heading', 'Track Complaint') }}</h2>
                <p class="text-lg text-white/90 drop-shadow-md animate-fade-in-up" style="animation-delay: 0.2s">{{ settings('page_complaint_track_subtitle', 'Check the realtime status') }}</p>
            </div>
        </div>
    </section>

    <!-- Track Form Section -->
    <section class="relative py-16 bg-gray-50">
        <div class="container mx-auto px-4 flex justify-center">
            
            <!-- Mobile-sized Form Container -->
            <div class="w-full max-w-md relative z-10">
                
                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100 animate-fade-in-up" style="animation-delay: 0.1s; border: 2px solid #006A4E;">
                    <div class="p-8">
                        <form action="{{ route('complaints.status') }}" method="GET" id="trackForm">
                            <div class="mb-6">
                                <label for="phone" class="block text-sm font-bold text-gray-700 mb-2">{{ __('messages.phone_number') }}</label>
                                <div class="relative">
                                    <input type="text" name="phone" id="phone" value="{{ request('phone') }}" 
                                        class="w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-4 focus:border-[#006A4E] focus:bg-white focus:ring-0 transition-all font-bold text-gray-800 placeholder-gray-400" 
                                        placeholder="017xxxxxxxx" required>
                                    <div class="absolute inset-y-0 right-0 pr-5 flex items-center pointer-events-none text-gray-400">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                </div>
                            </div>

                            <button type="button" id="submitBtn" class="w-full flex justify-center items-center gap-2 py-4 px-4 border border-transparent rounded-xl shadow-lg text-lg font-bold text-white bg-[#006A4E] hover:bg-[#00513c] hover:shadow-xl focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#006A4E] transition-all transform hover:-translate-y-1">
                                {{ __('messages.check_status') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                                </svg>
                            </button>
                        </form>
                    </div>
                    <div class="bg-gray-50 px-8 py-6 border-t border-gray-100 text-center">
                        <p class="text-gray-500 font-medium">{{ __('messages.need_to_file_complaint') }} <a href="{{ route('complaints.create') }}" class="text-[#006A4E] hover:text-[#00513c] font-bold hover:underline">{{ __('messages.click_here') }}</a></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        document.getElementById('submitBtn').addEventListener('click', function(e) {
            const form = document.getElementById('trackForm');
            const phoneInput = document.getElementById('phone');
            const phoneRegex = /^(\+88)?01[3-9]\d{8}$/;
            let valid = true;

            // Simple validation visualization
            if (!phoneInput.value.trim() || !phoneRegex.test(phoneInput.value.replace(/\s+/g, ''))) {
                phoneInput.classList.add('border-red-500');
                
                // Create or update error message
                let errorMsg = phoneInput.parentElement.nextElementSibling;
                if (!errorMsg || !errorMsg.classList.contains('text-red-500')) {
                    errorMsg = document.createElement('p');
                    errorMsg.className = 'text-xs text-red-500 mt-1';
                    phoneInput.parentElement.after(errorMsg);
                }
                errorMsg.textContent = '{{ __('messages.invalid_phone_error') }}';
                
                // Shake effect
                const card = document.querySelector('.bg-white');
                card.classList.add('animate-shake');
                setTimeout(() => card.classList.remove('animate-shake'), 500);
                
                valid = false;
            } else {
                phoneInput.classList.remove('border-red-500');
                let errorMsg = phoneInput.parentElement.nextElementSibling;
                if (errorMsg && errorMsg.classList.contains('text-red-500')) {
                    errorMsg.remove();
                }
            }

            if (valid) {
                form.submit();
            }
        });
    </script>

    <style>
        .animate-shake {
            animation: shake 0.5s cubic-bezier(.36,.07,.19,.97) both;
        }

        @keyframes shake {
            10%, 90% { transform: translate3d(-1px, 0, 0); }
            20%, 80% { transform: translate3d(2px, 0, 0); }
            30%, 50%, 70% { transform: translate3d(-4px, 0, 0); }
            40%, 60% { transform: translate3d(4px, 0, 0); }
        }
    </style>
@endsection
