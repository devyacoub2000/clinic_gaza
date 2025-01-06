<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\AppointmentController;
use Illuminate\Support\Facades\Route;



Route::get('/', [FrontController::class, 'index'])->name('front.index');

Route::prefix('front')->name('front.')->group(function() {
     
     Route::get('about', [FrontController::class, 'about'])->name('about');

     Route::get('treatment', [FrontController::class, 'treatment'])->name('treatment');

     Route::get('doctors', [FrontController::class, 'doctors'])->name('doctors');

     Route::get('blog', [FrontController::class, 'blog'])->name('blog');
     
     Route::get('contact', [FrontController::class, 'contact'])->name('contact');

     Route::get('readmore/{id}', [FrontController::class, 'readmore'])->name('readmore');

     Route::post('store_conatct', [FrontController::class, 'store_conatct'])->name('store_conatct');

     Route::post('store_appointment', [FrontController::class, 'store_appointment'])
     ->name('store_appointment')->middleware('auth');


});


// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});







require __DIR__.'/auth.php';
require __DIR__.'/admin.php';
