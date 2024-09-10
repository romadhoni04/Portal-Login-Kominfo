<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\SuperAdminDashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminProfileController;
use App\Http\Controllers\SuperAdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ActivityLogController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\SuperAdminProfileController;
use App\Http\Controllers\UserProfileController;
use App\Http\Controllers\RegisterSuperAdminController;
use App\Http\Controllers\SuperAdminActivityLogController;
use App\Http\Controllers\SuperAdminSettingsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Default Route
Route::get('/', function () {
    return view('welcome');
});

// Authentication Routes
Auth::routes(); // This includes login, registration, password reset routes, etc.

// Password Reset Routes
Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');

Route::get('forgot-password', [ForgotPasswordController::class, 'showLinkRequestForm'])
    ->name('password.request');

Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLinkEmail'])
    ->name('password.email');

Route::get('reset-password/{token}', [ResetPasswordController::class, 'showResetForm'])
    ->name('password.reset');

Route::post('reset-password', [ResetPasswordController::class, 'reset'])
    ->name('password.update');


// routes/user
Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
// Profile user Routes
Route::middleware('auth')->group(function () {
    Route::get('/user/profile', [UserProfileController::class, 'index'])->name('user.profile');
    Route::put('/user/profile/update', [UserProfileController::class, 'updateDetails'])->name('user.profile.updateDetails');
    Route::put('/user/profile/update-image', [UserProfileController::class, 'updateImage'])->name('user.profile.updateImage');
    Route::put('/user/profile', [UserProfileController::class, 'update'])->name('user.profile.update');
});

// routes/superadmin
Route::get('/superadmin/profile', [SuperAdminProfileController::class, 'index'])->name('superadmin.profile');
Route::get('/superadmin/about', [SuperAdminController::class, 'about'])->name('superadmin.about');

// Profile superadmin Routes
Route::middleware('auth')->group(function () {
    Route::get('/superadmin/profile', [SuperAdminProfileController::class, 'index'])->name('superadmin.profile');
    Route::put('/superadmin/profile/update', [SuperAdminProfileController::class, 'updateDetails'])->name('superadmin.profile.updateDetails');
    Route::put('/superadmin/profile/update-image', [SuperAdminProfileController::class, 'updateImage'])->name('superadmin.profile.updateImage');
    Route::put('/superadmin/profile', [SuperAdminProfileController::class, 'update'])->name('superadmin.profile.update');
});


Route::middleware(['auth', 'role:superadmin'])->prefix('superadmin')->group(function () {
    // Route untuk Administrator
    Route::get('/admins', [SuperAdminController::class, 'index'])->name('superadmin.admins.index');
    Route::get('/admins/create', [SuperAdminController::class, 'create'])->name('superadmin.admins.create');
    Route::post('/admins', [SuperAdminController::class, 'store'])->name('superadmin.admins.store');
    Route::get('/admins/{admin}/edit', [SuperAdminController::class, 'edit'])->name('superadmin.admins.edit');
    Route::put('/admins/{admin}', [SuperAdminController::class, 'update'])->name('superadmin.admins.update');
    Route::delete('/admins/{admin}', [SuperAdminController::class, 'destroy'])->name('superadmin.admins.destroy');

    // Route untuk User
    Route::get('/users', [SuperAdminController::class, 'userIndex'])->name('superadmin.users.index');
    Route::get('/users/create', [SuperAdminController::class, 'userCreate'])->name('superadmin.users.create');
    Route::post('/users', [SuperAdminController::class, 'userStore'])->name('superadmin.users.store');
    Route::get('/users/{user}/edit', [SuperAdminController::class, 'userEdit'])->name('superadmin.users.edit');
    Route::put('/users/{user}', [SuperAdminController::class, 'userUpdate'])->name('superadmin.users.update');
    Route::delete('/users/{user}', [SuperAdminController::class, 'userDestroy'])->name('superadmin.users.destroy');
});

Route::middleware(['auth', 'role:administrator'])->prefix('admin')->group(function () {
    // Route untuk User
    Route::get('/users', [AdminController::class, 'Index'])->name('admin.users.index');
    Route::get('/users/create', [AdminController::class, 'userCreate'])->name('admin.users.create');
    Route::post('/users', [AdminController::class, 'userStore'])->name('admin.users.store');
    Route::get('/users/{user}/edit', [AdminController::class, 'userEdit'])->name('admin.users.edit');
    Route::put('/users/{user}', [AdminController::class, 'userUpdate'])->name('admin.users.update');
    Route::delete('/users/{user}', [AdminController::class, 'userDestroy'])->name('admin.users.destroy');
});




Route::middleware(['auth', 'role:superadmin'])->prefix('superadmin')->group(function () {
    Route::get('superadmin/settings', [SuperAdminSettingsController::class, 'index'])->name('superadmin.settings');
    Route::put('/settings', [SuperAdminSettingsController::class, 'update'])->name('superadmin.settings.update');
    Route::get('superadmin/activitylog', [SuperAdminActivityLogController::class, 'index'])->name('superadmin.activitylog');
});
// Route untuk halaman Settings
Route::get('superadmin/settings', [SuperAdminSettingsController::class, 'index'])->name('settings');

// Route untuk halaman Activity Log
Route::get('superadmin/activitylog', [SuperAdminActivityLogController::class, 'index'])->name('activitylog');

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('superadmin.admins/index', AdminController::class);
});


Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::resource('admins', AdminController::class);
});





// routes/user
Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
// Profile superadmin Routes
Route::middleware('auth')->group(function () {
    Route::get('/admin/profile', [AdminProfileController::class, 'index'])->name('admin.profile');
    Route::put('/admin/profile/update', [AdminProfileController::class, 'updateDetails'])->name('admin.profile.updateDetails');
    Route::put('/admin/profile/update-image', [AdminProfileController::class, 'updateImage'])->name('admin.profile.updateImage');
    Route::put('/admin/profile', [AdminProfileController::class, 'update'])->name('admin.profile.update');
});
// Home Route with Role-Based Redirection
Route::get('/home', function () {
    $user = Auth::user();

    if ($user->role === 'superadmin') {
        return redirect()->route('superadmin.dashboard');
    } elseif ($user->role === 'administrator') {
        return redirect()->route('admin.dashboard');
    } else {
        return redirect()->route('user.dashboard');
    }
})->middleware('auth');

// About Route
Route::get('/about', function () {
    return view('about');
})->name('about');

// Dashboard Routes for Different Roles
Route::middleware(['auth'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard')->middleware('role:admin');
    Route::get('/superadmin/dashboard', [SuperAdminDashboardController::class, 'index'])->name('superadmin.dashboard')->middleware('role:superadmin');
});
Route::get('/admin', function () {
    // Admin panel logic
})->middleware('role:administrator');



Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->name('dashboard');

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
});
Route::middleware(['auth', 'user'])->group(function () {
    Route::get('/user/dashboard', [UserDashboardController::class, 'index'])->name('user.dashboard');
});
Route::middleware(['auth', 'superadmin'])->group(function () {
    Route::get('/superadmin/dashboard', [SuperAdminDashboardController::class, 'index'])->name('superadmin.dashboard');
});
Route::get('/status', function () {
    return view('status');
});
Route::get('/offline', function () {
    return view('offline');
});
