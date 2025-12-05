<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $totalComplaints = \App\Models\Complaint::count();
    $resolvedComplaints = \App\Models\Complaint::where('status', 'resolved')->count();
    $pendingComplaints = \App\Models\Complaint::where('status', 'pending')->count();
    
    return view('welcome', compact('totalComplaints', 'resolvedComplaints', 'pendingComplaints'));
});

Route::view('/about', 'about')->name('about');
Route::view('/contact', 'contact')->name('contact');

Route::get('lang/{locale}', function ($locale) {
    if (in_array($locale, ['en', 'bn'])) {
        session(['locale' => $locale]);
    }
    return redirect()->back();
})->name('lang.switch');

Route::get('/gallery', [\App\Http\Controllers\GalleryPageController::class, 'index'])->name('gallery');


// Citizen Routes
Route::middleware(['auth', 'verified', 'citizen'])->prefix('citizen/dashboard')->name('citizen.')->group(function () {
    Route::get('/', [\App\Http\Controllers\CitizenDashboardController::class, 'index'])->name('dashboard');

    Route::resource('complaints', \App\Http\Controllers\ComplaintController::class);
});

// Admin Routes
Route::middleware(['auth', 'admin'])->prefix('admin/dashboard')->name('admin.')->group(function () {
    Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('dashboard');
    Route::get('/complaints', [\App\Http\Controllers\AdminController::class, 'complaints'])->name('complaints.index');
    Route::get('/complaints/{complaint}', [\App\Http\Controllers\AdminController::class, 'show'])->name('complaints.show');
    Route::patch('/complaints/{complaint}/status', [\App\Http\Controllers\AdminController::class, 'updateStatus'])->name('complaints.updateStatus');
    Route::post('/complaints/{complaint}/reply', [\App\Http\Controllers\AdminController::class, 'reply'])->name('complaints.reply');
    Route::get('/settings', [\App\Http\Controllers\AdminController::class, 'settings'])->name('settings');
    Route::post('/settings', [\App\Http\Controllers\AdminController::class, 'updateSettings'])->name('settings.update');
    
    // User Management
    Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
    
    // Gallery Management
    Route::resource('galleries', \App\Http\Controllers\Admin\GalleryController::class);
});

Route::middleware('auth')->prefix('dashboard')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
