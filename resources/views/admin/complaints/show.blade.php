<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Complaint Details') }} #{{ $complaint->id }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <!-- Details -->
                <div class="md:col-span-2 bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                    <h3 class="text-lg font-medium mb-4">Complaint Information</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-sm text-gray-500">Subject</p>
                            <p class="font-semibold">{{ $complaint->subject }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Date</p>
                            <p class="font-semibold">{{ $complaint->created_at->format('d M Y h:i A') }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Union</p>
                            <p class="font-semibold">{{ $complaint->union_name }}</p>
                        </div>
                        <div>
                            <p class="text-sm text-gray-500">Word</p>
                            <p class="font-semibold">{{ $complaint->word_number }}</p>
                        </div>
                    </div>
                    <div class="mt-4">
                        <p class="text-sm text-gray-500">Message</p>
                        <p class="mt-1 text-gray-900 whitespace-pre-wrap">{{ $complaint->message }}</p>
                    </div>
                    @if($complaint->image)
                        <div class="mt-4">
                            <p class="text-sm text-gray-500 mb-2">Attachment</p>
                            <img src="{{ asset('storage/' . $complaint->image) }}" alt="Attachment" class="max-w-full h-auto rounded-lg border">
                        </div>
                    @endif

                    <div class="mt-6 border-t pt-4">
                        <h4 class="font-medium mb-2">Citizen Details</h4>
                        <p><span class="text-gray-500">Name:</span> {{ $complaint->user->name }}</p>
                        <p><span class="text-gray-500">Phone:</span> {{ $complaint->user->phone }}</p>
                        <p><span class="text-gray-500">Address:</span> {{ $complaint->user->address }}</p>
                    </div>
                </div>

                <!-- Actions -->
                <div class="md:col-span-1 space-y-6">
                    <!-- Status Update -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-medium mb-4">Update Status</h3>
                        <form action="{{ route('admin.complaints.updateStatus', $complaint) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <select name="status" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mb-4">
                                <option value="pending" {{ $complaint->status == 'pending' ? 'selected' : '' }}>Pending</option>
                                <option value="in_progress" {{ $complaint->status == 'in_progress' ? 'selected' : '' }}>In Progress</option>
                                <option value="resolved" {{ $complaint->status == 'resolved' ? 'selected' : '' }}>Resolved</option>
                                <option value="rejected" {{ $complaint->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
                            </select>
                            <x-primary-button class="w-full justify-center">Update Status</x-primary-button>
                        </form>
                    </div>

                    <!-- Reply -->
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                        <h3 class="text-lg font-medium mb-4">Admin Reply</h3>
                        <form action="{{ route('admin.complaints.reply', $complaint) }}" method="POST">
                            @csrf
                            <textarea name="reply" rows="4" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mb-4" placeholder="Write a reply...">{{ $complaint->admin_reply }}</textarea>
                            <x-primary-button class="w-full justify-center">Send Reply</x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
