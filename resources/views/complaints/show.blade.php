<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('messages.complaint_details') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-gradient-to-r from-indigo-50 to-purple-50 flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-800">{{ __('messages.complaint_id_prefix') }}{{ $complaint->id }}</h3>
                        <p class="text-sm text-gray-600 mt-1">{{ __('messages.submitted_on') }} {{ $complaint->created_at->format('d M Y, h:i A') }}</p>
                    </div>
                    <div>
                        <span class="px-4 py-2 inline-flex text-sm font-semibold rounded-full 
                            @if($complaint->status == 'pending') bg-yellow-100 text-yellow-800 border border-yellow-200
                            @elseif($complaint->status == 'in_progress') bg-blue-100 text-blue-800 border border-blue-200
                            @elseif($complaint->status == 'resolved') bg-green-100 text-green-800 border border-green-200
                            @else bg-red-100 text-red-800 border border-red-200 @endif">
                            {{ ucfirst(str_replace('_', ' ', $complaint->status)) }}
                        </span>
                    </div>
                </div>

                <div class="p-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">
                        <!-- Subject -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500 mb-2">{{ __('messages.subject') }}</label>
                            <p class="text-lg font-semibold text-gray-900">{{ $complaint->subject }}</p>
                        </div>

                        <!-- Union -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-2">{{ __('messages.union') }}</label>
                            <p class="text-gray-900">{{ $complaint->union_name }}</p>
                        </div>

                        <!-- Word Number -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-2">{{ __('messages.word') }}</label>
                            <p class="text-gray-900">{{ $complaint->word_number }}</p>
                        </div>

                        <!-- Message -->
                        <div class="md:col-span-2">
                            <label class="block text-sm font-medium text-gray-500 mb-2">{{ __('messages.complaint_details') }}</label>
                            <div class="bg-gray-50 rounded-lg p-4 border border-gray-200">
                                <p class="text-gray-900 whitespace-pre-wrap">{{ $complaint->message }}</p>
                            </div>
                        </div>

                        <!-- Image -->
                        @if($complaint->image)
                            <div class="md:col-span-2">
                                <label class="block text-sm font-medium text-gray-500 mb-2">{{ __('messages.attachment') }}</label>
                                <div class="mt-2">
                                    <img src="{{ asset('storage/' . $complaint->image) }}" alt="Complaint Image" class="max-w-full h-auto rounded-lg border border-gray-200 shadow-sm">
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Admin Reply Section -->
                    @if($complaint->admin_reply)
                        <div class="mt-8 pt-8 border-t border-gray-200">
                            <div class="bg-blue-50 rounded-lg p-6 border border-blue-200">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z" />
                                        </svg>
                                    </div>
                                    <div class="ml-3 flex-1">
                                        <h4 class="text-sm font-semibold text-blue-900 mb-2">{{ __('messages.admin_reply') }}</h4>
                                        <p class="text-sm text-blue-800 whitespace-pre-wrap">{{ $complaint->admin_reply }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Action Buttons -->
                    <div class="mt-8 pt-6 border-t border-gray-100 flex justify-between items-center">
                        <a href="{{ route('citizen.complaints.index') }}" class="inline-flex items-center px-4 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition-colors">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            {{ __('messages.back_to_complaints') }}
                        </a>
                        
                        <div class="text-sm text-gray-500">
                            {{ __('messages.last_updated') }} {{ $complaint->updated_at->format('d M Y, h:i A') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
