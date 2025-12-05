<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = [
            ['key' => 'site_title', 'value_en' => 'Hello UNO', 'value_bn' => 'হ্যালো ইউএনও'],
            ['key' => 'about_us', 'value_en' => 'Welcome to the official complaint management system of Satkania Upazila.', 'value_bn' => 'সাতকানিয়া উপজেলার অফিসিয়াল অভিযোগ ব্যবস্থাপনা সিস্টেমে স্বাগতম।'],
            ['key' => 'contact_email', 'value_en' => 'uno.satkania@example.com', 'value_bn' => 'uno.satkania@example.com'],
            ['key' => 'contact_phone', 'value_en' => '+8801700000000', 'value_bn' => '+8801700000000'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
