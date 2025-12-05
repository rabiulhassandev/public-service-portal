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
                    
                    @php
                        $keys = ['site_title', 'about_us', 'contact_email', 'contact_phone'];
                        $labels = ['Site Title', 'About Us', 'Contact Email', 'Contact Phone'];
                    @endphp

                    @foreach($keys as $index => $key)
                        @php
                            $setting = $allSettings->where('key', $key)->first();
                            $valEn = $setting ? $setting->value_en : '';
                            $valBn = $setting ? $setting->value_bn : '';
                        @endphp
                        <div class="mb-6 border-b pb-4">
                            <h3 class="text-lg font-medium mb-2">{{ $labels[$index] }}</h3>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <x-input-label :for="'settings['.$key.'][en]'" value="English" />
                                    @if($key == 'about_us')
                                        <textarea name="settings[{{ $key }}][en]" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ $valEn }}</textarea>
                                    @else
                                        <x-text-input :name="'settings['.$key.'][en]'" :value="$valEn" class="block mt-1 w-full" />
                                    @endif
                                </div>
                                <div>
                                    <x-input-label :for="'settings['.$key.'][bn]'" value="Bengali" />
                                    @if($key == 'about_us')
                                        <textarea name="settings[{{ $key }}][bn]" class="block mt-1 w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" rows="3">{{ $valBn }}</textarea>
                                    @else
                                        <x-text-input :name="'settings['.$key.'][bn]'" :value="$valBn" class="block mt-1 w-full" />
                                    @endif
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
