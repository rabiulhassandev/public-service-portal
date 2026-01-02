<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Site Settings') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                
                @php
                    $settingsByKey = $allSettings->keyBy('key');

                    $tabs = [
                        'general' => [
                            'label' => 'Basic Setup',
                            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>',
                            'groups' => [
                                'General Information' => ['site_title', 'about_us'],
                                'Contact Details' => ['contact_email', 'contact_phone'],
                                'Navigation Bar' => ['nav_home', 'nav_about', 'nav_complaints', 'nav_gallery', 'nav_contact', 'nav_login'],
                                'Footer Section' => ['footer_brand', 'footer_subbrand', 'footer_about', 'footer_quick_links', 'footer_home', 'footer_contact', 'footer_address', 'footer_rights'],
                            ]
                        ],
                        'hero' => [
                            'label' => 'Hero & Stats',
                            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>',
                            'groups' => [
                                'Hero Banner' => ['hero_badge', 'hero_title_prefix', 'hero_title_suffix', 'hero_desc', 'btn_submit', 'btn_track'],
                                'Statistics Area' => ['stats_total_label', 'stats_total_text', 'stats_resolved_label', 'stats_resolved_text', 'stats_pending_label', 'stats_pending_text'],
                            ]
                        ],
                        'content' => [
                            'label' => 'Page Content',
                            'icon' => '<svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/></svg>',
                            'groups' => [
                                'Services Section' => ['services_title', 'services_subtitle'],
                                'Service Cards' => ['service_1_title', 'service_1_desc', 'service_1_btn', 'service_2_title', 'service_2_desc', 'service_2_btn', 'service_3_title', 'service_3_desc', 'service_3_btn'],
                                'Mission Section' => ['mission_label', 'mission_title', 'mission_desc', 'transparency', 'support', 'quote_text', 'admin_role', 'admin_title'],
                            ]
                        ]
                    ];
                @endphp

                <form action="{{ route('admin.settings.update') }}" method="POST" x-data="{ activeTab: 'general' }">
                    @csrf

                    <!-- Tabs Navigation -->
                    <div class="flex flex-wrap gap-2 border-b border-gray-200 mb-6">
                        @foreach($tabs as $key => $tab)
                            <button type="button" 
                                @click="activeTab = '{{ $key }}'"
                                :class="{ 'border-bd-green text-bd-green bg-emerald-50': activeTab === '{{ $key }}', 'border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300': activeTab !== '{{ $key }}' }"
                                class="flex items-center gap-2 px-4 py-3 border-b-2 font-medium text-sm transition-all duration-200 outline-none">
                                {!! $tab['icon'] !!}
                                {{ $tab['label'] }}
                            </button>
                        @endforeach
                    </div>

                    <!-- Tabs Content -->
                    <div class="min-h-[400px]">
                        @foreach($tabs as $tabKey => $tab)
                            <div x-show="activeTab === '{{ $tabKey }}'" x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 translate-y-2" x-transition:enter-end="opacity-100 translate-y-0" style="display: none;">
                                
                                @foreach($tab['groups'] as $groupTitle => $keys)
                                    <div class="mb-8 bg-gray-50 rounded-xl border border-gray-100 p-5">
                                        <h3 class="text-sm font-bold text-gray-700 uppercase tracking-wider mb-4 border-b border-gray-200 pb-2 flex items-center gap-2">
                                            <span class="w-1.5 h-4 bg-bd-green rounded-full"></span>
                                            {{ $groupTitle }}
                                        </h3>
                                        
                                        <div class="grid grid-cols-1 gap-6">
                                            @foreach($keys as $key)
                                                @php
                                                    $setting = $settingsByKey[$key] ?? null;
                                                    $valEn = $setting ? $setting->value_en : '';
                                                    $valBn = $setting ? $setting->value_bn : '';
                                                    $label = ucwords(str_replace('_', ' ', $setting ? $setting->key : $key));
                                                @endphp
                                                @if($setting)
                                                <div class="grid grid-cols-1 md:grid-cols-12 gap-4 items-start">
                                                    <div class="md:col-span-2 pt-2">
                                                        <label class="text-xs font-semibold text-gray-500 uppercase">{{ $label }}</label>
                                                    </div>
                                                    <div class="md:col-span-10 grid grid-cols-1 md:grid-cols-2 gap-4">
                                                        <div class="relative">
                                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                <span class="text-gray-400 text-xs font-bold">EN</span>
                                                            </div>
                                                            @if(str_contains($key, 'desc') || str_contains($key, 'about') || str_contains($key, 'quote'))
                                                                <textarea name="settings[{{ $key }}][en]" class="pl-10 block w-full border-gray-300 focus:border-bd-green focus:ring-bd-green rounded-md shadow-sm text-sm" rows="2">{{ $valEn }}</textarea>
                                                            @else
                                                                <input type="text" name="settings[{{ $key }}][en]" value="{{ $valEn }}" class="pl-10 block w-full border-gray-300 focus:border-bd-green focus:ring-bd-green rounded-md shadow-sm text-sm" />
                                                            @endif
                                                        </div>
                                                        <div class="relative">
                                                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                                                <span class="text-gray-400 text-xs font-bold">BN</span>
                                                            </div>
                                                            @if(str_contains($key, 'desc') || str_contains($key, 'about') || str_contains($key, 'quote'))
                                                                <textarea name="settings[{{ $key }}][bn]" class="pl-10 block w-full border-gray-300 focus:border-bd-green focus:ring-bd-green rounded-md shadow-sm text-sm font-bangla" rows="2">{{ $valBn }}</textarea>
                                                            @else
                                                                <input type="text" name="settings[{{ $key }}][bn]" value="{{ $valBn }}" class="pl-10 block w-full border-gray-300 focus:border-bd-green focus:ring-bd-green rounded-md shadow-sm text-sm font-bangla" />
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endif
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach

                            </div>
                        @endforeach
                    </div>

                    <div class="flex justify-end pt-6 border-t border-gray-200 sticky bottom-0 bg-white/95 backdrop-blur-sm p-4 -mx-6 -mb-6 shadow-t">
                        <x-primary-button class="bg-[#006a4e] hover:bg-[#005a42]">
                            {{ __('Save All Changes') }}
                        </x-primary-button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Add custom style for local font application in admin inputs -->
    <style>
        @font-face {
            font-family: 'SolaimanLipi';
            src: url('{{ asset('fonts/SolaimanLipi/SolaimanLipi.woff') }}') format('woff');
        }
        .font-bangla {
            font-family: 'SolaimanLipi', sans-serif;
        }
    </style>
</x-app-layout>
