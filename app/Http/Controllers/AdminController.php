<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $stats = [
            'total' => Complaint::count(),
            'pending' => Complaint::where('status', 'pending')->count(),
            'resolved' => Complaint::where('status', 'resolved')->count(),
            'users' => \App\Models\User::where('role', '!=', 'admin')->count(),
            'gallery' => \App\Models\Gallery::count(),
        ];
        $complaints = Complaint::with('user')->latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'complaints'));
    }

    public function complaints()
    {
        $complaints = Complaint::with('user')->latest()->paginate(10);
        return view('admin.complaints.index', compact('complaints'));
    }

    public function show(Complaint $complaint)
    {
        return view('admin.complaints.show', compact('complaint'));
    }

    public function updateStatus(Request $request, Complaint $complaint)
    {
        $request->validate(['status' => 'required|in:pending,in_progress,resolved,rejected']);
        $complaint->update(['status' => $request->status]);
        return back()->with('success', 'Status updated successfully.');
    }

    public function reply(Request $request, Complaint $complaint)
    {
        $request->validate(['reply' => 'required|string']);
        $complaint->update(['admin_reply' => $request->reply]);
        return back()->with('success', 'Reply sent successfully.');
    }

    public function settings()
    {
        $settings = \App\Models\SiteSetting::all()->pluck('value_en', 'key');
        // We might want both languages, so let's get the collection
        $allSettings = \App\Models\SiteSetting::all();
        return view('admin.settings', compact('allSettings'));
    }

    public function updateSettings(Request $request)
    {
        $data = $request->except('_token');
        foreach ($data as $key => $value) {
            // Assuming input names are like "site_title_en", "site_title_bn"
            // We need to parse keys or just iterate known keys.
            // Simpler: inputs are arrays: settings[site_title][en], settings[site_title][bn]
        }
        
        // Let's stick to simple key-value pairs for now or handle specific keys.
        // Better approach:
        foreach ($request->settings as $key => $values) {
            \App\Models\SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value_en' => $values['en'], 'value_bn' => $values['bn']]
            );
        }
        
        return back()->with('success', 'Settings updated successfully.');
    }
}
