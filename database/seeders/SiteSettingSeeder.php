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
            // General
            ['key' => 'site_title', 'value_en' => 'Hello UNO', 'value_bn' => 'হ্যালো ইউএনও'],
            ['key' => 'about_us', 'value_en' => 'Welcome to the official complaint management system. We are here to serve you.', 'value_bn' => 'অফিসিয়াল অভিযোগ ব্যবস্থাপনা সিস্টেমে স্বাগতম। আমরা আপনার সেবায় নিয়োজিত।'],
            ['key' => 'contact_email', 'value_en' => 'uno.satkania@example.com', 'value_bn' => 'uno.satkania@example.com'],
            ['key' => 'contact_phone', 'value_en' => '+8801700000000', 'value_bn' => '+8801700000000'],

            // Hero Section
            ['key' => 'hero_badge', 'value_en' => 'Satkania Upazila', 'value_bn' => 'সাতকানিয়া উপজেলা'],
            ['key' => 'hero_title_prefix', 'value_en' => 'Serving with', 'value_bn' => 'সেবা দিচ্ছি'],
            ['key' => 'hero_title_suffix', 'value_en' => 'Transparency', 'value_bn' => 'স্বচ্ছতার সাথে'],
            ['key' => 'hero_desc', 'value_en' => 'Your gateway to modern governance and citizen services. We are committed to hearing your voice and addressing your concerns promptly.', 'value_bn' => 'আধুনিক সুশাসন এবং নাগরিক সেবার আপনার প্রবেশদ্বার। আমরা আপনার কথা শুনতে এবং আপনার উদ্বেগের দ্রুত সমাধান করতে প্রতিশ্রুতিবদ্ধ।'],
            ['key' => 'btn_submit', 'value_en' => 'Submit Complaint', 'value_bn' => 'অভিযোগ জানান'],
            ['key' => 'btn_track', 'value_en' => 'Track Complaint', 'value_bn' => 'অভিযোগ ট্র্যাক করুন'],

            // Stats Section
            ['key' => 'stats_total_label', 'value_en' => 'Total', 'value_bn' => 'মোট'],
            ['key' => 'stats_total_text', 'value_en' => 'Complaints Filed', 'value_bn' => 'দায়েরকৃত অভিযোগ'],
            ['key' => 'stats_resolved_label', 'value_en' => 'Success', 'value_bn' => 'সফল'],
            ['key' => 'stats_resolved_text', 'value_en' => 'Successfully Resolved', 'value_bn' => 'সফলভাবে সমাধানকৃত'],
            ['key' => 'stats_pending_label', 'value_en' => 'Active', 'value_bn' => 'সক্রিয়'],
            ['key' => 'stats_pending_text', 'value_en' => 'Under Processing', 'value_bn' => 'প্রক্রিয়াধীন'],

            // Services
            ['key' => 'services_title', 'value_en' => 'Digital Services', 'value_bn' => 'ডিজিটাল সেবাসমূহ'],
            ['key' => 'services_subtitle', 'value_en' => 'Access our services quickly and easily from the comfort of your home.', 'value_bn' => 'ঘরে বসেই দ্রুত এবং সহজে আমাদের সেবা গ্রহণ করুন।'],
            
            ['key' => 'service_1_title', 'value_en' => 'File a Complaint', 'value_bn' => 'অভিযোগ দায়ের করুন'],
            ['key' => 'service_1_desc', 'value_en' => 'Submit your concerns directly to the administration. We ensure confidentiality and quick resolution.', 'value_bn' => 'সরাসরি প্রশাসনের কাছে আপনার অভিযোগ জমা দিন। আমরা গোপনীয়তা এবং দ্রুত সমাধানের নিশ্চয়তা দিই।'],
            ['key' => 'service_1_btn', 'value_en' => 'Start Now', 'value_bn' => 'শুরু করুন'],

            ['key' => 'service_2_title', 'value_en' => 'Photo Gallery', 'value_bn' => 'ফটো গ্যালারি'],
            ['key' => 'service_2_desc', 'value_en' => 'Explore the development projects, cultural events, and activities happening across the Upazila.', 'value_bn' => 'উপজেলা জুড়ে উন্নয়ন প্রকল্প, সাংস্কৃতিক অনুষ্ঠান এবং কার্যক্রমগুলি অন্বেষণ করুন।'],
            ['key' => 'service_2_btn', 'value_en' => 'View Gallery', 'value_bn' => 'গ্যালারি দেখুন'],

            ['key' => 'service_3_title', 'value_en' => 'Contact Us', 'value_bn' => 'যোগাযোগ করুন'],
            ['key' => 'service_3_desc', 'value_en' => 'Need assistance? Get in touch with our office directly for any inquiries or support.', 'value_bn' => 'সহায়তা প্রয়োজন? যেকোনো অনুসন্ধান বা সহায়তার জন্য সরাসরি আমাদের অফিসের সাথে যোগাযোগ করুন।'],
            ['key' => 'service_3_btn', 'value_en' => 'Get in Touch', 'value_bn' => 'যোগাযোগ করুন'],

            // Mission
            ['key' => 'mission_label', 'value_en' => 'Our Mission', 'value_bn' => 'আমাদের লক্ষ্য'],
            ['key' => 'mission_title', 'value_en' => 'Building a Prosperous Community Together', 'value_bn' => 'একসাথে একটি সমৃদ্ধ কমিউনিটি গড়ে তোলা'],
            ['key' => 'mission_desc', 'value_en' => 'We are committed to building a better and more prosperous Upazila through transparency, accountability, and citizen-centric service delivery. Our goal is to ensure every citizen\'s voice is heard and their concerns are addressed promptly.', 'value_bn' => 'আমরা স্বচ্ছতা, জবাবদিহিতা এবং নাগরিক-কেন্দ্রিক সেবা প্রদানের মাধ্যমে একটি উন্নত ও সমৃদ্ধ উপজেলা গড়তে প্রতিশ্রুতিবদ্ধ। আমাদের লক্ষ্য প্রতিটি নাগরিকের কণ্ঠস্বর শোনা এবং তাদের উদ্বেগের দ্রুত সমাধান নিশ্চিত করা।'],
            ['key' => 'transparency', 'value_en' => 'Transparency', 'value_bn' => 'স্বচ্ছতা'],
            ['key' => 'support', 'value_en' => 'Support', 'value_bn' => 'সহায়তা'],
            ['key' => 'quote_text', 'value_en' => '"Our administration is dedicated to serving the people with integrity and speed. We believe in a digital-first approach to solve modern problems."', 'value_bn' => '"আমাদের প্রশাসন সততা ও দ্রুততার সাথে জনগণের সেবা করতে নিবেদিত। আমরা আধুনিক সমস্যা সমাধানে ডিজিটাল-ফার্স্ট পদ্ধতিতে বিশ্বাসী।"'],
            ['key' => 'admin_role', 'value_en' => 'Administration Head', 'value_bn' => 'প্রশাসন প্রধান'],
            ['key' => 'admin_title', 'value_en' => 'Upazila Nirbahi Officer', 'value_bn' => 'উপজেলা নির্বাহী অফিসার'],

            // Footer
            ['key' => 'footer_brand', 'value_en' => 'Upazila Administration', 'value_bn' => 'উপজেলা প্রশাসন'],
            ['key' => 'footer_subbrand', 'value_en' => 'Government of Bangladesh', 'value_bn' => 'গণপ্রজাতন্ত্রী বাংলাদেশ সরকার'],
            ['key' => 'footer_about', 'value_en' => 'Serving with transparency and dedication. We are here to listen and act for the betterment of our community.', 'value_bn' => 'স্বচ্ছতা এবং উৎসর্গীকৃতভাবে সেবা প্রদান। আমরা আমাদের সম্প্রদায়ের উন্নতির জন্য শুনতে এবং কাজ করতে এখানে আছি।'],
            ['key' => 'footer_quick_links', 'value_en' => 'Quick Links', 'value_bn' => 'দ্রুত লিঙ্ক'],
            ['key' => 'footer_home', 'value_en' => 'Home', 'value_bn' => 'হোম'],
            ['key' => 'footer_contact', 'value_en' => 'Contact Us', 'value_bn' => 'যোগাযোগ'],
            ['key' => 'footer_address', 'value_en' => 'Upazila Administration Office, Main Road', 'value_bn' => 'উপজেলা প্রশাসন কার্যালয়, প্রধান সড়ক'],
            ['key' => 'footer_rights', 'value_en' => 'All rights reserved.', 'value_bn' => 'সর্বস্বত্ব সংরক্ষিত।'],

            // Nav
            ['key' => 'nav_home', 'value_en' => 'Home', 'value_bn' => 'হোম'],
            ['key' => 'nav_about', 'value_en' => 'About', 'value_bn' => 'আমাদের সম্পর্কে'],
            ['key' => 'nav_complaints', 'value_en' => 'Complaints', 'value_bn' => 'অভিযোগ'],
            ['key' => 'nav_gallery', 'value_en' => 'Gallery', 'value_bn' => 'গ্যালারি'],
            ['key' => 'nav_contact', 'value_en' => 'Contact', 'value_bn' => 'যোগাযোগ'],
            ['key' => 'nav_login', 'value_en' => 'Admin Panel', 'value_bn' => 'অ্যাডমিন প্যানেল'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
