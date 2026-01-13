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
        $complaints = Complaint::latest()->take(5)->get();
        return view('admin.dashboard', compact('stats', 'complaints'));
    }

    public function complaints()
    {
        $complaints = Complaint::latest()->paginate(10);
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
        $allSettings = \App\Models\SiteSetting::all();
        return view('admin.settings', compact('allSettings'));
    }

    public function updateSettings(Request $request)
    {
        $request->validate([
            'settings' => 'required|array',
            'settings.*.en' => 'nullable',
            'settings.*.bn' => 'nullable',
        ]);

        foreach ($request->settings as $key => $values) {
            $valueEn = $values['en'] ?? null;
            $valueBn = $values['bn'] ?? null;

            // Handle file upload for EN value (primary for images)
            if ($request->hasFile("settings.$key.en")) {
                $valueEn = $request->file("settings.$key.en")->store('settings', 'public');
                // For images, typically we use the same for both unless specified otherwise
                $valueBn = $valueEn;
            }

            // If it's a file upload but no file was uploaded, we shouldn't overwrite with null
            // However, since the file input name is settings[key][en], if it's empty, it might not be in the request array at all.
            // But if we have hidden inputs or if text inputs present, we need to be careful.
            // For the specific image keys, if no file is in request, we likely won't even hit this loop iteration if the input wasn't sent.
            // BUT if we mix input types or have hidden fields, we need checks.
            // For now, let's assume if it's a file key and we got a file, we update. 
            // If we got a string value and it's a file key? (Shouldn't happen with correct view logic)

            // If we're updating an image setting, we should only update if we have a new path (string)
            // If $valueEn is null (and it was a file input that was empty), we should probably fetch the existing?
            // Actually, if the file input is empty, the browser doesn't send the key.
            // So this loop won't run for that key. 
            // EXCEPT if we put a hidden input to force it? No, keeping it simple.

            \App\Models\SiteSetting::updateOrCreate(
                ['key' => $key],
                ['value_en' => $valueEn, 'value_bn' => $valueBn]
            );
        }
        
        return back()->with('success', 'Settings updated successfully.');
    }
}
