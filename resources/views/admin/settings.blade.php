<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Site Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('admin.settings.update') }}" method="POST">
                    @csrf
                    
                    @foreach($allSettings as $setting)
                        <div class="mb-6 border-b pb-4">
                            <h3 class="text-lg font-medium mb-2 uppercase text-gray-400 text-xs tracking-wider">{{ str_replace('_', ' ', $setting->key) }}</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label :for="'settings['.$setting->key.'][en]'" value="English" />
                                    <textarea name="settings[{{ $setting->key }}][en]" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm min-h-[42px]" rows="2">{{ $setting->value_en }}</textarea>
                                </div>
                                <div>
                                    <x-input-label :for="'settings['.$setting->key.'][bn]'" value="Bengali" />
                                    <textarea name="settings[{{ $setting->key }}][bn]" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm min-h-[42px]" rows="2">{{ $setting->value_bn }}</textarea>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="flex justify-end">
                        <x-primary-button>Save Settings</x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
