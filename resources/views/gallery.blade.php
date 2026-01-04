@extends('layouts.frontend')

@push('styles')
    <style>
        .modal {
            transition: opacity 0.3s ease;
        }
        .modal-content {
            animation: slideUp 0.3s ease;
        }
        @keyframes slideUp {
            from {
                transform: translateY(50px);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
@endpush

@section('title', settings('gallery_title', 'Photo Gallery - Satkania Upazila'))
@section('meta_description', settings('gallery_meta_desc', 'Explore photos of events, development projects, and activities in Satkania Upazila.'))
@section('meta_keywords', settings('gallery_meta_keywords', 'Satkania Photos, Gallery, Events, Development, Community'))

@section('content')
    <!-- Page Header with Background Image -->
    <section class="relative overflow-hidden" style="padding: 40px 10px;">
        <!-- Background Image -->
        <div class="absolute inset-0 bg-[#006A4E]">
            <img 
                src="{{ asset('images/gallery-bg.jpg') }}" 
                alt="Gallery Background" 
                class="w-full h-full object-cover opacity-30"
            >
        </div>
        
        <!-- Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30"></div>
        
        <!-- Content -->
        <div class="relative h-full flex items-center justify-center text-center px-6 pt-20">
            <div class="max-w-3xl">
                <h2 class="text-5xl md:text-6xl font-bold text-white mb-4 drop-shadow-lg animate-fade-in-up">Photo Gallery</h2>
                <p class="text-xl text-white/90 drop-shadow-md animate-fade-in-up" style="animation-delay: 0.2s">Explore events and development projects in our community</p>
            </div>
        </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-16 bg-gray-50">
        <div class="container mx-auto px-6">
            @if($galleries->count() > 0)
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($galleries as $gallery)
                        <div class="group bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100 hover:shadow-2xl transition-all duration-300 transform hover:-translate-y-2">
                            <!-- Image -->
                            <div class="relative overflow-hidden aspect-[4/3]">
                                <img 
                                    src="{{ asset('storage/' . $gallery->image) }}" 
                                    alt="{{ $gallery->title }}" 
                                    class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                                >
                                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </div>
                            
                            <!-- Content -->
                            <div class="p-6">
                                <h3 class="text-xl font-bold text-gray-900 mb-3 group-hover:text-bd-green transition-colors">
                                    {{ $gallery->title }}
                                </h3>
                                
                                <div class="flex items-center justify-between">
                                    <span class="text-xs text-gray-500">{{ $gallery->created_at->format('d M Y') }}</span>
                                    <button 
                                        onclick="openModal({{ $gallery->id }})"
                                        class="px-4 py-2 bg-bd-green hover:bg-bd-green-dark text-white text-sm font-semibold rounded-lg transition-colors duration-200 transform hover:scale-105"
                                    >
                                        View Details
                                    </button>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for this gallery item -->
                        <div id="modal-{{ $gallery->id }}" class="modal fixed inset-0 bg-black/70 backdrop-blur-sm hidden items-center justify-center z-[60] p-4" onclick="closeModal({{ $gallery->id }})">
                            <div class="modal-content bg-white rounded-3xl max-w-4xl w-full max-h-[90vh] overflow-y-auto shadow-2xl" onclick="event.stopPropagation()">
                                <!-- Modal Header -->
                                <div class="sticky top-0 bg-bd-green text-white p-6 rounded-t-3xl flex justify-between items-center z-10">
                                    <div>
                                        <h3 class="text-2xl font-bold">{{ $gallery->title }}</h3>
                                        <p class="text-emerald-100 text-sm mt-1">{{ $gallery->created_at->format('d M Y, h:i A') }}</p>
                                    </div>
                                    <button 
                                        onclick="closeModal({{ $gallery->id }})"
                                        class="w-10 h-10 bg-white/20 hover:bg-white/30 rounded-full flex items-center justify-center transition-colors"
                                    >
                                        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>

                                <!-- Modal Body -->
                                <div class="p-8">
                                    <!-- Image -->
                                    <div class="mb-6 rounded-2xl overflow-hidden shadow-lg">
                                        <img 
                                            src="{{ asset('storage/' . $gallery->image) }}" 
                                            alt="{{ $gallery->title }}" 
                                            class="w-full h-auto"
                                        >
                                    </div>

                                    <!-- Details -->
                                    <div class="space-y-6">
                                        <!-- Title -->
                                        <div>
                                            <label class="block text-sm font-semibold text-gray-500 mb-2">Title</label>
                                            <p class="text-xl font-bold text-gray-900">{{ $gallery->title }}</p>
                                        </div>

                                        <!-- Description -->
                                        @if($gallery->description)
                                            <div>
                                                <label class="block text-sm font-semibold text-gray-500 mb-2">Description</label>
                                                <div class="bg-gray-50 rounded-xl p-4 border border-gray-200">
                                                    <p class="text-gray-700 leading-relaxed whitespace-pre-wrap">{{ $gallery->description }}</p>
                                                </div>
                                            </div>
                                        @endif

                                        <!-- Meta Information -->
                                        <div class="grid grid-cols-2 gap-4 pt-4 border-t border-gray-200">
                                            <div>
                                                <label class="block text-sm font-semibold text-gray-500 mb-1">Published Date</label>
                                                <p class="text-gray-900">{{ $gallery->created_at->format('d M Y') }}</p>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-semibold text-gray-500 mb-1">Order</label>
                                                <p class="text-gray-900">#{{ $gallery->order }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Modal Footer -->
                                <div class="sticky bottom-0 bg-gray-50 px-8 py-4 rounded-b-3xl border-t border-gray-200">
                                    <button 
                                        onclick="closeModal({{ $gallery->id }})"
                                        class="w-full px-6 py-3 bg-gray-200 hover:bg-gray-300 text-gray-700 font-semibold rounded-lg transition-colors"
                                    >
                                        Close
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <!-- Empty State -->
                <div class="text-center py-20">
                    <div class="inline-flex items-center justify-center w-24 h-24 bg-gray-100 rounded-full mb-6">
                        <svg class="w-12 h-12 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-2">No Gallery Items Yet</h3>
                    <p class="text-gray-600">Check back soon for updates on our events and projects!</p>
                </div>
            @endif
        </div>
    </section>
@endsection

@push('scripts')
    <script>
        function openModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(id) {
            const modal = document.getElementById('modal-' + id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
            document.body.style.overflow = 'auto';
        }

        // Close modal on Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                const modals = document.querySelectorAll('.modal');
                modals.forEach(modal => {
                    modal.classList.add('hidden');
                    modal.classList.remove('flex');
                });
                document.body.style.overflow = 'auto';
            }
        });
    </script>
@endpush
