@extends('layouts.frontend')

@section('title', settings('complaint_create_title', 'Submit Complaint - Satkania Upazila'))
@section('meta_description', settings('complaint_create_meta_desc', 'File a complaint to Satkania Upazila Administration. Report issues, attach photos, and get your problems solved.'))
@section('meta_keywords', settings('complaint_create_meta_keywords', 'File Complaint, Report Issue, Satkania Upazila, Grievance Redressal'))

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="padding: 40px 10px;">
        <div class="absolute inset-0 bg-[#006A4E]">
            <img 
                src="{{ asset('images/gallery-bg.jpg') }}" 
                alt="Complaint Background" 
                class="w-full h-full object-cover opacity-30"
            >
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30"></div>
        
        <div class="relative h-full flex items-center justify-center text-center px-6 pt-20">
            <div class="max-w-3xl">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 drop-shadow-lg animate-fade-in-up">{{ settings('page_complaint_create_heading', 'Submit a Complaint') }}</h2>
                <p class="text-lg text-white/90 drop-shadow-md animate-fade-in-up" style="animation-delay: 0.2s">{{ settings('page_complaint_create_subtitle', 'Fill out the form below') }}</p>
            </div>
        </div>
    </section>

    <!-- Form Section -->
    <section class="relative py-16 bg-gray-50">
        <div class="container mx-auto px-4 flex justify-center">
            
            <!-- Mobile-sized Form Container -->
            <div class="w-full max-w-md">
                
                <!-- Error Messages -->
                @if ($errors->any())
                <div class="mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r shadow-sm">
                    <div class="flex">
                        <div class="flex-shrink-0">
                            <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <div class="ml-3">
                            <h3 class="text-sm font-medium text-red-800">{{ __('messages.correct_errors') }}</h3>
                            <ul class="mt-1 text-sm text-red-700 list-disc list-inside space-y-1">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                @endif

                <!-- Progress Indicator -->
                <div class="mb-6">
                    <div class="flex justify-between items-center mb-2">
                        <div class="flex-1 text-center">
                            <div class="step-indicator w-10 h-10 mx-auto rounded-full flex items-center justify-center font-bold transition-all duration-300" data-step="1">1</div>
                            <p class="text-xs mt-1 font-medium text-gray-500">{{ __('messages.location') }}</p>
                        </div>
                        <div class="flex-1 h-1 bg-gray-200 mx-2">
                            <div class="h-full bg-[#006A4E] transition-all duration-300" style="width: 0%" id="progress-bar-1"></div>
                        </div>
                        <div class="flex-1 text-center">
                            <div class="step-indicator w-10 h-10 mx-auto rounded-full flex items-center justify-center font-bold transition-all duration-300" data-step="2">2</div>
                            <p class="text-xs mt-1 font-medium text-gray-500">{{ __('messages.details') }}</p>
                        </div>
                        <div class="flex-1 h-1 bg-gray-200 mx-2">
                            <div class="h-full bg-[#006A4E] transition-all duration-300" style="width: 0%" id="progress-bar-2"></div>
                        </div>
                        <div class="flex-1 text-center">
                            <div class="step-indicator w-10 h-10 mx-auto rounded-full flex items-center justify-center font-bold transition-all duration-300" data-step="3">3</div>
                            <p class="text-xs mt-1 font-medium text-gray-500">{{ __('messages.review') }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-3xl shadow-2xl overflow-hidden border border-gray-100" style="border: 2px solid #006A4E;">
                    <form action="{{ route('complaints.store') }}" method="POST" enctype="multipart/form-data" id="complaintForm">
                        @csrf
                        
                        <!-- Step 1: Location Info -->
                        <div class="form-step p-8" data-step="1">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">{{ settings('complaint_form_location_title', 'Location Information') }}</h3>
                            
                            <div class="space-y-4">
                                <div class="relative">
                                    <select name="union_name" id="union_name" class="w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-4 focus:border-[#006A4E] focus:bg-white focus:ring-0 transition-all appearance-none cursor-pointer text-gray-700 font-medium" required>
                                        <option value="">{{ __('messages.select_union') }}</option>
                                        <option value="Satkania" {{ old('union_name') == 'Satkania' ? 'selected' : '' }}>Satkania</option>
                                        <option value="Madarsha" {{ old('union_name') == 'Madarsha' ? 'selected' : '' }}>Madarsha</option>
                                        <option value="Eochia" {{ old('union_name') == 'Eochia' ? 'selected' : '' }}>Eochia</option>
                                        <option value="Kanchana" {{ old('union_name') == 'Kanchana' ? 'selected' : '' }}>Kanchana</option>
                                        <option value="Amilaish" {{ old('union_name') == 'Amilaish' ? 'selected' : '' }}>Amilaish</option>
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-500">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </div>
                                </div>

                                <div class="relative">
                                    <select name="word_number" id="word_number" class="w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-4 focus:border-[#006A4E] focus:bg-white focus:ring-0 transition-all appearance-none cursor-pointer text-gray-700 font-medium" required>
                                        <option value="">{{ __('messages.select_word') }}</option>
                                        @foreach(range(1, 9) as $word)
                                            <option value="{{ $word }}" {{ old('word_number') == $word ? 'selected' : '' }}>Word {{ $word }}</option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-500">
                                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" /></svg>
                                    </div>
                                </div>

                                <div class="relative">
                                    <input type="text" name="phone" id="phone" value="{{ old('phone') }}" 
                                        class="w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-4 focus:border-[#006A4E] focus:bg-white focus:ring-0 transition-all font-bold text-gray-800 placeholder-gray-400" 
                                        placeholder="{{ __('messages.mobile_number_placeholder') }}" required>
                                    <div class="absolute inset-y-0 right-0 pr-4 flex items-center pointer-events-none text-gray-400">
                                        <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                        </svg>
                                    </div>
                                </div>

                            </div>

                            <button type="button" class="next-btn w-full mt-6 py-4 bg-[#006A4E] hover:bg-[#00513c] text-white font-bold text-lg rounded-xl shadow-lg hover:shadow-xl transition-all">
                                {{ __('messages.next_step') }}
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                </svg>
                            </button>
                        </div>

                        <!-- Step 2: Details -->
                        <div class="form-step p-8 hidden" data-step="2">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">{{ settings('complaint_form_details_title', 'Complaint Details') }}</h3>
                            
                            <div class="space-y-4">
                                <input type="text" name="name" id="name" value="{{ old('name') }}" 
                                    class="w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-4 focus:border-[#006A4E] focus:bg-white focus:ring-0 transition-all font-medium placeholder-gray-400" 
                                    placeholder="{{ __('messages.full_name_placeholder') }}" required>

                                <input type="text" name="subject" id="subject" value="{{ old('subject') }}" 
                                    class="w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-4 focus:border-[#006A4E] focus:bg-white focus:ring-0 transition-all font-medium placeholder-gray-400" 
                                    placeholder="{{ __('messages.subject_placeholder') }}" required>

                                <textarea name="message" id="message" rows="5" 
                                    class="w-full rounded-xl border-gray-200 bg-gray-50 px-4 py-4 focus:border-[#006A4E] focus:bg-white focus:ring-0 transition-all font-medium placeholder-gray-400 resize-none" 
                                    placeholder="{{ __('messages.message_placeholder') }}" required>{{ old('message') }}</textarea>

                                <div>
                                    <div class="flex items-center justify-center w-full">
                                        <label for="image" class="flex flex-col items-center justify-center w-full h-32 border-2 border-gray-200 border-dashed rounded-xl cursor-pointer bg-gray-50 hover:bg-emerald-50/30 hover:border-[#006A4E] transition-all">
                                            <div class="flex flex-col items-center justify-center pt-5 pb-6">
                                                <svg class="w-8 h-8 mb-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"></path>
                                                </svg>
                                                <p class="text-xs text-gray-500"><span class="font-semibold">{{ __('messages.click_to_upload') }}</span> {{ __('messages.drag_and_drop') }}</p>
                                                <p class="text-xs text-gray-400">{{ __('messages.file_types') }}</p>
                                                <p class="text-xs text-[#006A4E] font-bold mt-2 hidden" id="file-name"></p>
                                            </div>
                                            <input id="image" name="image" type="file" class="hidden" accept="image/*" onchange="document.getElementById('file-name').textContent = this.files[0]?.name || ''; document.getElementById('file-name').classList.toggle('hidden', !this.files[0]);" />
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="flex gap-3 mt-6">
                                <button type="button" class="prev-btn flex-1 py-4 border border-gray-200 text-gray-600 font-bold rounded-xl hover:bg-gray-50 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    {{ __('messages.back') }}
                                </button>
                                <button type="button" class="next-btn flex-1 py-4 bg-[#006A4E] hover:bg-[#00513c] text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
                                    {{ __('messages.next') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <!-- Step 3: Preview & Submit -->
                        <div class="form-step p-8 hidden" data-step="3">
                            <h3 class="text-xl font-bold text-gray-800 mb-6 text-center">{{ settings('complaint_form_review_title', 'Review & Submit') }}</h3>
                            
                            <div class="space-y-4 bg-gray-50 rounded-xl p-6">
                                <div class="border-b border-gray-200 pb-3">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-bold">{{ __('messages.location') }}</p>
                                    <p class="text-sm font-medium text-gray-800 mt-1"><span id="preview-union"></span>, {{ __('messages.word') }} <span id="preview-word"></span></p>
                                </div>
                                <div class="border-b border-gray-200 pb-3">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-bold">{{ __('messages.contact') }}</p>
                                    <p class="text-sm font-medium text-gray-800 mt-1"><span id="preview-name"></span></p>
                                    <p class="text-sm text-gray-600"><span id="preview-phone"></span></p>
                                </div>
                                <div class="border-b border-gray-200 pb-3">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-bold">{{ __('messages.subject') }}</p>
                                    <p class="text-sm font-medium text-gray-800 mt-1" id="preview-subject"></p>
                                </div>
                                <div class="border-b border-gray-200 pb-3">
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-bold">{{ __('messages.description') }}</p>
                                    <p class="text-sm text-gray-700 mt-1 leading-relaxed" id="preview-message"></p>
                                </div>
                                <div>
                                    <p class="text-xs text-gray-500 uppercase tracking-wide font-bold">{{ __('messages.attachment') }}</p>
                                    <div id="preview-file-box" class="mt-2 hidden">
                                        <div class="flex items-center gap-3 p-3 bg-white border border-gray-200 rounded-lg shadow-sm">
                                            <div class="h-12 w-12 flex-shrink-0 bg-gray-100 rounded-lg overflow-hidden flex items-center justify-center">
                                                <img id="preview-thumbnail" class="h-full w-full object-cover hidden" alt="Preview">
                                                <svg id="preview-file-icon" class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                                                </svg>
                                            </div>
                                            <div>
                                                <p class="text-sm font-bold text-gray-800 truncate max-w-[200px]" id="preview-filename"></p>
                                                <p class="text-xs text-gray-500" id="preview-filesize"></p>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="text-sm text-gray-500 mt-1 italic" id="preview-no-file">{{ __('messages.no_file_attached') }}</p>
                                </div>
                            </div>

                            <div class="flex gap-3 mt-6">
                                <button type="button" class="prev-btn flex-1 py-4 border border-gray-200 text-gray-600 font-bold rounded-xl hover:bg-gray-50 transition-all">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                                    </svg>
                                    {{ __('messages.back') }}
                                </button>
                                <button type="submit" class="flex-1 py-4 bg-[#006A4E] hover:bg-[#00513c] text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all">
                                    {{ __('messages.submit') }}
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 inline ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <script>
        let currentStep = 1;
        const totalSteps = 3;

        // Initialize
        updateStepIndicators();

        // Next button handlers
        document.querySelectorAll('.next-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (validateStep(currentStep)) {
                    if (currentStep < totalSteps) {
                        currentStep++;
                        showStep(currentStep);
                        if (currentStep === 3) {
                            updatePreview();
                        }
                    }
                }
            });
        });

        // Previous button handlers
        document.querySelectorAll('.prev-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                if (currentStep > 1) {
                    currentStep--;
                    showStep(currentStep);
                }
            });
        });

        function showStep(step) {
            document.querySelectorAll('.form-step').forEach(el => el.classList.add('hidden'));
            document.querySelector(`.form-step[data-step="${step}"]`).classList.remove('hidden');
            updateStepIndicators();
        }

        function updateStepIndicators() {
            document.querySelectorAll('.step-indicator').forEach(indicator => {
                const step = parseInt(indicator.getAttribute('data-step'));
                if (step < currentStep) {
                    indicator.classList.remove('bg-gray-200', 'text-gray-500', 'bg-[#006A4E]', 'text-white');
                    indicator.classList.add('bg-[#006A4E]', 'text-white');
                } else if (step === currentStep) {
                    indicator.classList.remove('bg-gray-200', 'text-gray-500', 'bg-[#006A4E]', 'text-white');
                    indicator.classList.add('bg-[#006A4E]', 'text-white', 'ring-4', 'ring-[#006A4E]/30');
                } else {
                    indicator.classList.remove('bg-[#006A4E]', 'text-white', 'ring-4', 'ring-[#006A4E]/30');
                    indicator.classList.add('bg-gray-200', 'text-gray-500');
                }
            });

            // Update progress bars
            document.getElementById('progress-bar-1').style.width = currentStep > 1 ? '100%' : '0%';
            document.getElementById('progress-bar-2').style.width = currentStep > 2 ? '100%' : '0%';
        }

        function validateStep(step) {
            const stepElement = document.querySelector(`.form-step[data-step="${step}"]`);
            const inputs = stepElement.querySelectorAll('input[required], select[required], textarea[required]');
            let valid = true;

            inputs.forEach(input => {
                if (!input.value.trim()) {
                    input.classList.add('border-red-500');
                    valid = false;
                } else {
                    input.classList.remove('border-red-500');
                }
            });

            if (valid && step === 1) {
                const phoneInput = stepElement.querySelector('#phone');
                const phoneRegex = /^(\+88)?01[3-9]\d{8}$/;
                if (!phoneRegex.test(phoneInput.value.replace(/\s+/g, ''))) {
                    phoneInput.classList.add('border-red-500');
                    // Create or update error message
                    let errorMsg = phoneInput.parentElement.nextElementSibling;
                    if (!errorMsg || !errorMsg.classList.contains('text-red-500')) {
                        errorMsg = document.createElement('p');
                        errorMsg.className = 'text-xs text-red-500 mt-1';
                        phoneInput.parentElement.after(errorMsg);
                    }
                    errorMsg.textContent = '{{ __('messages.invalid_phone_error') }}';
                    valid = false;
                } else {
                     // Remove error message if exists
                     let errorMsg = phoneInput.parentElement.nextElementSibling;
                     if (errorMsg && errorMsg.classList.contains('text-red-500')) {
                         errorMsg.remove();
                     }
                }
            }

            if (!valid) {
                // alert('Please fill in all required fields');
                // Added nice shake effect or red borders are enough
                stepElement.classList.add('animate-shake');
                setTimeout(() => stepElement.classList.remove('animate-shake'), 500);
            }

            return valid;
        }

        function updatePreview() {
            document.getElementById('preview-union').textContent = document.getElementById('union_name').value;
            document.getElementById('preview-word').textContent = document.getElementById('word_number').value;
            document.getElementById('preview-phone').textContent = document.getElementById('phone').value;
            document.getElementById('preview-name').textContent = document.getElementById('name').value;
            document.getElementById('preview-subject').textContent = document.getElementById('subject').value;
            document.getElementById('preview-message').textContent = document.getElementById('message').value;
            
            
            const imageInput = document.getElementById('image');
            const fileBox = document.getElementById('preview-file-box');
            const noFileText = document.getElementById('preview-no-file');
            const thumbnail = document.getElementById('preview-thumbnail');
            const fileIcon = document.getElementById('preview-file-icon');

            if (imageInput.files.length > 0) {
                const file = imageInput.files[0];
                const sizeMB = (file.size / 1024 / 1024).toFixed(2);
                
                document.getElementById('preview-filename').textContent = file.name;
                document.getElementById('preview-filesize').textContent = sizeMB + ' MB';
                
                // Show box, hide no file text
                fileBox.classList.remove('hidden');
                noFileText.classList.add('hidden');

                // Generate thumbnail if image
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        thumbnail.src = e.target.result;
                        thumbnail.classList.remove('hidden');
                        fileIcon.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                } else {
                    thumbnail.classList.add('hidden');
                    fileIcon.classList.remove('hidden');
                }
            } else {
                fileBox.classList.add('hidden');
                noFileText.classList.remove('hidden');
            }
        }
    </script>

    <style>
        .step-indicator {
            transition: all 0.3s ease;
        }
        
        /* Fix for double arrows in select */
        select {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background-image: none;
        }

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
