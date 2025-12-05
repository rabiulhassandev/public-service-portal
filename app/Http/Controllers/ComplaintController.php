<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    public function index()
    {
        if (Auth::user()->role === 'admin') {
            $complaints = Complaint::with('user')->latest()->paginate(10);
        } else {
            $complaints = Complaint::where('user_id', Auth::id())->latest()->paginate(10);
        }
        return view('complaints.index', compact('complaints'));
    }

    public function create()
    {
        return view('complaints.create');
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'union_name' => 'required|string',
                'word_number' => 'required|string',
                'subject' => 'required|string|max:255',
                'message' => 'required|string',
                'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $imagePath = null;
            if ($request->hasFile('image')) {
                $imagePath = $request->file('image')->store('complaints', 'public');
            }

            $complaint = Complaint::create([
                'user_id' => Auth::id(),
                'union_name' => $validated['union_name'],
                'word_number' => $validated['word_number'],
                'subject' => $validated['subject'],
                'message' => $validated['message'],
                'image' => $imagePath,
                'status' => 'pending',
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Complaint submitted successfully!',
                'complaint' => $complaint
            ], 200);
            
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'success' => false,
                'message' => 'Validation failed',
                'errors' => $e->errors()
            ], 422);
        }
    }

    public function show(Complaint $complaint)
    {
        // Check if user has permission to view this complaint
        if (Auth::user()->role !== 'admin' && $complaint->user_id !== Auth::id()) {
            abort(403, 'Unauthorized access');
        }

        return view('complaints.show', compact('complaint'));
    }
}
