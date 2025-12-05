<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.submit_complaint') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <!-- Success Message -->
            <div id="successMessage" class="hidden mb-6 bg-green-50 border-l-4 border-green-500 p-4 rounded-r shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-green-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-green-700 font-medium" id="successText"></p>
                    </div>
                </div>
            </div>

            <!-- Error Messages Container -->
            <div id="errorContainer" class="hidden mb-6 bg-red-50 border-l-4 border-red-500 p-4 rounded-r shadow-sm">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-red-400" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-red-800">Please correct the following errors:</h3>
                        <ul id="errorList" class="mt-2 text-sm text-red-700 list-disc list-inside space-y-1"></ul>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-purple-50">
                    <h3 class="text-lg font-bold text-gray-800">Submit Your Complaint</h3>
                    <p class="text-sm text-gray-600 mt-1">Fill in the details below to submit your complaint to the UNO office</p>
                </div>
                
                <div class="p-8">
                    <form id="complaintForm" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <!-- Union -->
                            <div>
                                <x-input-label for="union_name" :value="__('messages.union')" />
                                <select id="union_name" name="union_name" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors" required>
                                    <option value="">Select Union</option>
                                    <option value="Satkania">Satkania</option>
                                    <option value="Madarsha">Madarsha</option>
                                    <option value="Eochia">Eochia</option>
                                    <option value="Kanchana">Kanchana</option>
                                    <option value="Amilaish">Amilaish</option>
                                </select>
                                <p class="text-red-600 text-sm mt-1 hidden" id="error-union_name"></p>
                            </div>

                            <!-- Word Number -->
                            <div>
                                <x-input-label for="word_number" :value="__('messages.word')" />
                                <select id="word_number" name="word_number" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors" required>
                                    <option value="">Select Word</option>
                                    @foreach(range(1, 9) as $word)
                                        <option value="{{ $word }}">{{ $word }}</option>
                                    @endforeach
                                </select>
                                <p class="text-red-600 text-sm mt-1 hidden" id="error-word_number"></p>
                            </div>

                            <!-- Subject -->
                            <div class="md:col-span-2">
                                <x-input-label for="subject" :value="__('messages.subject')" />
                                <x-text-input id="subject" class="block mt-1 w-full" type="text" name="subject" placeholder="Brief description of your complaint" required />
                                <p class="text-red-600 text-sm mt-1 hidden" id="error-subject"></p>
                            </div>

                            <!-- Message -->
                            <div class="md:col-span-2">
                                <x-input-label for="message" :value="__('messages.message')" />
                                <textarea id="message" name="message" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm transition-colors" rows="5" placeholder="Provide detailed information about your complaint..." required></textarea>
                                <p class="text-red-600 text-sm mt-1 hidden" id="error-message"></p>
                            </div>

                            <!-- Image -->
                            <div class="md:col-span-2">
                                <x-input-label for="image" :value="__('Image (Optional)')" />
                                <div class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-lg hover:border-indigo-400 transition-colors">
                                    <div class="space-y-1 text-center">
                                        <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none" viewBox="0 0 48 48">
                                            <path d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label for="image" class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none">
                                                <span>Upload a file</span>
                                                <input id="image" name="image" type="file" class="sr-only" accept="image/*">
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                        <p class="text-xs text-gray-700 font-medium hidden" id="fileName"></p>
                                    </div>
                                </div>
                                <p class="text-red-600 text-sm mt-1 hidden" id="error-image"></p>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-8 pt-6 border-t border-gray-100">
                            <a href="{{ route('citizen.dashboard') }}" class="text-gray-600 hover:text-gray-900 mr-4 font-medium">Cancel</a>
                            <button type="submit" id="submitBtn" class="inline-flex items-center px-6 py-3 bg-indigo-600 hover:bg-indigo-700 text-white font-semibold rounded-lg shadow-lg hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                                <svg class="w-5 h-5 mr-2 hidden" id="loadingSpinner" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span id="submitText">{{ __('messages.submit') }}</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        // File input preview
        document.getElementById('image').addEventListener('change', function(e) {
            const fileName = e.target.files[0]?.name;
            const fileNameDisplay = document.getElementById('fileName');
            if (fileName) {
                fileNameDisplay.textContent = fileName;
                fileNameDisplay.classList.remove('hidden');
            } else {
                fileNameDisplay.classList.add('hidden');
            }
        });

        // Form submission
        document.getElementById('complaintForm').addEventListener('submit', function(e) {
            e.preventDefault();
            
            // Clear previous errors
            document.querySelectorAll('[id^="error-"]').forEach(el => {
                el.classList.add('hidden');
                el.textContent = '';
            });
            document.getElementById('errorContainer').classList.add('hidden');
            document.getElementById('errorList').innerHTML = '';
            document.getElementById('successMessage').classList.add('hidden');
            
            // Show loading state
            const submitBtn = document.getElementById('submitBtn');
            const submitText = document.getElementById('submitText');
            const loadingSpinner = document.getElementById('loadingSpinner');
            
            submitBtn.disabled = true;
            submitText.textContent = 'Submitting...';
            loadingSpinner.classList.remove('hidden');
            loadingSpinner.classList.add('animate-spin');
            
            let formData = new FormData(this);
            
            axios.post("{{ route('citizen.complaints.store') }}", formData)
                .then(response => {
                    if (response.data.success) {
                        document.getElementById('successText').textContent = response.data.message;
                        document.getElementById('successMessage').classList.remove('hidden');
                        this.reset();
                        document.getElementById('fileName').classList.add('hidden');
                        
                        // Scroll to top to show success message
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                        
                        setTimeout(() => {
                            window.location.href = "{{ route('citizen.complaints.index') }}";
                        }, 2000);
                    }
                })
                .catch(error => {
                    // Reset button state
                    submitBtn.disabled = false;
                    submitText.textContent = "{{ __('messages.submit') }}";
                    loadingSpinner.classList.add('hidden');
                    
                    if (error.response && error.response.status === 422) {
                        // Validation errors
                        const errors = error.response.data.errors;
                        const errorList = document.getElementById('errorList');
                        
                        // Show error container
                        document.getElementById('errorContainer').classList.remove('hidden');
                        
                        // Display each error
                        Object.keys(errors).forEach(field => {
                            const errorElement = document.getElementById(`error-${field}`);
                            if (errorElement) {
                                errorElement.textContent = errors[field][0];
                                errorElement.classList.remove('hidden');
                            }
                            
                            // Add to error list
                            const li = document.createElement('li');
                            li.textContent = errors[field][0];
                            errorList.appendChild(li);
                        });
                        
                        // Scroll to top to show errors
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    } else {
                        // Generic error
                        const errorList = document.getElementById('errorList');
                        document.getElementById('errorContainer').classList.remove('hidden');
                        const li = document.createElement('li');
                        li.textContent = error.response?.data?.message || 'An unexpected error occurred. Please try again.';
                        errorList.appendChild(li);
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    }
                });
        });
    </script>
</x-app-layout>
