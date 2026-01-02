@extends('layouts.frontend')

@section('content')
    <!-- Hero Section -->
    <section class="relative overflow-hidden" style="padding: 40px 10px;">
        <div class="absolute inset-0 bg-[#006A4E]">
            <img 
                src="{{ asset('images/gallery-bg.jpg') }}" 
                alt="Status Background" 
                class="w-full h-full object-cover opacity-30"
            >
        </div>
        
        <div class="absolute inset-0 bg-gradient-to-b from-black/50 to-black/30"></div>
        
        <div class="relative h-full flex items-center justify-center text-center px-6 pt-20">
            <div class="max-w-3xl">
                <h2 class="text-4xl md:text-5xl font-bold text-white mb-4 drop-shadow-lg animate-fade-in-up">Complaint Status</h2>
                <p class="text-lg text-white/90 drop-shadow-md animate-fade-in-up" style="animation-delay: 0.2s">Showing results for <span class="font-mono bg-white/20 px-2 py-1 rounded">{{ $phone }}</span></p>
            </div>
        </div>
    </section>

    <!-- Results Section -->
    <section class="relative py-20 bg-gray-50">
        <div class="container mx-auto px-6 max-w-4xl relative z-10">
            
            <div class="flex justify-between items-center mb-8">
                <h3 class="text-2xl font-bold drop-shadow-md shadow-black hidden md:block">Search Results</h3>
                <a href="{{ route('complaints.track') }}" class="text-sm font-bold text-white flex items-center gap-1 bg-[#006A4E] hover:bg-[#00513c] px-4 py-2 rounded-full shadow-md transition-all ml-auto md:ml-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                    </svg>
                    Check Another Number
                </a>
            </div>

            @if(session('success'))
            <div class="mb-8 bg-[#006A4E] border-l-4 border-[#006A4E] p-4 rounded-r shadow-lg animate-fade-in-up">
                <div class="flex">
                    <div class="flex-shrink-0">
                        <svg class="h-5 w-5 text-[#006A4E]" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                    </div>
                    <div class="ml-3">
                        <p class="text-sm text-[#006A4E] font-bold">{{ session('success') }}</p>
                    </div>
                </div>
            </div>
            @endif

            @if($complaints->isEmpty())
                <div class="bg-white rounded-3xl shadow-xl p-16 text-center border border-gray-100 animate-fade-in-up pt-5">
                    <div class="w-24 h-24 bg-gray-50 rounded-full flex items-center justify-center mx-auto mb-6 text-gray-300">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.172 16.172a4 4 0 015.656 0M9 10h.01M15 10h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-800 mb-3">No Complaints Found</h3>
                    <p class="text-gray-500 mb-8 max-w-md mx-auto">We couldn't find any complaints associated with this phone number. Please check the number or file a new one.</p>
                    <a href="{{ route('complaints.create') }}" class="inline-flex items-center px-8 py-4 bg-bd-green text-white font-bold rounded-xl shadow-lg hover:shadow-xl transition-all hover:-translate-y-1 hover:bg-bd-green-dark">
                        Submit a New Complaint
                    </a>
                </div>
            @else
                <div class="space-y-8">
                    @foreach($complaints as $complaint)
                        <div class="bg-white rounded-3xl shadow-xl border border-gray-100 overflow-hidden animate-fade-in-up hover:shadow-2xl transition-shadow duration-300" style="animation-delay: {{ $loop->index * 0.1 }}s; border: 2px solid #006A4E; margin-bottom: 10px !important;">
                            <div class="p-8">
                                <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6 gap-4 border-b border-gray-100 pb-6">
                                    <div>
                                        <div class="flex items-center gap-3 text-sm font-medium text-gray-400 mb-2">
                                            <span class="bg-gray-100 px-2 py-1 rounded text-gray-600">ID: #{{ $complaint->id }}</span>
                                            <span>&bull;</span>
                                            <span>{{ $complaint->created_at->format('M d, Y') }} at {{ $complaint->created_at->format('h:i A') }}</span>
                                        </div>
                                        <h3 class="text-2xl font-bold text-gray-800">{{ $complaint->subject }}</h3>
                                    </div>
                                    <span class="px-5 py-2 rounded-full text-sm font-bold uppercase tracking-wide" style="
                                            @if($complaint->status === 'resolved') background-color: #dcfce7; color: #166534;
                                        @elseif($complaint->status === 'rejected') background-color: #fee2e2; color: #991b1b;
                                        @elseif($complaint->status === 'in_progress') background-color: #dbeafe; color: #1e40af;
                                        @elseif($complaint->status === 'pending') background-color: #fff3c7; color: #ec5b00ff;
                                        @else background-color: #fef3c7; color: #92400e; @endif">
                                        {{ str_replace('_', ' ', $complaint->status) }}
                                    </span>
                                </div>
                                
                                <div class="prose prose-gray max-w-none mb-6">
                                    <p class="text-gray-600 leading-relaxed text-lg">{{ $complaint->message }}</p>
                                </div>

                                @if($complaint->image)
                                    <div class="mb-8">
                                        <p class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Attachment</p>
                                        <a href="{{ asset('storage/'.$complaint->image) }}" target="_blank" class="inline-block group relative overflow-hidden rounded-xl">
                                            <div class="absolute inset-0 bg-black/20 group-hover:bg-transparent transition-colors"></div>
                                            <img src="{{ asset('storage/'.$complaint->image) }}" alt="Attachment" class="h-32 w-auto rounded-xl border border-gray-200 shadow-sm">
                                        </a>
                                    </div>
                                @endif

                                @if($complaint->admin_reply)
                                    <div class="mt-8 relative">
                                        <div class="absolute -top-3 left-6">
                                             <span class="bg-bd-green text-white px-3 py-1 rounded-full text-xs font-bold shadow-sm flex items-center gap-1">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3" viewBox="0 0 20 20" fill="currentColor"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                                Official Response
                                             </span>
                                        </div>
                                        <div class="bg-gradient-to-br from-emerald-50 to-teal-50 rounded-2xl p-8 border border-emerald-100/50">
                                            <div class="flex items-start gap-5">
                                                <div class="w-12 h-12 rounded-full bg-white flex items-center justify-center text-bd-green shrink-0 shadow-md border border-emerald-100">
                                                     <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                                                    </svg>
                                                </div>
                                                <div class="flex-1">
                                                    <div class="flex items-center justify-between mb-2">
                                                        <h4 class="text-gray-900 font-bold text-lg">Upazila Administration</h4>
                                                        <span class="text-xs text-gray-500 font-medium">{{ $complaint->updated_at->format('M d, h:i A') }}</span>
                                                    </div>
                                                    <p class="text-gray-700 leading-relaxed">{{ $complaint->admin_reply }}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                    
                    <div class="mt-8">
                        {{ $complaints->links() }}
                    </div>
                </div>
            @endif
        </div>
    </section>
@endsection
