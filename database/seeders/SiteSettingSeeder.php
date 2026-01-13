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
            ['key' => 'site_default_lang', 'value_en' => 'bn', 'value_bn' => 'bn'],
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
            ['key' => 'nav_admin', 'value_en' => 'Admin Panel', 'value_bn' => 'অ্যাডমিন প্যানেল'],
            ['key' => 'nav_login', 'value_en' => 'Login', 'value_bn' => 'লগইন'],

            // SEO Settings - Global
            ['key' => 'site_title', 'value_en' => 'Hello UNO', 'value_bn' => 'হ্যালো ইউএনও'],
            ['key' => 'site_tagline', 'value_en' => 'Public Service Portal', 'value_bn' => 'গণসেবা পোর্টাল'],
            ['key' => 'site_description', 'value_en' => 'Welcome to Hello UNO, the official public service portal for Satkania Upazila. Submit complaints, track status, and access government services transparently.', 'value_bn' => 'হ্যালো ইউএনও-তে স্বাগতম, সাতকানিয়া উপজেলার অফিসিয়াল গণসেবা পোর্টাল। অভিযোগ জানান, স্ট্যাটাস ট্র্যাক করুন এবং স্বচ্ছভাবে সরকারি সেবা গ্রহণ করুন।'],
            ['key' => 'site_keywords', 'value_en' => 'Hello UNO, Satkania, Upazila, Public Service, Complaint, Governance, Bangladesh, Digital Service', 'value_bn' => 'হ্যালো ইউএনও, সাতকানিয়া, উপজেলা, গণসেবা, অভিযোগ, শাসন, বাংলাদেশ, ডিজিটাল সেবা'],
            ['key' => 'site_author', 'value_en' => 'Satkania Upazila Administration', 'value_bn' => 'সাতকানিয়া উপজেলা প্রশাসন'],

            // SEO Settings - Home
            ['key' => 'home_title', 'value_en' => 'Home - Satkania Upazila Public Service', 'value_bn' => 'হোম - সাতকানিয়া উপজেলা গণসেবা'],
            ['key' => 'home_meta_desc', 'value_en' => 'Official public service portal for Satkania Upazila. Submit complaints, track applications, and access government services online.', 'value_bn' => 'সাতকানিয়া উপজেলার অফিসিয়াল গণসেবা পোর্টাল। অনলাইনে অভিযোগ অভিযোগ জানান, আবেদন ট্র্যাক করুন এবং সরকারি সেবা গ্রহণ করুন।'],
            ['key' => 'home_meta_keywords', 'value_en' => 'Satkania, Upazila, Complaint, Service, Government, Bangladesh', 'value_bn' => 'সাতকানিয়া, উপজেলা, অভিযোগ, সেবা, সরকার, বাংলাদেশ'],

            // SEO Settings - About
            ['key' => 'about_title', 'value_en' => 'About Us - Satkania Upazila', 'value_bn' => 'আমাদের সম্পর্কে - সাতকানিয়া উপজেলা'],
            ['key' => 'about_meta_desc', 'value_en' => 'Learn about Satkania Upazila Administration, our mission, leadership, and commitment to public service.', 'value_bn' => 'সাতকানিয়া উপজেলা প্রশাসন, আমাদের লক্ষ্য, নেতৃত্ব এবং জনসেবায় আমাদের প্রতিশ্রুতি সম্পর্কে জানুন।'],
            ['key' => 'about_meta_keywords', 'value_en' => 'About Satkania, UNO Profile, Administration, Leadership, Mission', 'value_bn' => 'সাতকানিয়া সম্পর্কে, ইউএনও প্রোফাইল, প্রশাসন, নেতৃত্ব, লক্ষ্য'],

            // SEO Settings - Gallery
            ['key' => 'gallery_title', 'value_en' => 'Photo Gallery - Satkania Upazila', 'value_bn' => 'ফটো গ্যালারি - সাতকানিয়া উপজেলা'],
            ['key' => 'gallery_meta_desc', 'value_en' => 'Explore photos of events, development projects, and activities in Satkania Upazila.', 'value_bn' => 'সাতকানিয়া উপজেলার ইভেন্ট, উন্নয়ন প্রকল্প এবং কার্যকলাপের ছবিগুলি অন্বেষণ করুন।'],
            ['key' => 'gallery_meta_keywords', 'value_en' => 'Satkania Photos, Gallery, Events, Development, Community', 'value_bn' => 'সাতকানিয়া ছবি, গ্যালারি, ইভেন্ট, উন্নয়ন, সম্প্রদায়'],

            // SEO Settings - Contact
            ['key' => 'contact_title', 'value_en' => 'Contact Us - Satkania Upazila', 'value_bn' => 'যোগাযোগ করুন - সাতকানিয়া উপজেলা'],
            ['key' => 'contact_meta_desc', 'value_en' => 'Get in touch with Satkania Upazila Administration. Find our address, phone number, and email for support.', 'value_bn' => 'সাতকানিয়া উপজেলা প্রশাসনের সাথে যোগাযোগ করুন। সমর্থনের জন্য আমাদের ঠিকানা, ফোন নম্বর এবং ইমেল খুঁজুন।'],
            ['key' => 'contact_meta_keywords', 'value_en' => 'Contact Satkania UNO, Address, Phone, Email, Support, Location', 'value_bn' => 'সাতকানিয়া ইউএনও যোগাযোগ, ঠিকানা, ফোন, ইমেল, সমর্থন, অবস্থান'],

            // SEO Settings - Complaints
            ['key' => 'complaint_create_title', 'value_en' => 'Submit Complaint - Satkania Upazila', 'value_bn' => 'অভিযোগ জমা দিন - সাতকানিয়া উপজেলা'],
            ['key' => 'complaint_create_meta_desc', 'value_en' => 'File a complaint to Satkania Upazila Administration. Report issues, attach photos, and get your problems solved.', 'value_bn' => 'সাতকানিয়া উপজেলা প্রশাসনে অভিযোগ দায়ের করুন। সমস্যা রিপোর্ট করুন, ছবি সংযুক্ত করুন এবং আপনার সমস্যার সমাধান পান।'],
            ['key' => 'complaint_create_meta_keywords', 'value_en' => 'File Complaint, Report Issue, Satkania Upazila, Grievance Redressal', 'value_bn' => 'অভিযোগ দায়ের, সমস্যা রিপোর্ট, সাতকানিয়া উপজেলা, অভিযোগ নিষ্পত্তি'],

            ['key' => 'complaint_track_title', 'value_en' => 'Track Complaint - Satkania Upazila', 'value_bn' => 'অভিযোগ ট্র্যাক করুন - সাতকানিয়া উপজেলা'],
            ['key' => 'complaint_track_meta_desc', 'value_en' => 'Track the status of your submitted complaint using your mobile number. Check real-time updates.', 'value_bn' => 'আপনার মোবাইল নম্বর ব্যবহার করে জমা দেওয়া অভিযোগের স্ট্যাটাস ট্র্যাক করুন। রিয়েল-টাইম আপডেট চেক করুন।'],
            ['key' => 'complaint_track_meta_keywords', 'value_en' => 'Track Complaint, Complaint Status, Satkania Upazila, Check Status', 'value_bn' => 'অভিযোগ ট্র্যাক, অভিযোগের স্ট্যাটাস, সাতকানিয়া উপজেলা, স্ট্যাটাস চেক'],

            ['key' => 'complaint_status_title', 'value_en' => 'Complaint Status - Satkania Upazila', 'value_bn' => 'অভিযোগের অবস্থা - সাতকানিয়া উপজেলা'],
            ['key' => 'complaint_status_meta_desc', 'value_en' => 'View the detailed status and administrative response to your complaints.', 'value_bn' => 'আপনার অভিযোগের বিস্তারিত অবস্থা এবং প্রশাসনিক প্রতিক্রিয়া দেখুন।'],
            ['key' => 'complaint_status_meta_keywords', 'value_en' => 'Complaint Result, Admin Response, Satkania Upazila, Status', 'value_bn' => 'অভিযোগের ফলাফল, প্রশাসনিক প্রতিক্রিয়া, সাতকানিয়া উপজেলা, অবস্থা'],

            // Page Content - About
            ['key' => 'page_about_heading', 'value_en' => 'About Us', 'value_bn' => 'আমাদের সম্পর্কে'],
            ['key' => 'page_about_subtitle', 'value_en' => 'Dedicated to serving the people of our Upazila with transparency, integrity, and efficiency.', 'value_bn' => 'স্বচ্ছতা, সততা এবং দক্ষতার সাথে আমাদের উপজেলার জনগণের সেবা করতে আমরা নিবেদিত।'],
            ['key' => 'page_about_serving_title', 'value_en' => 'Serving the Community Since 1971', 'value_bn' => '১৯৭১ সাল থেকে জনগণের সেবায়'],
            ['key' => 'page_about_serving_desc', 'value_en' => 'The Upazila Administration is the primary administrative unit of the local government. We are responsible for coordinating development activities, maintaining law and order, and ensuring the delivery of public services to the citizens.', 'value_bn' => 'উপজেলা প্রশাসন স্থানীয় সরকারের প্রাথমিক প্রশাসনিক ইউনিট। আমরা উন্নয়ন কার্যক্রম সমন্বয়, আইন-শৃঙ্খলা রক্ষা এবং নাগরিকদের সেবা নিশ্চিত করার দায়িত্ব পালন করি।'],
            ['key' => 'page_about_leadership_title', 'value_en' => 'Our Leadership', 'value_bn' => 'আমাদের নেতৃত্ব'],
            ['key' => 'page_about_leadership_subtitle', 'value_en' => 'Meet the dedicated officials leading our administration.', 'value_bn' => 'আমাদের প্রশাসনের নিবেদিত কর্মকর্তাদের সাথে পরিচিত হন।'],
            
            ['key' => 'official_uno_name', 'value_en' => 'Name of UNO', 'value_bn' => 'ইউএনও মহোদয়ের নাম'],
            ['key' => 'official_uno_designation', 'value_en' => 'Upazila Nirbahi Officer', 'value_bn' => 'উপজেলা নির্বাহী অফিসার'],
            ['key' => 'official_uno_desc', 'value_en' => 'Leading the administration with a focus on transparency and digital innovation.', 'value_bn' => 'স্বচ্ছতা এবং ডিজিটাল উদ্ভাবনের মাধ্যমে প্রশাসন পরিচালনা করছেন।'],
            
            ['key' => 'official_acland_name', 'value_en' => 'Name of AC Land', 'value_bn' => 'এসিল্যান্ড মহোদয়ের নাম'],
            ['key' => 'official_acland_designation', 'value_en' => 'Assistant Commissioner (Land)', 'value_bn' => 'সহকারী কমিশনার (ভূমি)'],
            ['key' => 'official_acland_desc', 'value_en' => 'Ensuring efficient land management and public service delivery.', 'value_bn' => 'দক্ষ ভূমি ব্যবস্থাপনা এবং জনসেবা নিশ্চিত করছেন।'],
            
            ['key' => 'official_vc_name', 'value_en' => 'Name of Vice Chairman', 'value_bn' => 'ভাইস চেয়ারম্যান মহোদয়ের নাম'],
            ['key' => 'official_vc_designation', 'value_en' => 'Upazila Vice Chairman', 'value_bn' => 'উপজেলা ভাইস চেয়ারম্যান'],
            ['key' => 'official_vc_desc', 'value_en' => 'Representing the people and working towards community development.', 'value_bn' => 'জনগণের প্রতিনিধি হিসেবে সমাজের উন্নয়নে কাজ করছেন।'],

            // About Page Images (Files) - Values will be paths, initially empty
            ['key' => 'page_about_office_image', 'value_en' => '', 'value_bn' => ''],
            ['key' => 'official_uno_image', 'value_en' => '', 'value_bn' => ''],
            ['key' => 'official_acland_image', 'value_en' => '', 'value_bn' => ''],
            ['key' => 'official_vc_image', 'value_en' => '', 'value_bn' => ''],

            // Page Content - Contact
            ['key' => 'page_contact_heading', 'value_en' => 'Contact Us', 'value_bn' => 'যোগাযোগ করুন'],
            ['key' => 'page_contact_subtitle', 'value_en' => 'We are here to help. Reach out to us for any queries, support, or feedback.', 'value_bn' => 'আমরা আপনার সাহায্যের জন্য এখানে আছি। যেকোনো প্রশ্ন, সহায়তা বা মতামতের জন্য আমাদের সাথে যোগাযোগ করুন।'],
            ['key' => 'contact_map_label', 'value_en' => 'Google Map Integration', 'value_bn' => 'গুগল মানচিত্র ইন্টিগ্রেশন'],
            ['key' => 'contact_details_title', 'value_en' => 'Get in Touch', 'value_bn' => 'যোগাযোগের মাধ্যম'],
            ['key' => 'visit_us_title', 'value_en' => 'Visit Us', 'value_bn' => 'সরাসরি আসুন'],
            ['key' => 'visit_us_address', 'value_en' => 'Upazila Administration Office, Main Road, Satkania, Chattogram', 'value_bn' => 'উপজেলা প্রশাসন কার্যালয়, প্রদান সড়ক, সাতকানিয়া, চট্টগ্রাম'],
            ['key' => 'call_us_title', 'value_en' => 'Call Us', 'value_bn' => 'কল করুন'],
            ['key' => 'call_us_hours', 'value_en' => 'Sun-Thu, 9am-5pm', 'value_bn' => 'রবি-বৃহস্পতি, সকাল ৯টা - বিকাল ৫টা'],
            ['key' => 'email_us_title', 'value_en' => 'Email Us', 'value_bn' => 'ইমেইল করুন'],

            // Page Content - Gallery
            ['key' => 'page_gallery_heading', 'value_en' => 'Photo Gallery', 'value_bn' => 'ফটো গ্যালারি'],
            ['key' => 'page_gallery_subtitle', 'value_en' => 'Explore events and development projects in our community', 'value_bn' => 'আমাদের কমিউনিটির ইভেন্ট এবং উন্নয়ন প্রকল্পগুলি দেখুন'],
            ['key' => 'gallery_no_items_title', 'value_en' => 'No Gallery Items Yet', 'value_bn' => 'এখনো কোনো গ্যালারি আইটেম নেই'],
            ['key' => 'gallery_no_items_desc', 'value_en' => 'Check back soon for updates on our events and projects!', 'value_bn' => 'আমাদের ইভেন্ট এবং প্রকল্পের আপডেটের জন্য শীঘ্রই আবার দেখুন!'],

            // Page Content - Complaints
            ['key' => 'page_complaint_create_heading', 'value_en' => 'Submit a Complaint', 'value_bn' => 'অভিযোগ জমা দিন'],
            ['key' => 'page_complaint_create_subtitle', 'value_en' => 'Fill out the form below to voice your concerns.', 'value_bn' => 'আপনার অভিযোগ জানাতে নিচের ফর্মটি পূরণ করুন।'],
            ['key' => 'page_complaint_track_heading', 'value_en' => 'Track Complaint', 'value_bn' => 'অভিযোগ ট্র্যাক করুন'],
            ['key' => 'page_complaint_track_subtitle', 'value_en' => 'Check the realtime status of your submitted complaint.', 'value_bn' => 'আপনার জমা দেওয়া অভিযোগের বর্তমান অবস্থা জানুন।'],
            ['key' => 'complaint_form_location_title', 'value_en' => 'Location Information', 'value_bn' => 'অবস্থান তথ্য'],
            ['key' => 'complaint_form_details_title', 'value_en' => 'Complaint Details', 'value_bn' => 'অভিযোগের বিবরণ'],
            ['key' => 'complaint_form_review_title', 'value_en' => 'Review & Submit', 'value_bn' => 'রিভিউ ও জমা দিন'],

            // Complaint Status Page
            ['key' => 'complaint_status_page_title', 'value_en' => 'Complaint Status', 'value_bn' => 'অভিযোগের অবস্থা'],
            ['key' => 'complaint_status_showing_results', 'value_en' => 'Showing results for', 'value_bn' => 'ফলাফল দেখানো হচ্ছে:'],
            ['key' => 'complaint_status_results_header', 'value_en' => 'Search Results', 'value_bn' => 'অনুসন্ধানের ফলাফল'],
            ['key' => 'complaint_status_check_another_btn', 'value_en' => 'Check Another Number', 'value_bn' => 'অন্য নম্বর চেক করুন'],
            ['key' => 'complaint_status_no_results_title', 'value_en' => 'No Complaints Found', 'value_bn' => 'কোনো অভিযোগ পাওয়া যায়নি'],
            ['key' => 'complaint_status_no_results_desc', 'value_en' => "We couldn't find any complaints associated with this phone number. Please check the number or file a new one.", 'value_bn' => 'এই ফোন নম্বরের সাথে যুক্ত কোনো অভিযোগ খুঁজে পাওয়া যায়নি। অনুগ্রহ করে নম্বরটি চেক করুন অথবা একটি নতুন অভিযোগ দায়ের করুন।'],
            ['key' => 'complaint_status_submit_new_btn', 'value_en' => 'Submit a New Complaint', 'value_bn' => 'নতুন অভিযোগ জমা দিন'],
            ['key' => 'complaint_id_label', 'value_en' => 'ID:', 'value_bn' => 'আইডি:'],
            ['key' => 'complaint_attachment_label', 'value_en' => 'Attachment', 'value_bn' => 'সংযুক্তি'],
            ['key' => 'complaint_official_response_label', 'value_en' => 'Official Response', 'value_bn' => 'প্রাতিষ্ঠানিক প্রতিক্রিয়া'],
            ['key' => 'complaint_admin_name_default', 'value_en' => 'Upazila Administration', 'value_bn' => 'উপজেলা প্রশাসন'],
        ];

        foreach ($settings as $setting) {
            SiteSetting::updateOrCreate(['key' => $setting['key']], $setting);
        }
    }
}
