<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\DocotorController;
use App\Http\Controllers\Admin\AddressController;


Route::prefix('admin')->name('admin.')->middleware('auth', 'is_admin')->group(function() {

   Route::get('/', [AdminController::class, 'index'])->name('index');
   Route::resource('department',   DepartmentController::class);
   Route::resource('doctor',       DocotorController::class);
   Route::resource('address',      AddressController::class);
   Route::get('profile', [AdminController::class, 'profile'])->name('profile');
   Route::put('profile_data', [AdminController::class, 'profile_data'])->name('profile_data');

   Route::post('check-password', [AdminController::class, 'check_password'])
    ->name('check_password');

   Route::get('settings', [AdminController::class, 'settings'])->name('settings');
   Route::put('settings', [AdminController::class, 'save_settings']); 

   Route::get('del-logo-site', [AdminController::class, 'del_logo_site']);

  Route::get('apppintments', [AdminController::class, 'show_appointments'])->name('show_appointments');
  
  Route::put('updat_status/{id}', [AdminController::class, 'updat_status'])->name('updat_status');
  Route::get('contact', [AdminController::class, 'show_contacts'])->name('show_contacts');
   
 Route::delete('remve_contact/{id}', [AdminController::class, 'remve_contact'])->name('remve_contact');

 Route::get('patients', [AdminController::class, 'patients'])->name('patients');
});