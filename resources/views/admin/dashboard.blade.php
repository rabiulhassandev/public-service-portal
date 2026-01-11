<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12 bg-gray-50 min-h-screen px-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <!-- Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <!-- Total Complaints -->
                <!-- Total Complaints -->
                <a href="{{ route('admin.complaints.index') }}" class="block group">
                    <div class="bg-gradient-to-br from-purple-500 to-indigo-600 rounded-2xl shadow-lg p-6 text-white relative overflow-hidden transition-transform transform hover:scale-105">
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white/20 blur-2xl"></div>
                        <div class="relative z-10">
                            <div class="text-indigo-100 text-sm font-medium uppercase tracking-wider mb-1">Total Complaints</div>
                            <div class="text-4xl font-extrabold">{{ $stats['total'] }}</div>
                        </div>
                        <div class="absolute bottom-4 right-4 text-indigo-200/50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Pending -->
                <div class="bg-gradient-to-br from-yellow-400 to-orange-500 rounded-2xl shadow-lg p-6 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white/20 blur-2xl"></div>
                    <div class="relative z-10">
                        <div class="text-yellow-100 text-sm font-medium uppercase tracking-wider mb-1">Pending</div>
                        <div class="text-4xl font-extrabold">{{ $stats['pending'] }}</div>
                    </div>
                    <div class="absolute bottom-4 right-4 text-yellow-200/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Resolved -->
                <div class="bg-gradient-to-br from-green-400 to-emerald-600 rounded-2xl shadow-lg p-6 text-white relative overflow-hidden">
                    <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white/20 blur-2xl"></div>
                    <div class="relative z-10">
                        <div class="text-green-100 text-sm font-medium uppercase tracking-wider mb-1">Resolved</div>
                        <div class="text-4xl font-extrabold">{{ $stats['resolved'] }}</div>
                    </div>
                    <div class="absolute bottom-4 right-4 text-green-200/50">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>

                <!-- Users -->
                <a href="{{ route('admin.users.index') }}" class="block group">
                    <div class="bg-gradient-to-br from-blue-400 to-cyan-600 rounded-2xl shadow-lg p-6 text-white relative overflow-hidden transition-transform transform hover:scale-105">
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white/20 blur-2xl"></div>
                        <div class="relative z-10">
                            <div class="text-blue-100 text-sm font-medium uppercase tracking-wider mb-1">Users</div>
                            <div class="text-4xl font-extrabold">{{ $stats['users'] }}</div>
                        </div>
                        <div class="absolute bottom-4 right-4 text-blue-200/50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </div>
                    </div>
                </a>

                <!-- Gallery -->
                <a href="{{ route('admin.galleries.index') }}" class="block group">
                    <div class="bg-gradient-to-br from-pink-400 to-rose-600 rounded-2xl shadow-lg p-6 text-white relative overflow-hidden transition-transform transform hover:scale-105">
                        <div class="absolute top-0 right-0 -mr-8 -mt-8 w-32 h-32 rounded-full bg-white/20 blur-2xl"></div>
                        <div class="relative z-10">
                            <div class="text-pink-100 text-sm font-medium uppercase tracking-wider mb-1">Gallery</div>
                            <div class="text-4xl font-extrabold">{{ $stats['gallery'] }}</div>
                        </div>
                        <div class="absolute bottom-4 right-4 text-pink-200/50">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
                            </svg>
                        </div>
                    </div>
                </a>
            </div>

            <!-- Complaints Table -->
            <div class="bg-white rounded-2xl shadow-lg overflow-hidden border border-gray-100">
                <div class="p-6 border-b border-gray-100 bg-gray-50/50 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-800">Recent Complaints</h3>
                    <a href="{{ route('admin.complaints.index') }}" class="text-sm font-medium text-indigo-600 hover:text-indigo-800 transition-colors">View All &rarr;</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-100">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">ID</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Citizen</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Subject</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Date</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-gray-500 uppercase tracking-wider">Action</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach($complaints as $complaint)
                                <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">#{{ $complaint->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $complaint->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 font-medium">{{ $complaint->subject }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $complaint->created_at->format('d M Y') }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full 
                                            @if($complaint->status == 'pending') bg-yellow-100 text-yellow-800 border border-yellow-200
                                            @elseif($complaint->status == 'in_progress') bg-blue-100 text-blue-800 border border-blue-200
                                            @elseif($complaint->status == 'resolved') bg-green-100 text-green-800 border border-green-200
                                            @else bg-red-100 text-red-800 border border-red-200 @endif">
                                            {{ ucfirst($complaint->status) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        <a href="{{ route('admin.complaints.show', $complaint) }}" class="text-indigo-600 hover:text-indigo-900 bg-indigo-50 hover:bg-indigo-100 px-3 py-1 rounded-lg transition-colors duration-200">View</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="p-4 border-t border-gray-100 bg-gray-50/50">
                    @if(method_exists($complaints, 'links'))
                        {{ $complaints->links() }}
                    @else
                        <div class="text-center text-sm text-gray-500">
                            Showing latest {{ $complaints->count() }} complaints
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
