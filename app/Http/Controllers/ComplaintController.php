<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;

class ComplaintController extends Controller
{
    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'phone' => ['required', 'string', 'regex:/^(\+88)?01[3-9]\d{8}$/'],
                'name' => 'required|string|max:255',
                'union_name' => 'required|string|in:Satkania,Madarsha,Eochia,Kanchana,Amilaish',
                'word_number' => 'required|string|in:1,2,3,4,5,6,7,8,9',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('complaints', 'public');
            }

            $complaint = Complaint::create([
                'phone' => $validated['phone'],
                'name' => $validated['name'],
                'union_name' => $validated['union_name'],
                'word_number' => $validated['word_number'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'image' => $imagePath,
                'status' => 'pending',
            ]);

            return redirect()->route('complaints.status', ['phone' => $validated['phone']])
                ->with('success', 'Complaint submitted successfully! Your phone number is your tracking ID.');
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withErrors($e->errors())->withInput();
        }
    }

    public function track()
    {
        return view('complaints.track');
    }

    public function status(Request $request)
    {
        $phone = $request->query('phone');
        $complaints = collect();

        if ($phone) {
             $complaints = Complaint::where('phone', $phone)->latest()->paginate(1)->appends(['phone' => $phone]);
        }

        return view('complaints.status', compact('complaints', 'phone'));
    }
}
